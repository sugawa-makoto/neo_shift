<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySettingCompanyNameFormPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_setting_company_name_form_post', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_location');
            $table->string('company_phone_number');
            $table->integer('company_business_hours_open_hours');
            $table->integer('company_business_hours_open_minute');
            $table->integer('company_business_hours_close_hours');
            $table->integer('company_business_hours_close_minute');
            $table->string('company_regular_holiday');
            $table->string('company_admin_name');
            $table->string('company_email');
            $table->string('admin_phone_number');
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
        Schema::dropIfExists('company_setting_company_name_form_post');
    }
}
