@extends('layout')

@section('css')
    <link href={{asset("css/jquery.fancybox.min.css")}} rel="stylesheet">
    {{--<link href={{asset("css/jquery.fancybox-buttons.css")}} rel="stylesheet">--}}
    {{--<link href={{asset("css/jquery.fancybox-thumbs.css")}} rel="stylesheet">--}}
    {{--<style>--}}
        {{--#myImg {--}}
            {{--border-radius: 5px;--}}
            {{--cursor: pointer;--}}
            {{--transition: 0.3s;--}}
        {{--}--}}

        {{--#myImg:hover {opacity: 0.7;}--}}

        {{--/* The Modal (background) */--}}
        {{--.modal {--}}
            {{--display: none; /* Hidden by default */--}}
            {{--position: fixed; /* Stay in place */--}}
            {{--z-index: 1; /* Sit on top */--}}
            {{--padding-top: 100px; /* Location of the box */--}}
            {{--left: 0;--}}
            {{--top: 0;--}}
            {{--width: 100%; /* Full width */--}}
            {{--height: 100%; /* Full height */--}}
            {{--overflow: auto; /* Enable scroll if needed */--}}
            {{--background-color: rgb(0,0,0); /* Fallback color */--}}
            {{--background-color: rgba(0,0,0,0.9); /* Black w/ opacity */--}}
        {{--}--}}

        {{--/* Modal Content (image) */--}}
        {{--.modal-content {--}}
            {{--margin: auto;--}}
            {{--display: block;--}}
            {{--width: 80%;--}}
            {{--max-width: 700px;--}}
        {{--}--}}

        {{--/* Caption of Modal Image */--}}
        {{--#caption {--}}
            {{--margin: auto;--}}
            {{--display: block;--}}
            {{--width: 80%;--}}
            {{--max-width: 700px;--}}
            {{--text-align: center;--}}
            {{--color: #ccc;--}}
            {{--padding: 10px 0;--}}
            {{--height: 150px;--}}
        {{--}--}}

        {{--/* Add Animation */--}}
        {{--.modal-content, #caption {--}}
            {{---webkit-animation-name: zoom;--}}
            {{---webkit-animation-duration: 0.6s;--}}
            {{--animation-name: zoom;--}}
            {{--animation-duration: 0.6s;--}}
        {{--}--}}

        {{--@-webkit-keyframes zoom {--}}
            {{--from {-webkit-transform:scale(0)}--}}
            {{--to {-webkit-transform:scale(1)}--}}
        {{--}--}}

        {{--@keyframes zoom {--}}
            {{--from {transform:scale(0)}--}}
            {{--to {transform:scale(1)}--}}
        {{--}--}}

        {{--/* The Close Button */--}}
        {{--.close {--}}
            {{--position: absolute;--}}
            {{--top: 15px;--}}
            {{--right: 35px;--}}
            {{--color: #f1f1f1;--}}
            {{--font-size: 40px;--}}
            {{--font-weight: bold;--}}
            {{--transition: 0.3s;--}}
        {{--}--}}

        {{--.close:hover,--}}
        {{--.close:focus {--}}
            {{--color: #bbb;--}}
            {{--text-decoration: none;--}}
            {{--cursor: pointer;--}}
        {{--}--}}

        {{--/* 100% Image Width on Smaller Screens */--}}
        {{--@media only screen and (max-width: 700px){--}}
            {{--.modal-content {--}}
                {{--width: 100%;--}}
            {{--}--}}
        {{--}--}}
    {{--</style>--}}
    @stop
@section('content')
    <!-- page content -->
    <div class="center" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3> Media Gallery <small> gallery design</small> </h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Media Gallery
                                <small> gallery design</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="row">

                                <p>Media gallery design emelents</p>
                                @foreach($photos as $photo)
                                    <div class="col-md-55">
                                        <a data-fancybox="gallery" rel="group" href="images/cibles/{{ $photo->nom }}">
                                            <img width="300" height="200"
                                                 style="width: 100%; border-radius: 5px; display: block;"
                                                 src="images/cibles/{{ $photo->nom }}" alt="image"/>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- The Modal -->
    <div id="myModal" class="modal" style="width: 50%; height: 80%; position: relative; left: 100px; top: -500px;">
        <span class="close" style="color: white">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    @stop

@section('js')
    <script src={{asset("js/jquery.fancybox.min.js")}}></script>
    {{--<script src={{asset("js/jquery.fancybox.pack.js")}}></script>--}}
    {{--<script src={{asset("js/jquery.fancybox-buttons.js")}}></script>--}}
    {{--<script src={{asset("js/jquery.fancybox-thumbs.js")}}></script>--}}

    <script>
        $(document).ready(function () {
            $(".fancybox").fancybox();

        });


    </script>
    @stop
{{--@foreach($photos as $photo)--}}
    {{--{{ $photo->nom }}--}}
    {{--@endforeach--}}

{{--{{ dd($photos) }}--}}


    {{--<p>Media gallery design emelents</p>--}}
    {{--<div class="col-md-55">--}}
        {{--<div class="thumbnail">--}}

                {{--<div class="image view view-first">--}}
                    {{--<img style="width: 100%; display: block;" src="images/cibles/{{ $photos->nom }}"--}}
                         {{--alt="Photo de la cible"/>--}}
                    {{--<div class="mask">--}}
                        {{--<p>Your Text</p>--}}
                        {{--<div class="tools tools-bottom">--}}
                            {{--<a href="#"><i class="fa fa-link"></i></a>--}}
                            {{--<a href="#"><i class="fa fa-pencil"></i></a>--}}
                            {{--<a href="#"><i class="fa fa-times"></i></a>--}}
                        {{--</div>--}}
                        {{--<div class="caption">--}}
                            {{--<p>Snow and Ice Incoming for the South</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

              {{--</div>--}}
        {{--</div>--}}




