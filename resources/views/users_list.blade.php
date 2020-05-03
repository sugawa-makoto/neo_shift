@extends('layouts.common')
@section('content')
<div class="users_list">
    <table>
        <thead class="head">
            <tr>
                <th>スタッフ氏名</th>
            </tr>
        </thead>
        <tbody>
            @foreach($find_users as $d)
                <tr>
                    <td class="user_name">{{$d->name}}</td>
                    {{-- <td><a href="/onsite_list_edit/{{$d->id}}" class="btn btn-primary btn-sm">編集</a></td> --}}
                    <td class="del">
                        <form method="post" action="/users_del/{{$d->id}}">
                        {{ csrf_field() }}
                        <input type="submit" value="削除" class="btn btn-danger btn-sm" id="button">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

</script>
@endsection
