@extends('layouts.common')
@section('content')
<div class="necessary_list_search">
    <form method="post" action="/create_necessary_list_search_post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- 日付選択 -->
        <label>日付選択</label>
        <select class="" name="day_ja">
            @foreach($data as $d)
                <option value="{{$d->day_ja}}">{{$d->day_ja}}</option>
            @endforeach
        </select>
        <!-- 送信 -->
        <p><input type="submit" value="検索する" class="send"></p>
    </form>
</div>
@endsection
