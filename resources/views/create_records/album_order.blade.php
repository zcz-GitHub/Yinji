@extends('layouts.content')

@section('title','生成相簿')

@section('header')
  @parent
  <link rel="stylesheet" type="text/css" href="/css/create_records/style.css">  
  <link rel="stylesheet" type="text/css" href="/css/create_records/button.css">  
@stop

@section('footer')
  @parent 
  <script src="/js/create_records/order.js"></script>
@stop

@section('content')

    <div class="bg_top">
        <div class="header_bg">
        </div>
    </div>

    <div class="page_box page_box_bg" ng-controller = "orderController">
    <form ng-submit="addOrder()">
        <div class="home_menu"><a href="/album_cover"></a>
        </div>

        <div class="index_left page_left geam_l">
            选择一个模版吧
            <div class="order_text">
                <!--<img src = "/company/template/yinji/1.jpg" title = "1">
                <img src = "/company/template/yinji/2.jpg">
                <img src = "/company/template/yinji/3.jpg">
                <img src = "/company/template/yinji/5.jpg">-->
                <!--<P>选择书本尺寸：</P>
                <img id="kai32" src="images/create_records/32kai.jpg" alt="正32开" />
                <img id="kai16" src="images/create_records/16kai.jpg" alt="正32开" />
                <br/>
                <p id="album_size">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;正32开&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;正16开<p/>
                <br/><P>选择内页印刷颜色：</P>
                <img class="color" src="images/create_records/colorful.jpg" alt="彩色" />
                <img class="color color_right" src="images/create_records/heibai.jpg" alt="黑白" />-->
            </div>
        </div>

        <div class="index_right page_right geam_r">
            <div class="send_order">
                收货人姓名：<input class="input_out" name="" type="text" onfocus="this.className='input_on';this.onmouseout=''" onblur="this.className='input_off';this.onmouseout=function(){this.className='input_out'};" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'"    ng-model = "oName" required/><br/><br/>                           
                联系方式：&nbsp;&nbsp;<input class="input_out" name="" type="text" onfocus="this.className='input_on';this.onmouseout=''" onblur="this.className='input_off';this.onmouseout=function(){this.className='input_out'};" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'" ng-model = "oPhone" required /><br/><br/>
                填写详细地址：
                <textarea id = "adressDesc" class="form-control" rows="2" ng-model = "oAddress" required></textarea><br/>
                
                备注：
                <textarea id = "comment" class="form-control" rows="2" ng-model = "oComment" required></textarea><br/>

                选择打印范围：
                <input id="text_box1" name="goodnum" type="text" value = "0"/>
                -
                <input id="text_box2" name="goodnum" type="text" value = "0"/>
                
                <!--<input id="min" name="" type="button" value="-" />
                <input id="text_box" name="goodnum" type="text" value = "0" readonly/>
                <input id="add" name="" type="button" value="+" /></td>
                &nbsp;&nbsp;印刷价格：<span id="price">0</span>元-->

                <!--<br/><br/><br/><br/>选择支付方式：
                <div class="pay_method">
                    <br/><img class="pay" src="images/create_records/zhifubao.jpg" alt="支付宝" />
                    <img class="pay" src="images/create_records/weixinzhifu.png" alt="微信支付" />
                    <br/><br/><img class="pay" src="images/create_records/ChinaBank.jpg" alt="中国银行" />
                    <img class="pay" src="images/create_records/applepay.jpg" alt="中国工商银行" />
                </div>-->
                <div class="send_button">
                <input class="btn btn-lg" type="submit" style="float:right;" value="确认">
                </div>
            </div>
        </div>   

    </form>

        <div class="page_right_menu" >
          <ul>
            <li class="menu_1"><a href="/album_index" title="关于工厂——纪念册简介"></a></li>
            <li class="menu_2"><a href="/album_show_records" title="广播站——纪念册内容"></a></li>
            <li class="menu_5"><a href="/album_create_records" title="厂区仓库——创建记录"></a></li>
            <li class="menu_6"><a href="/album_query" title="招兵买马——查找纪念册内容"></a></li>
            <li class="menu_4"><a class="on" href="/album_order" title="下订单"></a></li>
          </ul>
        </div>

    </div>

  <div class="page_bot">

  </div>
@stop

