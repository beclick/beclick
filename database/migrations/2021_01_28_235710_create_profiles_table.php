<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->dateTime('subscription');
            $table->text('name');
            $table->integer('confirmed')->default(0);
            $table->text('phone_whatsapp')->nullable();
            $table->text('email')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->text('specialization_id')->nullable();
            $table->text('specialization')->nullable();
            $table->text('image')->nullable();
            $table->text('pdf')->nullable();
            $table->text('contact_person')->nullable();
            $table->text('contact_phone')->nullable();
            $table->text('telegram')->nullable();
            $table->text('viber')->nullable();
            $table->text('description')->nullable();
            $table->text('regions')->nullable();
            $table->text('site')->nullable();
            $table->text('experience')->nullable();
            $table->text('certificates')->nullable();
            $table->text('mode')->nullable();
            $table->integer('shabat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
