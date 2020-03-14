<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>times_table_create</title>
</head>
<body>

    <form method="post" action="/times_setting_form" enctype="multipart/form-data">
        {{ csrf_field() }}
    <!-- シフト名追加 -->
    <div class="shift_name">
        <label>シフト名</label>
        <input type="text" name="shift_name" placeholder="必須項目">
    </div>
    <!-- 勤務開始時間追加 -->
    <div class="start_time">
        <label>勤務開始時間</label>
        <select class="start_time_select" id="start_time" name="start_time">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8" selected>8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>時
    </div>
    <!-- 勤務終了時間追加 -->
    <div class="end_time">
        <label>勤務終了時間</label>
        <select class="end_time_select" id="end_time" name="end_time">
            <option value="24">翌0</option>
            <option value="25">翌1</option>
            <option value="26">翌2</option>
            <option value="27">翌3</option>
            <option value="28">翌4</option>
            <option value="29">翌5</option>
            <option value="30">翌6</option>
            <option value="31">翌7</option>
            <option value="32">翌8</option>
            <option value="33">翌9</option>
            <option value="34">翌10</option>
            <option value="35">翌11</option>
            <option value="36">翌12</option>
            <option value="0" selected>0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>時
    </div>
    <!-- 休憩時間追加 -->
    <div class="break_time">
        <label>休憩時間</label>
        <select class="break_time_select" id="break_time" name="break_time">
            <option value="0.25">15</option>
            <option value="0.5">30</option>
            <option value="0.75">45</option>
            <option value="1" selected>60</option>
            <option value="0">0</option>
        </select>分
    </div>
    <div class="calculation_work_time">
        <button id="button">労働時間計算</button>
        <input type="text" name="length" placeholder="" id="work_time">
    </div>
    <!-- シフト間インターバル時間追加 -->
    <div class="interval_time">
        <label>シフト間インターバル時間</label>
        <select class="interval_time_select" id="interval_time" name="interval">
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14" selected>14</option>
        </select>時間
    </div>
    <!-- 送信 -->
    <p><input type="submit" value="送信する"></p>
    <!-- スクリプト -->
    <script>
        // 要素を取得
        var button = document.getElementById("button");

        //ボタンをクリックしたときの処理
        button.addEventListener("click", function(e){
            e.preventDefault();
            // 3つのフォームの入力内容を取得
            var start_time = document.getElementById("start_time").value;
            var end_time = document.getElementById("end_time").value;
            var break_time = document.getElementById("break_time").value;
            //3つのい値を足す
            var sum = (parseInt(end_time, 10) - parseInt(start_time, 10)) - parseFloat(break_time);
            // 足し算の結果を別の入力フォームに表示
            var work_time = document.getElementById("work_time");
            work_time.value = sum;
        });
    </script>
</body>
</html>
