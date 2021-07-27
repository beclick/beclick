<?php

namespace App\Providers;

use App\helpers\appHelper;
use App\Models\Category;
use App\Models\Requested;
use App\Models\Profile;
use App\Models\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Europe/Moscow');

        if (\Session::get('admin') == 1) {
            Config::set('app.debug', true);
        }

        view()->composer('*', function ($view) {
            if (isset(Auth::user()->id)) {
                $myprofile = Profile::where('user_id', Auth::user()->id)->first();
            } else {
                $myprofile = null;
            }

            $requ_count = null;
            $resp_count = null;
            $subscription = true;
            $categories = Category::all();
            $all_categories = $categories->groupBy('sub');
            if (isset($myprofile)) {
                $requesteds = Requested::where('company_id', $myprofile->id)->where('status', 0)->get();
                foreach ($requesteds as $requested) {
                    if(isset($requested->project->responses)) {
                        if ($requested->project->responses->where('profile_id', $myprofile->id)->count() == 0 || $requested->read == 1) {
                            $requ_count = $requ_count + 1;
                        }
                    }
                }
                $responses = Response::where('company_id', $myprofile->id)->where('status', 0)->get();
                foreach ($responses as $response) {
                    if ($response->project->status == 0) {
                        $resp_count = $resp_count + 1;
                    }
                }

                $companies = Profile::where('confirmed', 1)->whereNotNull('category_id')->whereNotNull('subcategory_id')->where('id', '!=', $myprofile->id)->get();
                foreach($categories as $category) {
                    if ($category->sub == 0) {
                        $category->count = $companies->where('category_id', $category->id)->count();
                    } else {
                        $category->count = $companies->where('subcategory_id', $category->id)->count();
                    }
                }
                if($myprofile->subscription != null) {
                    if (strtotime($myprofile->subscription) <= strtotime(date('Y-m-d H:i:s'))) {
                        $subscription = false;
                    } else {
                        $subscription = true;
                    }
                }
            }

            if (Request::input('alert')) {
                $alert = Request::input('alert');
                $route = \Request::route()->getName();
            } else {
                $alert = null;
                $route = null;
            }

            $adverts = Profile::where('advert', 1)->get() ?? NULL;

            $view->with(compact('alert', 'route', 'all_categories', 'myprofile', 'requ_count', 'resp_count', 'subscription', 'adverts'));
        });
    }
}
