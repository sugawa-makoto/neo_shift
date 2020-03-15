@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">従業員登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 曜日指定ラジオボタン -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">曜日選択</label>
                            <div class="col-md-8">
                                <input type="checkbox" name="youbi[]" value="月曜日"> 月曜日
                                <input type="checkbox" name="youbi[]" value="火曜日"> 火曜日
                                <input type="checkbox" name="youbi[]" value="水曜日"> 水曜日
                                <input type="checkbox" name="youbi[]" value="木曜日"> 木曜日
                                <input type="checkbox" name="youbi[]" value="金曜日"> 金曜日
                                <input type="checkbox" name="youbi[]" value="土曜日"> 土曜日
                                <input type="checkbox" name="youbi[]" value="日曜日"> 日曜日
                                @if ($errors->has('youbi[]'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('youbi[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- シフト選択1 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">シフト選択1</label>
                            <div class="col-md-8">
                                <select class="shift1_select" id="shift1" name="shift1">
                                    <option value="-">選択してください</option>
                                    @foreach($times_data as $d)
                                        <option value="{{$d->name}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('shift1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shift1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- シフト選択2 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">シフト選択2</label>
                            <div class="col-md-8">
                                <select class="shift1_select" id="shift2" name="shift2">
                                    <option value="-">選択してください</option>
                                    @foreach($times_data as $d)
                                        <option value="{{$d->name}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('shift2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shift2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- シフト選択3 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">シフト選択3</label>
                            <div class="col-md-8">
                                <select class="shift1_select" id="shift3" name="shift3">
                                    <option value="-">選択してください</option>
                                    @foreach($times_data as $d)
                                        <option value="{{$d->name}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('shift3'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shift3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- シフト選択4 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">シフト選択4</label>
                            <div class="col-md-8">
                                <select class="shift1_select" id="shift4" name="shift4">
                                    <option value="-">選択してください</option>
                                    @foreach($times_data as $d)
                                        <option value="{{$d->name}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('shift4'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shift4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- シフト選択5 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">シフト選択5</label>
                            <div class="col-md-8">
                                <select class="shift1_select" id="shift5" name="shift5">
                                    <option value="-">選択してください</option>
                                    @foreach($times_data as $d)
                                        <option value="{{$d->name}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('shift5'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shift5') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- 週夜勤日数 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">週夜勤日数</label>
                            <div class="col-md-6">
                                <select class="midnight_select" id="midnight_id" name="midnight">
                                    <option value="-">選択してください</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @if ($errors->has('midnight'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('midnight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- 連続夜勤可否 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">連続夜勤可否</label>
                            <div class="col-md-6">
                                <select class="continuous_midnight_select" id="continuous_midnight_id" name="continuous_midnight">
                                    <option value="-">選択してください</option>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                                @if ($errors->has('continuous_midnight'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('continuous_midnight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- パスワード作成 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワード確認 -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワードの確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function(){
  var nowchecked = $('input[name=xxxx]:checked').val();
  $('input[name=xxxx]').click(function(){
    if($(this).val() == nowchecked) {
      $(this).prop('checked', false);
      nowchecked = false;
    } else {
      nowchecked = $(this).val();
    }
  });
});
</script>
@endsection
