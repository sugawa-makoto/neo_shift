<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>休み希望フォーム</title>
</head>
<body>
    <form method="post" action="/holiday_user" enctype="multipart/form-data">
        {{ csrf_field() }}
    <!-- 休む人 -->
    <div class="staff_name">
        {{-- <label>シフト名</label> --}}
        <input type="text" name="name" value={{ Auth::user()->name }}>さん
    </div>
    <!-- 休む日選択 -->
    <div class="holiday_input">
        <label>休み希望日</label>
        <select class="holiday_select" id="holiday_id" name="holiday">
            @foreach($date as $d)
                <option value="{{$d->day_en}}">{{$d->day_en}}</option>
            @endforeach
        </select>
    </div>
    <!-- 送信 -->
    <p><input type="submit" value="送信する"></p>
    </form>

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
