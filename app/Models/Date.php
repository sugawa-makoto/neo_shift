<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    // テーブル名のセット
    protected $table = 'dates';
    // 主キーのセット(検索高速化、このデータだ！！と特定できる為いい例がID→参考URL：https://www.sejuku.net/blog/52356)
    protected $guarded = array('id');
    
    // public $timestamps = true;
    
    // データを取得し返す↓
    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }
    // ここでデータベースからデータを取得し返すgetData()メソッドを実装しています。

    // DBファサードを使いテーブルを指定して取得を行っています。尚、今回は条件などはつけずに全てを取得していますが、この形がクエリビルダの基本文法となって、ここからWHERE句やORDER句などを付け足す事によって色々な条件でデータを取得する事が出来ます。

    // そして最後に、変数$dataに入ってきたデータをreturnして返しています。

    // これでモデルの作成は完了です。
}
