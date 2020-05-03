<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Date;
use App\Models\company_Setting_Form_Post;
use App\Models\Company_Setting_Company_Name_Form_Post;

class Company_SettingController extends Controller
{
    public function company_setting_necessary_form(){
        $loop_time = Time::all();
        return view('company_setting_necessary',compact('loop_time'));
    }
    public function company_setting_necessary_form_post(Request $request){
        dd($request);
        $request->validate([
            'input_shift.*' => 'required',                     // 必須
            'select_necessary' => 'required',                // 必須
        ]);


        $find_company_setting_form_post = Company_Setting_Form_Post::where('input_shift', $request->input_shift)->where('select_necessary', $request->select_necessary)->exists();
        if(empty($find_company_setting_form_post)) {
            for ($i=0; $i < count($request->input_shift); $i++) {
            $db = new Company_Setting_Form_Post;
            $db->input_shift = $request->input_shift[$i];
            $db->select_necessary = $request->select_necessary[$i];
            $db->save();
            }
            return redirect('company_setting_necessary_form');
            // 二重送信対策
            $request->session()->regenerateToken();
        }
    }
    public function company_setting_company_name_form(){

        return view('company_setting_compamy_name');
    }
    public function company_setting_company_name_form_post(Request $request){

        $request->validate([
            'company_name' => 'required',
            'company_location' => 'required',
            'company_phone_number' => 'required',
            'company_business_hours_open_hours' => 'required',
            'company_business_hours_open_minute' => 'required',
            'company_business_hours_close_hours' => 'required',
            'company_business_hours_close_minute' => 'required',
            'company_admin_name' => 'required',
            'company_regular_holiday' => 'required',
            'company_email' => 'required',
            'admin_phone_number' => 'required',
        ]);

            $save = new Company_Setting_Company_Name_Form_Post;

            $save->company_name = $request->company_name;

            $save->company_location = $request->company_location;

            $save->company_phone_number = $request->company_phone_number;

            $save->company_business_hours_open_hours = $request->company_business_hours_open_hours;
            $save->company_business_hours_open_minute = $request->company_business_hours_open_minute;
            $save->company_business_hours_close_hours = $request->company_business_hours_close_hours;
            $save->company_business_hours_close_minute = $request->company_business_hours_close_minute;
            $save->company_regular_holiday = $request->company_regular_holiday;
            $save->company_admin_name = $request->company_admin_name;
            $save->company_email = $request->company_email;
            $save->admin_phone_number = $request->admin_phone_number;
            $save->save();
            return view('company_setting_compamy_name');
            // 二重送信対策
            $request->session()->regenerateToken();

    }
}
