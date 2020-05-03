<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Models\Date;
use App\Models\Holiday;
use App\Models\Youbi_User;
use App\Models\Time;
use App\Models\Shift_User;
use App\Models\Youbi_User_One_Week;
use App\Models\Shift_User_Who;
use App\Models\Random_Shift;
use App\Models\Shift_Who;
use DB;
use DateTime;
use Illuminate\Support\Facades\Auth;

class CreateShiftController extends Controller
{
    public function one_button() {
        $this->create_dates_table();
        $this->youbi_user();
        $this->youbi_user_one_week();
        $this->shift_user();
    }
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
    //datesテーブルを作成
    public function create_dates_table(){
        $carbon = Carbon::now();
        $year = 2000;
        $month = 11;
        $day = 25;
        $dt = Carbon::createFromDate($year, $month, $day); // 2018-08-04 09:11:23

        //今月の日数を求めるプロセス
        $now_year = $carbon->year; //今年
        $now_month = $carbon->month; //今月
        $next_month =  $now_month+1;// 来月
        $several_days = $carbon->daysInMonth;//今月の日数
        $next_dt = $next_month;

        //来月の日数を求めるプロセス
        $create_year = $now_year;
        $create_month = $next_month;
        $create_day = 1;
        $create_dt = Carbon::createFromDate($create_year, $create_month, $create_day);
        $next_several_days = $create_dt->daysInMonth;//来月の日数

        //サンプルデータを１レコード挿入するプロセス
        $exists_dates = Date::where('year', 2000)->exists();
        if (empty($exists_dates)){
            //初期化サンプルデータを１レコード挿入
            $sample[] = ['year' => $year, 'month' => $month, 'date' => $day, 'day_en' => $dt, 'day_ja' => '2019/01/01（火）'];
            Date::insert($sample);
        }

        //今月のdatesテーブルを作るプロセス
        $exists_dates_now_month = Date::where('year', $now_year)->where('month', $now_month)->exists();
        if (empty($exists_dates_now_month)){
            $days = [];
            for ($i=1; $i <= $several_days; $i++) {

                $carbon_date = Carbon::parse("$now_year-$now_month-$i");
                // 以下で日本語ロケールをセットしています。
                setlocale(LC_ALL, 'ja_JP.UTF-8');
                // 以下の記述で「2019/01/01（火）」のように曜日入りで表示できるようになります。
                $dayOfWeek =  $carbon_date->formatLocalized('%m月%d日(%a)');
                $date[] = ['year' => $now_year, 'month' => $now_month, 'date' => $i, 'day_en' => $carbon_date, 'day_ja' => $dayOfWeek];
            }
            Date::insert($date);
        }
        //来月のdatesテーブルを作るプロセス
        $exists_dates_next_month = Date::where('year', $now_year)->where('month', $next_month)->exists();
        if (empty($exists_dates_next_month)) {
            $next_days = [];
            for ($i=1; $i <= $next_several_days; $i++) {

                $next_carbon_date = Carbon::parse("$now_year-$next_month-$i");
                // 以下で日本語ロケールをセットしています。
                setlocale(LC_ALL, 'ja_JP.UTF-8');
                // 以下の記述で「2019/01/01（火）」のように曜日入りで表示できるようになります。
                $dayOfWeek =  $next_carbon_date->formatLocalized('%m月%d日(%a)');
                $next_days[] = ['year' => $now_year, 'month' => $next_month, 'date' => $i, 'day_en' => $next_carbon_date, 'day_ja' => $dayOfWeek];
            }
            Date::insert($next_days);
        }
    }
    //次のメソッドのyoubi_user_one_weekを作る前処理
    public function youbi_user(){
        //日付系
        $call_DateController = app()->make('App\Http\Controllers\DateController');
        $now_year = $call_DateController->now_year();
        $next_month = $call_DateController->next_month();

        //来月を取得
        $find_next_month = Date::where('year', $now_year)->where('month',$next_month)->get();
        //何曜日か調べる
        foreach($find_next_month as $youbi) {
            $one_day = $youbi->day_en;
            $datetime = new DateTime($one_day);
            $week = array("sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "satday");
            $w = (int)$datetime->format('w');
            $w_en = $week[$w];//〇〇day
            //その曜日に紐づく人を検索
            //usersテーブル内で指定カラムに１が立っている者を探す
            $find_youbi_workers = User::where($w_en, 1)->get();

            // 17.18.19.22.25.26などが出る
            // 曜日別のリストを作る
            foreach($find_youbi_workers as $find_youbi_worker) {
                $youbi_user = new Youbi_User;
                $youbi_user->day = $one_day;
                $youbi_user->year = $now_year;
                $youbi_user->month = $next_month;
                $youbi_user->youbi_id = $w;
                $youbi_user->youbi_name = $w_en;
                $youbi_user->user_id = $find_youbi_worker->id;
                $youbi_user->user_name = $find_youbi_worker->name;
                $youbi_user->save();
            }
        }
    }
    //↓これが主なリストです
    //〇〇曜日は誰が働けるの？
    //前のメソッドYoubi_Userを１週間分に整形
    public function youbi_user_one_week() {
        //日付系
        $now_year = $this->now_year();
        $next_month = $this->next_month();
        // 来月の最初の日を取得
        $next_month_first = Youbi_User::where('year',$now_year)->where('month', $next_month)->first();
        // 期間指定
        $start_day = new Carbon($next_month_first->day);
        $end_day = $start_day->addDays(6);
        // 期間指定取得開始
        $users = DB::table('youbi_user');// テーブルの指定
        $datas = $users->whereBetween('day', [$next_month_first->day, $end_day])->get();// 取得
        foreach($datas as $data) {
            $save = new Youbi_User_One_Week;
            $save->day = $data->day;
            $save->year = $data->year;
            $save->month = $data->month;
            $save->youbi_id = $data->youbi_id;
            $save->youbi_name = $data->youbi_name;
            $save->user_id = $data->user_id;
            $save->user_name = $data->user_name;
            $save->save();
        }
    }
    //Youbi_User_One_Weekのuser_nameが担当できる仕事は何なの？
    public function shift_user() {
        //Youbi_User_One_Weekのuser_nameを取得
        $get_Youbi_User_One_Weeks = Youbi_User_One_Week::all();
        foreach($get_Youbi_User_One_Weeks as $get_Youbi_User_One_Week) {
            $user_name = $get_Youbi_User_One_Week->user_name;
            $day = $get_Youbi_User_One_Week->day;
            $year = $get_Youbi_User_One_Week->year;
            $month = $get_Youbi_User_One_Week->month;
            $youbi_name = $get_Youbi_User_One_Week->youbi_name;
            $user_name = $get_Youbi_User_One_Week->user_name;
            //$user_nameが担当できる仕事は何なの？
            $shifts = ["shift1", "shift2", "shift3", "shift4", "shift5"];
            foreach($shifts as $shift) {

                $find_user_shifts = User::where('name',$user_name)->get();
                foreach($find_user_shifts as $find_user_shift) {
                    $record = new Shift_User;
                    $record->day = $day;
                    $record->year = $year;
                    $record->month = $month;
                    $record->youbi_name = $youbi_name;
                    $record->user_name = $user_name;
                    $record->shift_name = $find_user_shift->$shift;
                    $record->save();
                }
            }
        }
    }
    public function shift_ninzuu() {
        //日付系
        $now_year = $this->now_year();
        $now_month = $this->now_month();
        $ninzuu = 2;
        //何月何日で
        //〇〇シフトの人を
        //$ninzuu人
        //何月何日loop
        $dates = Date::where('year',$now_year)->where('month',$now_month)->get();
        foreach($dates as $date) {
            //何月何日で
            $day_en = $date->day_en;
            $shifts = Time::all();
            foreach($shifts as $shift) {
                //〇〇シフトで
                $shift_name = $shift->name;
                // 検索
                $find_shift_who = Shift_Who::where('day',$day_en)->where('shift',$shift_name)->inRandomOrder()->take($ninzuu)->get();

            }

        }
    }
    //休み希望フォーム作成プロセス
    public function holiday_user() {
        $carbon = Carbon::now();
        //carbon展開
        $now_year = $carbon->year; // 今年
        $now_month = $carbon->month; // 今月
        $next_month =  $now_month+1;// 来月
        $user = Auth::user();
        $date = Date::where('year', $now_year)->where('month', $now_month)->orWhere('month', $next_month)->get();
        return view('holiday_user_form',compact('date'));
    }
    //休み希望フォーム受け取りDB保存
    public function holiday_user_post(Request $request) {
        $save = new Holiday;
        $save->day = $request->holiday;
        $save->name = $request->name;
        $save->save();
    }
    //休み希望があるuserは使えないので上で作った曜日別のリストから削除
    public function del_youbi_user() {
        $horiday_user_names = Holiday::all();
        foreach($horiday_user_names as $horiday_user_name) {
            $name = $horiday_user_name->name;
            $day = $horiday_user_name->day;
            $del_youbi_user = Youbi_User::where('user_name', $name)->where('day', $day)->delete();
        }
    }
}
