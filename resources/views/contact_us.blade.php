@extends('layouts.content')

@section('title','联系我们')

@section('header')
	@parent
	<link rel="stylesheet" type="text/css"
		  href="/css/contact_us.css">
@stop

@section('footer')
	@parent
	<script src = "/js/index_home/home.js"></script>
@stop

@section('content')
	<div class="container" style="padding-top:5%;">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="page-header">联系我们</h4>
			</div>
		</div>
		<div class="row">
			<img src="/images/contact_us_word.png" >
			<img src="/images/contact_us.jpg" style="float:right;">
		</div>


	</div>
@stop
