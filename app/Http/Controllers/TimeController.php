<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class TimeController extends Controller
{
    public function times_setting_form(){

        return view('/time');
  }
  public function times_setting_form_post(Request $request){

    $request->validate([
        'shift_name' => 'required|string|max:255',      // 必須・文字列・２５５文字以内
        'start_time' => 'required',                     // 必須
        'end_time' => 'required',                       // 必須
        'break_time' => 'required',                     // 必須
        'length' => 'required',                         // 必須
        'interval' => 'required',                       // 必須
    ]);
    $find_same_times = Time::where('name', $request->shift_name)->where('start_time', $request->start_time)->where('end_time', $request->end_time)->where('break_time', $request->break_time)->where('length', $request->length)->where('interval', $request->interval)->exists();
    if(empty($find_same_times)) {
        $record = new Time;
        $record->name = $request->shift_name;
        $record->start_time = $request->start_time;
        $record->end_time = $request->end_time;
        $record->break_time = $request->break_time;
        $record->length = $request->length;
        $record->interval= $request->interval;
        $record->save();

        // 二重送信対策
        $request->session()->regenerateToken();
    }
  }
}
