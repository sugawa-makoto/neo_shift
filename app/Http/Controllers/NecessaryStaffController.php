<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use Carbon\Carbon;
use App\Models\Time;
use App\Models\Necessary_Staff_Form_Post;
use Illuminate\Validation\Rule;
class NecessaryStaffController extends Controller
{
    public function necessary_staff_form(){
        //carbon定義
        $carbon = Carbon::now();

        //carbon展開
        $now_year = $carbon->year; //今年
        $now_month = $carbon->month; //今月
        $next_month =  $now_month+1;// 来月
        $loop_dates = Date::where('year', $now_year)->where('month', $next_month)->get();
        $loop_shift_names = Time::select('name')->pluck('name');
        return view('necessary_staff',compact('loop_dates','loop_shift_names'));
    }
    public function necessary_staff_form_post(Request $request){
    $validatedData = $request->validate([
        'select_day' => 'required|date',
        'select_shift' => 'required',
        'select_necessary' => 'required',
    ]);
    $save = new Necessary_Staff_Form_Post;
    $save->select_day = $request->select_day;
    $save->select_shift = $request->select_shift;
    $save->select_necessary = $request->select_necessary;
    $save->save();
    }
}
