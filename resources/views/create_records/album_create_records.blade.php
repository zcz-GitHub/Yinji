@extends('layouts.content')

@section('title','生成相簿')

@section('header')
  @parent
    <link rel="stylesheet" type="text/css" href="/css/create_records/style.css">
    <link rel="stylesheet" type="text/css" href="/css/create_records/bootstrap.min.css">
@stop

@section('footer')
  @parent 
@stop

@section('content')
  <!-- 页面上面的背景 -->
    <div class="bg_top">
      <!-- 右上角的图案 -->
      <div class="header_bg">
      </div>
    </div>
    <!-- 书的图形 -->
    <div class="page_box page_box_bg">
    <!-- 回到主页的按钮 -->
	    <div class="home_menu"><a href="/album_cover"></a></div>
		<form action="/record/add" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	    <!-- 左侧页面 -->
	    <div class="index_left page_left create_l">
	      <div class="create_text">
	        <h1>请在这里添加你的纪念册记录:</h1>
            <div class="userTime">
		        <!-- 自定义时间 -->
		    	<!-- <input type="button" class="userDefineTime" value="自定义时间:" onclick="ableTime();"/> -->
		    	<b>自定义时间：</b>
				<select id="year" name="year" class="">
					<option ></option>
					<option >2016</option>
					<option >2015</option>
					<option >2014</option>
					<option >2013</option>
				</select>
				<span class="userDefineTime">年 </span>
				<select  id="month" name="month" class="" ><option ></option>
					<option >01</option><option >02</option><option >03</option><option >04</option>
					<option >05</option><option >06</option><option >07</option><option >08</option>
					<option >09</option><option >10</option><option >11</option><option >12</option>
				</select>
				<span class="userDefineTime">月 </span>
				<select id="day" name="day" class="" ><option ></option>
					<option>01</option><option>02</option><option>03</option><option>04</option><option>05</option>
					<option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
					<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
					<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
					<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
					<option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
				</select>
				<span class="userDefineTime">日 </span>
				<select id="hour" name="hour" class=""><option ></option>
					<option>00</option><option>01</option><option>02</option><option>03</option><option>04</option>
					<option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>
					<option>10</option><option>11</option><option>12</option><option>13</option><option>14</option>
					<option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
					<option>20</option><option>21</option><option>22</option><option>23</option>
				</select>
				<span class="userDefineTime">:  </span>
				<select id="min" name="min" class=""><option ></option>
					<option>00</option><option>05</option><option>10</option><option>15</option><option>20</option><option>25</option>
					<option>30</option><option>35</option><option>40</option><option>45</option><option>50</option><option>55</option>
				</select>
			</div>

			<!-- <P>这里用来写用户对该纪念册的简介</P> -->
	        <textarea name="description" id="record_desc" style="width:330px;height:250px;"></textarea>
	      </div>
	    </div>
  	    
  	    <!-- 右侧页面 -->
    	<div class="index_right page_right create_r"> 
    	    <div class="create_picture">
    	    <!-- 上传文件 -->
				<iframe width="400" height="400" class="share_self"   
				frameborder="0" scrolling="yes" src="/album_fileupload#hg"></iframe>
				<!-- 上传文件结束 -->
    	    </div>

    	</div>

		</form>

		<!-- 右边导航栏 -->
        <div class="page_right_menu" >
          <ul>
            <li class="menu_1"><a href="/album_index" title="关于工厂——纪念册简介"></a></li>
            <li class="menu_2"><a href="/album_show_records" title="广播站——纪念册内容"></a></li>
            <li class="menu_5"><a class="on"  href="/album_create_records" title="厂区仓库——创建记录"></a></li>
            <li class="menu_6"><a href="/album_query" title="招兵买马——查找纪念册内容"></a></li>
          </ul>
        </div>
    </div>
     <!-- 书的下半部分的背景 -->
    <div class="page_bot"></div>
@stop
