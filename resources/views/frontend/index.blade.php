@extends('layouts.frontend.layout')

@section('head')
<link rel="alternate" hreflang="en" href="{{ url('en') }}" />
<link rel="alternate" hreflang="fr" href="{{ url('fr') }}" />
<link rel="alternate" hreflang="x-default" href="{{ url('en') }}" />
@endsection

@section('styles')
@endsection

@section('language')
<div class="select-lang lang-close">
    <a href="{{ url('en') }}">
        <img src="{{ asset('assets/image/england-flag.png') }}" alt="">
    </a>
    <a href="{{ url('fr') }}">
        <img src="{{ asset('assets/image/france-flag.png') }}" alt="">
    </a>
</div>
@endsection

@section('content')
<!-- Content Start-->
<div class="main-content home-page-content">

    <!-- Body Content -->
    <div class="page-space home-main-sec">
        <!--  -->
        <div class="text-center ragdoll-top-sec page-title-section mt-3 mt-md-0 hero-banner-sec">
            @if(Session::get('lang') == 'en')
            <h1 class="page-title">@lang('home.perfect_tool')<span>@lang('home.lost')</span>@lang('home.player')</h1>
            @else
            <h1 class="page-title">@lang('home.perfect_tool')@lang('home.player')<span>@lang('home.lost')</span></h1>
            @endif
            <img src="assets/image/add-run-set/separator-title.png" alt="" class="title-btm-img">
            <p class="page-title-subtext hero-des">@lang('home.desription')</p>
            <a href="#collaborative-sec" class="collaborative-sec-sec-1">
                <img src="assets/image/arrow-icon-btm.png" alt="" class="title-btm-img">
            </a>
        </div>
        <div>
            <section class="home-sec-1" id="collaborative-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 wow fadeInLeft">
                            <img src="assets/image/Home/collaborative.png" alt="">
                        </div>
                        <div class="col-sm-6  page-title-section collection_right_sec">
                            <h3 class="page-title page-title-btm">@lang('home.collaborative')</h3>
                            <div class="collaborative-des">
                                <p class="page-title-subtext">@lang('home.specialized')
                                </p>
                                <p class="page-title-subtext">@lang('home.designed')
                                </p>
                                <p class="page-title-subtext">@lang('home.create')
                                </p>
                                <div class="home-btn">
                                    @if(Session::get('lang') == 'en')
                                    <a href="{{ route('comps-builder', Session::get('lang')) }}" class="all_btn">@lang('home.comp_builder')</a>
                                    @else
                                    <a href="{{ route('fr-comps-builder', Session::get('lang')) }}" class="all_btn">@lang('home.comp_builder')</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-sec-2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6  page-title-section collection_right_sec collection_left_sec">
                            <h3 class="page-title page-title-btm">@lang('home.guides')</h3>
                            <div class="collaborative-des">
                                <p class="page-title-subtext">@lang('home.essential')
                                </p>
                                <p class="page-title-subtext">@lang('home.more')
                                </p>
                                <p class="page-title-subtext">@lang('home.partner')
                                </p>
                                <div class="home-btn">
                                    @if(Session::get('lang') == 'en')
                                    <a href="{{ route('monster-list', Session::get('lang')) }}" class="all_btn">@lang('home.monster_list')</a>
                                    @else
                                    <a href="{{ route('fr-monster-list', Session::get('lang')) }}" class="all_btn">@lang('home.monster_list')</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeInRight">
                            <img src="assets/image/Home/monstre-details-reverse.png" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-sec-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 wow fadeInLeft">
                            <img src="assets/image/Home/comp-list-swlc-filter.png" alt="">
                        </div>
                        <div class="col-sm-6  page-title-section collection_right_sec">
                            <h3 class="page-title page-title-btm">@lang('home.efficient')</h3>
                            <div class="collaborative-des">
                                <p class="page-title-subtext">@lang('home.waste')</p>
                                <p class="page-title-subtext"> @lang('home.instead')
                                </p>
                                <div class="home-btn">
                                    @if(Session::get('lang') == 'en')
                                    <a href="{{ route('comps-list', Session::get('lang')) }}" class="all_btn">@lang('home.ideal')</a>
                                    @else
                                    <a href="{{ route('fr-comps-list', Session::get('lang')) }}" class="all_btn">@lang('home.ideal')</a>
                                    @endif
                                </div>
                            </div>
                        </div>
            </section>
            <section class="home-sec-4 page-title-section  more-soon_sec collaborative-des ">
                <h3 class="page-title page-title-btm title-line-center">@lang('home.soon')</h3>
                <div class="more-soon-des">
                    <p class="page-title-subtext">@lang('home.support')</p>
                    <p class="page-title-subtext">@lang('home.features')</p>
                </div>
                <ul class="more-soon-list">
                    <li>@lang('home.tierlists')</li>
                    <li>@lang('home.each')<br>@lang('home.comp')</li>
                    <li>@lang('home.alliance')</li>
                </ul>
                <div class="more-soon-des  more-soon-des-last-des">
                    <p class="page-title-subtext">@lang('home.miss')</p>
                </div>
                <div class="home-btn wow fadeInUp">
                    <a class="all_btn" id="register_btn">@lang('home.register')</a>
                </div>
            </section>

        </div>
    </div>
    <!-- Body Content Close -->
</div>
<!-- Content Start-->
@endsection

@section('scripts')
<script>
    $(document).on('click', '#register_btn', function() {
        $('#login_popup').modal('toggle');
        $(".register-form").parents('.register_content').removeClass('show_register');                 
        $(".login-form").parents('.register_content').addClass('hide_login');
    })
</script>
@endsection