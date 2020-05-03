<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_Setting_Company_Name_Form_Post extends Model
{
    // テーブル名のセット
    protected $table = 'company_setting_company_name_form_post';
    // 主キーのセット(検索高速化、このデータだ！！と特定できる為いい例がID→参考URL：https://www.sejuku.net/blog/52356)
    protected $guarded = array('id');

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }
}
