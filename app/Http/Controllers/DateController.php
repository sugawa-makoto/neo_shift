<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Date;

class DateController extends Controller
{
    //datesテーブルを作成
    public function create_dates_table(){
        $carbon = Carbon::now();
        $year = 2000;
        $month = 11;
        $day = 25;
        $dt = Carbon::createFromDate($year, $month, $day); // 2018-08-04 09:11:23

        //carbon展開
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
}
