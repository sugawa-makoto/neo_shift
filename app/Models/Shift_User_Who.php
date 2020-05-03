<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift_User_Who extends Model
{
    // テーブル名のセット
    protected $table = 'shift_user_who';
    // 主キーのセット(検索高速化、このデータだ！！と特定できる為いい例がID→参考URL：https://www.sejuku.net/blog/52356)
    protected $guarded = array('id');

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }
}
