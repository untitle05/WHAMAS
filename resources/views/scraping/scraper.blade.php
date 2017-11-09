@extends('layout')

@section('content')
    <div class="container-fluid" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">

            <div class="row">
                <div class="col-md-12">
                    <h1>Superb Web Scraper Demo using Laravel 4  by Developers.ph</h1>
                    <p>Web Scraping Contents</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                @if($contents)
                    @foreach ($contents as $content)
                        <!-- Begin Listing: 609 W GRAVERS LN-->
                            <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                                <div class="media">
                                    <a class="pull-left" href="{{ $content['url'] }}" target="_parent">
                                        <img alt="image" class="img-responsive" src="{{ $content['image_preview'] }}"></a>

                                    <div class="clearfix visible-sm"></div>

                                    <div class="media-body fnt-smaller">
                                        <a href="#" target="_parent"></a>

                                        <h4 class="media-heading">
                                            <a href="{{ $content['url'] }}" target="_parent">
                                                {{ $content['title'] }}
                                            </a>
                                        </h4>
                                        <p class="hidden-xs">
                                            {{ $content['short_description'] }}
                                        </p>
                                        <span class="fnt-smaller fnt-lighter fnt-arial">Author name: {{ $content['author'] }}</span>
                                    </div>
                                </div>
                            </div><!-- End Listing-->
                        @endforeach
                    @else
                        <div class="well text-center"> No Result Found!</div>
                    @endif
                </div>
            </div><!-- End container -->
        </div>
@stop
