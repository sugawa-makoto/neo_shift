@extends('layouts.common')
@section('content')
<div class="company_setting">
    <form method="post" action="/company_setting_company_name_form_post" enctype="multipart/form-data">
        {{ csrf_field() }}
    <!-- 会社名追加 -->
    <div class="company_name flex_column">
        <label>会社名称</label>
        <input type="text" name="company_name" placeholder="必須項目">
    </div>
    <!-- 会社所在地 -->
    <div class="company_location flex_column">
        <label>会社所在地</label>
        <input type="text" name="company_location" placeholder="必須項目">
    </div>
    <!-- 会社代表電話番号 -->
    <div class="company_phone_number flex_column">
        <label>会社代表電話番号</label>
        <input type="tel" name="company_phone_number" placeholder="必須項目">
    </div>
    <!-- 営業時間登録 -->
    <div class="company_business_hours flex_column">
        <label>営業時間 <span class="placeholder">(必須項目)</span></label>
        <div class="company_business_hours_section_wrapper">
            <select name="company_business_hours_open_hours">
                <option value="-">-</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
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
            </select>時
            <select name="company_business_hours_open_minute classic">
                <option value="-">-</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
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
            </select>分~
            <select name="company_business_hours_close_hours classic">
                <option value="-">-</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
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
            </select>時
            <select name="company_business_hours_close_minute classic">
                <option value="-">-</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
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
            </select>分
        </div>

    </div>
    <!-- 定休日登録 -->
    <div class="company_regular_holiday">
        <label>定休日登録 <span class="placeholder">(必須項目)</span></label>
        {{-- <input type="text" name="company_regular_holiday" placeholder="必須項目"> --}}
        <div class="youbi_pack">
            <select name="company_regular_holiday">
                <option value="-">-</option>
                <option value="土">土</option>
                <option value="日">日</option>
                <option value="月">月</option>
                <option value="火">火</option>
                <option value="水">水</option>
                <option value="木">木</option>
                <option value="金">金</option>
            </select>
            <span>曜日</span>
        </div>
    </div>
    <div class="admin_section">

        <!-- 管理者氏名 -->
        <div class="company_admin_name flex_column">
            <label>管理者氏名</label>
            <input type="text" name="company_admin_name" placeholder="必須項目">
        </div>
        <!-- 管理者メールアドレス -->
        <div class="company_email flex_column">
            <label>管理者メールアドレス</label>
            <input name="company_email" type="email" placeholder="必須項目">
        </div>
        <!-- 管理者電話番号 -->
        <div class="company_phone_number flex_column">
            <label>管理者電話番号</label>
            <input type="tel" name="admin_phone_number" placeholder="必須項目">
        </div>
    </div>
    <!-- 送信 -->
    <p><input type="submit" value="送信する" class="send"></p>
    <!-- スクリプト -->
    </form>
</div>

@endsection
