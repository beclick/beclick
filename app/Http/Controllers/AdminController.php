<?php

namespace App\Http\Controllers;

use App\helpers\appHelper;
use App\Mail\MailMessage;
use App\Models\Amountworker;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Other;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Region;
use App\Models\Specialization;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'login' => 'required|string|max:255',
                'password' => 'required|string|max:255',
            ]);

            if ($request->login == env('ADMIN_LOGIN') and $request->password == env('ADMIN_PASSWORD')) {
                \Session::put('admin', '1');
            }
            return redirect()->route('admin.home');

        } else {
            return view('admin.login');
        }

    }

    public function home(Request $request, $id = null)
    {
        if ($id == null) {
            $profiles = Profile::all();
            return view('admin.home', compact('profiles'));
        } else {
            $profile = Profile::where('id', $id)->first();
            if (isset($request->advert)) {
                if ($profile->advert == 0) {
                    $profile->advert = 1;
                } else {
                    $profile->advert = 0;
                }
                $profile->save();
                return redirect()->route('admin.home', ['id' => $profile->id]);
            }
            return view('admin.company', compact('profile'));
        }
    }

    public function resource(Request $request)
    {
        if (isset($request->cat)) {
            $categories = Category::where('sub', $request->cat)->get()->sortBy('ind');
            $view = view('admin.categories', compact('categories'))->toHtml();
        } elseif (isset($request->subcat)) {
            $subcategories = Category::where('sub', $request->subcat)->get()->sortBy('ind');
            $category = $request->subcat;
            $view = view('admin.categories', compact('category', 'subcategories'))->toHtml();
        } elseif (isset($request->spec)) {
            $specializations = Specialization::all()->sortBy('ind');
            $view = view('admin.specializations', compact('specializations'))->toHtml();
        } elseif (isset($request->other)) {
            $others = Other::where('sub', $request->other)->get()->sortBy('ind');
            $view = view('admin.others', compact('others'))->toHtml();
        } elseif (isset($request->subother)) {
            $subothers = Other::where('sub', $request->subother)->get()->sortBy('ind');
            $other = $request->subother;
            $view = view('admin.others', compact('other', 'subothers'))->toHtml();
        } elseif (isset($request->region)) {
            $regions = Region::where('sub', $request->region)->get()->sortBy('ind');
            $view = view('admin.regions', compact('regions'))->toHtml();
        } elseif (isset($request->subregion)) {
            $subregions = Region::where('sub', $request->subregion)->get()->sortBy('ind');
            $region = $request->subregion;
            $view = view('admin.regions', compact('region', 'subregions'))->toHtml();
        } elseif (isset($request->amount)) {
            $amountworkers = Amountworker::all()->sortBy('ind');
            $view = view('admin.amountworkers', compact('amountworkers'))->toHtml();
        } elseif (isset($request->exper)) {
            $experiences = Experience::all()->sortBy('ind');
            $view = view('admin.experiences', compact('experiences'))->toHtml();
        } elseif (isset($request->type)) {
            $types = Type::all()->sortBy('ind');
            $view = view('admin.types', compact('types'))->toHtml();
        } elseif (isset($request->quest)) {
            $quests = Question::where('type_id', $request->quest)->get()->sortBy('ind');
            $type = $request->quest;
            $view = view('admin.types', compact('type', 'quests'))->toHtml();
        }

        if (isset($view)) {
            return response()->json([1, $view]);
        } else {
            $view = null;
            return response()->json([0, $view]);
        }
    }

    public function cruds(Request $request)
    {
        if ($request->isMethod('post')) {

            if (isset($request->req) and isset($request->act)) {
                if ($request->act == 'update' and isset($request->id) and isset($request->value)) {

                    if ($request->req == 'cat' or $request->req == 'subcat') {
                        $crud = Category::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Category::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'spec') {
                        $crud = Specialization::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Specialization::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'region' or $request->req == 'subregion') {
                        $crud = Region::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Region::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'other' or $request->req == 'subother') {
                        $crud = Other::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Other::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'amount') {
                        $crud = Amountworker::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Amountworker::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'exper') {
                        $crud = Experience::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Experience::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'type') {
                        $crud = Type::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Type::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    } elseif ($request->req == 'quest') {
                        $crud = Question::where('id', $request->id)->first();
                        if (isset($request->index)) {
                            foreach ($request->index as $index) {
                                $cruds = Question::where('id', explode('|', $index)[0])->first();
                                $cruds->ind = explode('|', $index)[1];
                                $cruds->save();
                            }
                        }
                    }
                    if (isset($crud)) {
                        $crud->title = $request->value;
                        if (isset($request->variants)) {
                            $crud->variants = $request->variants;
                        }
                        $crud->save();
                    }

                } elseif ($request->act == 'delete' and isset($request->id)) {

                    if ($request->req == 'cat' or $request->req == 'subcat') {
                        $crud = Category::where('id', $request->id)->first();
                    } elseif ($request->req == 'spec') {
                        $crud = Specialization::where('id', $request->id)->first();
                    } elseif ($request->req == 'region' or $request->req == 'subregion') {
                        $crud = Region::where('id', $request->id)->first();
                    } elseif ($request->req == 'other' or $request->req == 'subother') {
                        $crud = Other::where('id', $request->id)->first();
                    } elseif ($request->req == 'amount') {
                        $crud = Amountworker::where('id', $request->id)->first();
                    } elseif ($request->req == 'exper') {
                        $crud = Experience::where('id', $request->id)->first();
                    } elseif ($request->req == 'type') {
                        $crud = Type::where('id', $request->id)->first();
                    } elseif ($request->req == 'quest') {
                        $crud = Question::where('id', $request->id)->first();
                    }
                    if (isset($crud)) {
                        $crud->delete();
                    }

                } elseif ($request->act == 'create' and isset($request->sub) and isset($request->value) and $request->value != '') {

                    if ($request->req == 'cat' or $request->req == 'subcat') {
                        $crud = new Category();
                        $crud->sub = $request->sub;
                    } elseif ($request->req == 'spec') {
                        $crud = new Specialization();
                    } elseif ($request->req == 'region' or $request->req == 'subregion') {
                        $crud = new Region();
                        $crud->sub = $request->sub;
                    } elseif ($request->req == 'other' or $request->req == 'subother') {
                        $crud = new Other();
                        $crud->sub = $request->sub;
                    } elseif ($request->req == 'amount') {
                        $crud = new Amountworker();
                    } elseif ($request->req == 'exper') {
                        $crud = new Experience();
                    } elseif ($request->req == 'type') {
                        $crud = new Type();
                    } elseif ($request->req == 'quest') {
                        if (isset($request->type_quest)) {
                            $crud = new Question();
                            $crud->type_id = $request->sub;
                            $crud->type_question = $request->type_quest;
                            $crud->variants = $request->variants;
                        }
                    }
                    if (isset($crud)) {
                        $crud->title = $request->value;
                        $crud->save();
                    }
                }
            }

        } else {
            $categories = Category::where('sub', 0)->get()->sortBy('ind');
            $specializations = Specialization::all()->sortBy('ind');
            $newspecializations = Profile::all()->pluck('specialization_list');
            $regions = Region::where('sub', 0)->get()->sortBy('ind');
            $others = Other::where('sub', 0)->get()->sortBy('ind');
            $amountworkers = Amountworker::all()->sortBy('ind');
            $experiences = Experience::all()->sortBy('ind');
            $types = Type::all()->sortBy('ind');
            return view('admin.cruds', compact('categories', 'specializations', 'newspecializations',
                'regions', 'others', 'amountworkers', 'experiences', 'types'));
        }

    }
    
}
