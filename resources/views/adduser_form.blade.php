<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
    <title>times_table_create</title>
</head>
<body>

    <form method="post" action="/user_add_form" enctype="multipart/form-data">
        {{ csrf_field() }}
    <!-- 従業員氏名 -->
    <div class="employee_name">
        <label>従業員氏名</label>
        <input type="text" name="employee_name" placeholder="必須項目">
    </div>
    <!-- 従業員ID決定 -->
    <div class="employee_ID">
        <button id="button">従業員ID生成</button>
        <input type="text" name="length" placeholder="" id="employee_ID">
    </div>
    <!-- 性別 -->
    <div class="gender">
        <label>性別</label>
        <select class="gender_select" id="gender_id" name="gender">
            <option value="-">選択してください</option>
            <option value="男">男</option>
            <option value="女">女</option>
        </select>
    </div>
    <!-- 年齢 -->
    <div class="age">
        <label>年齢</label>
        <select class="age_select" id="age_id" name="age">
            <option value="-">選択してください</option>
            <option value="0">0</option>
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
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
            <option value="60">60</option>
            <option value="61">61</option>
            <option value="62">62</option>
            <option value="63">63</option>
            <option value="64">64</option>
            <option value="65">65</option>
            <option value="66">66</option>
            <option value="67">67</option>
            <option value="68">68</option>
            <option value="69">69</option>
            <option value="70">70</option>
            <option value="71">71</option>
            <option value="72">72</option>
            <option value="73">73</option>
            <option value="74">74</option>
            <option value="75">75</option>
            <option value="76">76</option>
            <option value="77">77</option>
            <option value="78">78</option>
            <option value="79">79</option>
            <option value="80">80</option>
            <option value="81">81</option>
            <option value="82">82</option>
            <option value="83">83</option>
            <option value="84">84</option>
            <option value="85">85</option>
            <option value="86">86</option>
            <option value="87">87</option>
            <option value="88">88</option>
            <option value="89">89</option>
            <option value="90">90</option>
            <option value="91">91</option>
            <option value="92">92</option>
            <option value="93">93</option>
            <option value="94">94</option>
            <option value="95">95</option>
            <option value="96">96</option>
            <option value="97">97</option>
            <option value="98">98</option>
            <option value="99">99</option>
            <option value="100">100</option>
        </select>歳
    </div>
    <!-- 曜日指定ラジオボタン -->
    <div class="youbi">
        <label>曜日選択</label>
        <input type="radio" name="mon" value="月曜日"> 月曜日
        <input type="radio" name="tue" value="火曜日"> 火曜日
        <input type="radio" name="wed" value="水曜日"> 水曜日
        <input type="radio" name="thu" value="木曜日"> 木曜日
        <input type="radio" name="fri" value="金曜日"> 金曜日
        <input type="radio" name="sat" value="土曜日"> 土曜日
        <input type="radio" name="sun" value="日曜日"> 日曜日
    </div>
    <!-- 管理者が用意したシフト選択 -->
    <div class="midnight">
        <label>シフト選択1</label>
        <select class="midnight_select" id="midnight_id" name="gender">
            <option value="-">選択してください</option>
            @foreach($times_data as $d)
                <option value="{{$d->name}}">{{$d->name}}</option>
            @endforeach
        </select>
    </div>
    <!-- 管理者が用意したシフト選択 -->
    <div class="midnight">
        <label>シフト選択2</label>
        <select class="midnight_select" id="midnight_id" name="gender">
            <option value="-">選択してください</option>
            @foreach($times_data as $d)
                <option value="{{$d->name}}">{{$d->name}}</option>
            @endforeach
        </select>
    </div>
    <!-- 管理者が用意したシフト選択 -->
    <div class="midnight">
        <label>シフト選択3</label>
        <select class="midnight_select" id="midnight_id" name="gender">
            <option value="-">選択してください</option>
            @foreach($times_data as $d)
                <option value="{{$d->name}}">{{$d->name}}</option>
            @endforeach
        </select>
    </div>
    <!-- 管理者が用意したシフト選択 -->
    <div class="midnight">
        <label>シフト選択4</label>
        <select class="midnight_select" id="midnight_id" name="gender">
            <option value="-">選択してください</option>
            @foreach($times_data as $d)
                <option value="{{$d->name}}">{{$d->name}}</option>
            @endforeach
        </select>
    </div>
    <!-- 管理者が用意したシフト選択 -->
    <div class="midnight">
        <label>シフト選択5</label>
        <select class="midnight_select" id="midnight_id" name="gender">
            <option value="-">選択してください</option>
            @foreach($times_data as $d)
                <option value="{{$d->name}}">{{$d->name}}</option>
            @endforeach
        </select>
    </div>
    <!-- 週夜勤日数 -->
    <div class="midnight">
        <label>週夜勤日数</label>
        <select class="midnight_select" id="midnight_id" name="gender">
            <option value="-">選択してください</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>日
    </div>
    <!-- continuous_midnight -->
    <div class="continuous_midnight">
        <label>連続夜勤可否</label>
        <select class="continuous_midnight_select" id="continuous_midnight_id" name="continuous_midnight">
            <option value="OK">OK</option>
            <option value="NG">NG</option>
        </select>
    </div>
    <!-- 送信 -->
    <p><input type="submit" value="送信する"></p>




    //各従業員別に勤務日には赤い丸などを出したい
    //タップしてOKボタンを押すと休み希望が取れる
    //休み希望の取り消しもできる
    <!-- 試作カレンダー -->
    <button id="prev" type="button">前の月</button>
    <button id="next" type="button">次の月</button>
    <div id="calendar"></div>

    <!-- スクリプト -->
    <script>
        const weeks = ['日', '月', '火', '水', '木', '金', '土']
        const date = new Date()
        let year = date.getFullYear()
        let month = date.getMonth() + 1
        const config = {
            show: 1,
        }

        function showCalendar(year, month) {
            for ( i = 0; i < config.show; i++) {
                const calendarHtml = createCalendar(year, month)//createCalendarは何をしているのか？？？
                const sec = document.createElement('section')
                sec.innerHTML = calendarHtml
                document.querySelector('#calendar').appendChild(sec)

                month++
                if (month > 12) {
                    year++
                    month = 1
                }
            }
        }

        function createCalendar(year, month) {
            const startDate = new Date(year, month - 1, 1) // 月の最初の日を取得
            const endDate = new Date(year, month,  0) // 月の最後の日を取得
            const endDayCount = endDate.getDate() // 月の末日
            const lastMonthEndDate = new Date(year, month - 1, 0) // 前月の最後の日の情報
            const lastMonthendDayCount = lastMonthEndDate.getDate() // 前月の末日
            const startDay = startDate.getDay() // 月の最初の日の曜日を取得
            let dayCount = 1 // 日にちのカウント
            let calendarHtml = '' // HTMLを組み立てる変数

            calendarHtml += '<h1>' + year  + '/' + month + '</h1>'
            calendarHtml += '<table>'

            // 曜日の行を作成
            for (let i = 0; i < weeks.length; i++) {
                calendarHtml += '<td>' + weeks[i] + '</td>'
            }

            for (let w = 0; w < 6; w++) {
                calendarHtml += '<tr>'

                for (let d = 0; d < 7; d++) {
                    if (w == 0 && d < startDay) {
                        // 1行目で1日の曜日の前
                        let num = lastMonthendDayCount - startDay + d + 1
                        calendarHtml += '<td class="is-disabled">' + num + '</td>'
                    } else if (dayCount > endDayCount) {
                        // 末尾の日数を超えた
                        let num = dayCount - endDayCount
                        calendarHtml += '<td class="is-disabled">' + num + '</td>'
                        dayCount++
                    } else {
               calendarHtml += `<td class="calendar_td" data-date="${year}/${month}/${dayCount}">${dayCount}</td>`
                        dayCount++
                    }
                }
                calendarHtml += '</tr>'
            }
            calendarHtml += '</table>'

            return calendarHtml
        }

        function moveCalendar(e) {
            document.querySelector('#calendar').innerHTML = ''

            if (e.target.id === 'prev') {
                month--

                if (month < 1) {
                    year--
                    month = 12
                }
            }

            if (e.target.id === 'next') {
                month++

                if (month > 12) {
                    year++
                    month = 1
                }
            }

            showCalendar(year, month)
        }


        document.querySelector('#prev').addEventListener('click', moveCalendar)
        document.querySelector('#next').addEventListener('click', moveCalendar)

        document.addEventListener("click", function(e) {

            if(e.target.classList.contains("calendar_td")) {

                alert('クリックした日付は' + e.target.dataset.date + 'です')
            }
        });

        showCalendar(year, month)
    </script>





    <script>
        // 要素を取得
        var button = document.getElementById("button");

        //ボタンをクリックしたときの処理
        button.addEventListener("click", function(e){
            e.preventDefault();
            //使用文字の定義
            var str = "abcdefghijklmnopqrstuvwxyz0123456789";
            //桁数の定義
            var len = 8;
            //ランダムな文字列の生成
            var result = "";
            for(var i=0;i<len;i++){
                result += str.charAt(Math.floor(Math.random() * str.length));
            }
            // 足し算の結果を別の入力フォームに表示
            var work_time = document.getElementById("employee_ID");
            work_time.value = result;
        });
    </script>

</body>
</html>
