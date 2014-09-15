@extends('layouts.layout')
@section('title') 
  <title>这是一个标题</title>
@stop
@section('meta')
  <meta name="keywords" content="杨波的bootstrap后台" />
  <meta name="description" content="杨波的bootstrap3.0后台" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
@stop
@section('css')
  <!-- basic styles -->
  <link href="{{asset('admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('admin')}}/assets/css/font-awesome.min.css" />
  <!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
  <![endif]-->
  <!-- page specific plugin styles -->
  <!-- fonts -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
  <!-- ace styles -->
  <link rel="stylesheet" href="{{asset('admin')}}/assets/css/ace.min.css" />
  <link rel="stylesheet" href="{{asset('admin')}}/assets/css/ace-rtl.min.css" />
  <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/ace-ie.min.css" />
  <![endif]-->
  <!-- inline styles related to this page -->
@stop
@section('js_head')
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
@stop
