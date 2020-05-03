<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use App\Models\Time;
use App\Models\Necessary_List;
use Carbon\Carbon;

class NecessaryController extends Controller
{
    //今年を求める関数
    public function now_year() {
        $carbon = Carbon::now();
        $now_year = $carbon->year; //今年

        $next_month_init = $carbon->addMonth(); //来月定義
        // $next_month = $next_month_init->month; //来月表示
        return $now_year;
    }
    //今月を求める関数
    public function now_month() {
        $carbon = Carbon::now();
        $now_month = $carbon->month;
        return $now_month;
    }
    //来月を求める関数
    public function next_month() {
        $carbon = Carbon::now();
        $next_month_init = $carbon->addMonth(); //来月定義
        $next_month = $next_month_init->month; //来月表示
        return $next_month;
    }
    public function create_necessary_list() {
        //日付系
        $now_year = $this->now_year();
        $now_month = $this->now_month();
        $next_month = $this->next_month();

        $exists_now_month = Necessary_List::where('year', $now_year)->where('month', $now_month)->orWhere('month', $next_month)->exists();
        if (empty($exists_now_month)) {
            $dates = Date::all();
            $shifts = Time::all();
            $default = 2;
            foreach($dates as $date) {
                foreach($shifts as $shift) {
                    $record = new Necessary_List;
                    $record->year = $date->year;
                    $record->month = $date->month;
                    $record->date = $date->date;
                    $record->day_en = $date->day_en;
                    $record->day_ja = $date->day_ja;
                    $record->shift_name = $shift->name;
                    $record->default_ninzuu = $default;
                    $record->save();
                }
            }
        }
    }
    // 検索フォームを表示させる
    public function search() {
        // Eloquentでデータ取得
        $data_del = Date::where('year',2000)->delete();
        $data = Date::all();
        // $shift_name = Time::all();
        // ビューを返す
        return view('create_necessary_list_search',compact('data','shift_name'));
    }

    //検索フォームのセレクトから選ばれた日付を受け取り、受け取った条件でDB内を探して結果をviewにわたして表示する処理
    public function post(Request $request) {
        $search_necessary_list = Necessary_List::where('day_ja',$request->day_ja)->get();
        return view('create_necessary_list_search_result',compact('search_necessary_list'));
    }

    //人数をセレクトで指定して更新するボタンを押したあとの処理
    public function update(Request $request) {
        dd($request->default_ninzuu);
    }
}
