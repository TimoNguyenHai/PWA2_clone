<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->boolean('is_admin')->after('password');
            $table->string('tel_number')->nullable()->after('is_admin');
            $table->string('street')->after('tel_number');
            $table->integer('street_number')->after('street');
            $table->string('city')->after('street_number');
            $table->integer('postcode')->after('city');
            $table->bigInteger('country_id')->unsigned()->after('postcode');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropForeign(['countries']);
        });
    }
}
