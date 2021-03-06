@extends('layouts.frontend.layout')

@section('head')
<link rel="alternate" hreflang="en" href="{{ url('en/comps/'.$team_comp->c_slug) }}" />
<link rel="alternate" hreflang="fr" href="{{ url('fr/compos/'.$team_comp->c_fr_slug) }}" />
<link rel="alternate" hreflang="x-default" href="{{ url('en/comps/'.$team_comp->c_slug) }}" />
@endsection

@section('styles')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.css"> -->
<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" />

<style>
    .all_btn {
        border: 1px solid #D9BC84;
        border-radius: 35px;
        padding: 8px 20px;
        font-size: 13px;
        color: #D9BC84;
        min-width: 144px;
        display: inline-block;
        text-align: center;
        font-family: 'selawk-semi-bold';
        background: #272741;
    }
    .all_btn:hover {
        background-color: #D9BC84;
        color: #000;
    }

    @media screen and (max-width:475px) {
        .all_btn {
            width: 100%;
        }
    }
</style>
@endsection

@section('language')
<div class="select-lang lang-close">
    <a href="{{ url('en/comps/'.$team_comp->c_slug) }}">
        <img src="{{ asset('assets/image/england-flag.png') }}" alt="">
    </a>
    <a href="{{ url('fr/compos/'.$team_comp->c_fr_slug) }}">
        <img src="{{ asset('assets/image/france-flag.png') }}" alt="">
    </a>
</div>
@endsection

@section('content')
<div class="main-content user-page-public comp_builder-page  comp-builder-monster-detail">
    <!-- Body Content -->
    <div class="monster_wrap page-space">

        <div class="text-center ragdoll-top-sec page-title-section mt-3 mt-md-0 ">
            <h1 class="page-title "> {{ $team_comp->c_name }} </h1>
            <img src="{{ asset('assets/image/add-run-set/separator-title.png') }}" alt="title">
            @php
                $user = DB::table('users')->where('id', $team_comp->c_sent_by_user)->first();
            @endphp
            <p class="page-title-subtext">
                @lang('comp-detail.title') <a href="{{ route('user-public', [Session::get('lang'), $user->slug]) }}" class="hakio-text">{{ $user->name }}</a> @lang('comp-detail.on') {{ $team_comp->created_at->format('m/d/Y') }}.
            </p>
            <div class="social-media-block">
                <span> @lang('comp-detail.share') : </span>
                <ul>
                    <li class="facebook-icon">
                        <a href="{{ $social['facebook'] }}"> <i class="fab fa-facebook-f"></i> </a>
                    </li>
                    <li>
                        <a href="{{ $social['reddit'] }}"> <i class="fab fa-reddit-alien"></i> </a>
                    </li>
                    <li>
                        <a href="{{ $social['twitter'] }}"> <i class="fab fa-twitter"></i> </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- compect elements sec -->
        <div class="comps_sec">
            <div class="desktop_block">
                <h2>@lang('comp-detail.detail')</h2>
            </div>
            <div class="compact_bulider_element_section comp_builder">
                <div class="compact_bulider_inner_section">
                    <div class="compect_left_element_bar">
                        <div class="colleen_section mobile_block">
                            <ul>
                                @php
                                    $teamcomps = json_decode($team_comp->c_position);
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[5])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>1</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[7])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>2</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[4])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>3</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[6])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>4</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[1])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>5</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[3])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>6</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[0])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>7</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                                @php
                                    $c_monster = DB::table('monsters')->where('id', $teamcomps[2])->first();
                                    $element = DB::table('element')->where('id', $c_monster->element)->first();
                                @endphp
                                <li>
                                    <p><span>8</span>. {{ Session::get('lang') == 'en'? $c_monster->name : $c_monster->fr_name }}</p>
                                    <div class="collen_icon_img">
                                        <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="collen icon">
                                    </div>
                                </li>
                            </ul>
                            <div class="compect_genral_info_section mobile-genral_info d-md-none">
                                <h3 class="general-info-title">@lang('comp-detail.info')</h3>
                                <p class="general-info-desc mCustomScrollbar">{{ $team_comp->c_general_info }}</p>
                            </div>
                        </div>

                        <div class="compect_element_section">
                            <div class="compect_element_title">
                                <h3>@lang('comp-detail.elements')</h3>
                            </div>

                            <ul>
                                <li>
                                    <img src="{{ asset('assets/image/compect_bulider/icon-eau.png') }}" alt="compect element1">
                                    <p>x {{ $team_comp->element_water }}</p>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/image/compect_bulider/icon-tenebre.png') }}" alt="compect element2">
                                    <p>x {{ $team_comp->element_dark }}</p>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/image/compect_bulider/icon-feu.png') }}" alt="compect element3">
                                    <p>x {{ $team_comp->element_fire }}</p>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/image/compect_bulider/icon-lumiere.png') }}" alt="compect element4">
                                    <p>x {{ $team_comp->element_light }}</p>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/image/compect_bulider/icon-vent.png') }}" alt="compect element5">
                                    <p>x {{ $team_comp->element_wind }}</p>
                                </li>
                            </ul>
                        </div>

                        <div class="compect_role_section">
                            <div class="compect_element_title">
                                <h3>@lang('comp-detail.role')</h3>
                            </div>

                            <div class="compect_role_items">
                                <ul>
                                    <li>
                                        <div class="cm_role_icone_img">
                                            <img src="{{ asset('assets/image/Monter-list/all_role_monter_icon_1.png') }}"
                                                alt="role icon1">
                                        </div>
                                        <p>x {{ $team_comp->role_atk }} @lang('comp-detail.atk')</p>
                                    </li>
                                    <li>
                                        <div class="cm_role_icone_img">
                                            <img src="{{ asset('assets/image/Monter-list/all_role_monter_icon_4.png') }}"
                                                alt="role icon1">
                                        </div>
                                        <p>x {{ $team_comp->role_defense }} @lang('comp-detail.def')</p>
                                    </li>
                                    <li>
                                        <div class="cm_role_icone_img">
                                            <img src="{{ asset('assets/image/Monter-list/all_role_monter_icon_2.png') }}"
                                                alt="role icon1">
                                        </div>
                                        <p>x {{ $team_comp->role_hp }} @lang('comp-detail.hp')</p>
                                    </li>
                                    <li>
                                        <div class="cm_role_icone_img">
                                            <img src="{{ asset('assets/image/Monter-list/all_role_support-ic_3.png') }}"
                                                alt="role icon1">
                                        </div>
                                        <p>x {{ $team_comp->role_support }} @lang('comp-detail.sup')</p>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="compect_raity_section">
                            <div class="compect_element_title">
                                <h3>@lang('comp-detail.rarity')</h3>
                            </div>

                            <div class="compect_raity_items">
                                <ul>
                                    <li>
                                        <span></span>
                                        <p>x {{ $team_comp->rarity_normal }}</p>
                                    </li>

                                    <li>
                                        <span class="raity_color_2"></span>
                                        <p>x {{ $team_comp->rarity_hero }}</p>
                                    </li>

                                    <li>
                                        <span class="raity_color_3"></span>
                                        <p>x {{ $team_comp->rarity_rare }}</p>
                                    </li>

                                    <li>
                                        <span class="raity_color_4"></span>
                                        <p>x {{ $team_comp->rarity_legend }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="compect_spells_section">
                            <div class="compect_element_title">
                                <h3>@lang('comp-detail.spells')</h3>
                            </div>
                            @php
                                $spell_ids = json_decode($team_comp->c_spell);
                            @endphp
                            <div class="spells_item">
                                <ul>
                                    @foreach($spell_ids as $spell_id)
                                    @php
                                        $spell = DB::table('spells')->where('id', $spell_id)->first();
                                    @endphp
                                    <li>
                                        <a href="#1" class="switch-modal-a">
                                            <div class="spells_iiner_iteam">
                                                <img src="{{ asset('images/game/icon_images/'.$spell->icon_image) }}"
                                                    alt="compect_icon">
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="compect_average mobile_block">
                            <p>@lang('comp-detail.avg_mana'):{{ $team_comp->average_mana_cost }}</p>
                            <img src="{{ asset('assets/image/compect_bulider/cb_average_img.png') }}" alt="average">
                        </div>
                    </div>

                    <div class="compect_right_section">
                        @php
                            $c_monster_ids = json_decode($team_comp->c_position);
                            $c_monster = DB::table('monsters')->where('id', $c_monster_ids[0])->first();
                        @endphp
                        <div class="compect_right_bg_banner" style="background-image: url({{ asset('assets/image/comp_sec-monster_bg.png') }})">
                        <!-- <div class="compect_right_bg_banner" style="background-image: url({{ asset('images/game/bc_images/'.$c_monster->bg_comp_image) }})"> -->
                            <div class="compect_genral_info_section">
                                <h3 class="general-info-title">@lang('comp-detail.info')</h3>
                                <p class="general-info-desc">{{ $team_comp->c_general_info }}</p>
                            </div>

                            <div class="row desktop_block">
                                <div class="col-md-6">
                                    <div class="compect_plus_box">
                                        @foreach($c_monster_ids as $key => $c_monster_id)
                                        @php
                                            $c_monster = DB::table('monsters')->where('id', $c_monster_id)->first();
                                            $element = DB::table('element')->where('id', $c_monster->element)->first();
                                            $role = DB::table('role')->where('id', $c_monster->role)->first();
                                            $rarity = DB::table('rarity')->where('id', $c_monster->rarity)->first();
                                        @endphp
                                        @if($key % 8 < 4)
                                        <a href="{{ route(Session::get('lang') == 'en' ? 'monster-detail' : 'fr-monster-detail', [Session::get('lang'), Session::get('lang') == 'en' ? $c_monster->slug : $c_monster->fr_slug]) }}" class="compect_monster_box compect_monster_box{{$key + 1}}" target="_blank">
                                            <div class="monster_img">
                                                <div class="icon_img">
                                                    <img src="{{ asset('assets/image/mana-icone-carte.svg') }}" alt="icon"
                                                        class="icon_top_monster">
                                                    <span>{{ $c_monster->mana_cost }}</span>
                                                </div>
                                                <img src="{{ asset('images/game/main_images/'.$c_monster->main_image) }}"
                                                    alt="monster" class="monster-individual">
                                                <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="right bar"
                                                    class="icon_monster">
                                            </div>
                                            <div class="cm_monster_name">
                                                <span style="background-color:{{ $rarity->color }}!important"> </span>
                                                <p>{{ $c_monster->name }}</p>
                                                <img src="{{ asset('images/game/icons/roles/'.$role->icon) }}"
                                                    alt="cm icon">
                                            </div>
                                        </a>
                                        @endif
                                        @endforeach

                                        <div class="compect_average">
                                            <p>@lang('comp-detail.avg_mana'):{{ $team_comp->average_mana_cost }}</p>
                                            <img src="{{ asset('assets/image/compect_bulider/cb_average_img.png') }}" alt="average">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="compect_plus_right_box">
                                        @foreach($c_monster_ids as $key => $c_monster_id)
                                        @php
                                            $c_monster = DB::table('monsters')->where('id', $c_monster_id)->first();
                                            $element = DB::table('element')->where('id', $c_monster->element)->first();
                                            $role = DB::table('role')->where('id', $c_monster->role)->first();
                                            $rarity = DB::table('rarity')->where('id', $c_monster->rarity)->first();
                                        @endphp
                                        @if($key % 8 >= 4)
                                        <a href="{{ route(Session::get('lang') == 'en' ? 'monster-detail' : 'fr-monster-detail', [Session::get('lang'), Session::get('lang') == 'en' ? $c_monster->slug : $c_monster->fr_slug]) }}" class="compect_monster_box compect_monster_box{{$key % 4 + 1}}" target="_blank">
                                            <div class="monster_img">
                                                <div class="icon_img">
                                                    <img src="{{ asset('assets/image/mana-icone-carte.svg') }}" alt="icon"
                                                        class="icon_top_monster">
                                                    <span>{{ $c_monster->mana_cost }}</span>
                                                </div>
                                                <img src="{{ asset('images/game/main_images/'.$c_monster->main_image) }}"
                                                    alt="monster" class="monster-individual">
                                                <img src="{{ asset('images/game/icons/elements/'.$element->image) }}" alt="right bar" class="icon_monster">
                                            </div>
                                            <div class="cm_monster_name">
                                                <span style="background-color:{{ $rarity->color }}!important"> </span>
                                                <p>{{ $c_monster->name }}</p>
                                                <img src="{{ asset('images/game/icons/roles/'.$role->icon) }}"
                                                    alt="cm icon">
                                            </div>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mobile_block">
                                <div class="col">
                                    <div class="compect_mobil_bg">
                                        <div class="compect_coleen_title">
                                            <h2>@lang('comp-detail.title')</h2>
                                        </div>

                                        <div class="compect_mobile_boder">
                                            <div class="mobile_monster_section">
                                                <div class="line_up_sec text-center">
                                                    @foreach(json_decode($team_comp->c_position) as $comp)
                                                    @php
                                                        $c_monster = DB::table('monsters')->where('id', $comp)->first();
                                                    @endphp
                                                    <div class="line_up_monster">
                                                        <a href="{{ route(Session::get('lang') == 'en' ? 'monster-detail' : 'fr-monster-detail', [Session::get('lang'), Session::get('lang') == 'en' ? $c_monster->slug : $c_monster->fr_slug]) }}" target="_blank">
                                                            <div class="contain_shape">
                                                                <div class="shape"><img
                                                                        src="{{ asset('images/game/icon_images/'.$c_monster->icon_image) }}" alt="">
                                                                </div>
                                                            </div>
                                                            <span>{{ $c_monster->name }}</span>
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
                    </div>
                </div>

            </div>
        </div>
        <form method="POST" id="submit">
            {{ csrf_field() }}
            <!--  Commment Section Start -->
            <div class="comment-section">
                <h2>@lang('comp-detail.comment_title')</h2>
                @foreach($comments as $comment)
                <div class="seperate-comment-block">
                    <div class="seperate-comment">
                        {{ $comment->comment_text }}
                    </div>
                    <div class="commnentor-name-date">
                        @php
                            $user = DB::table('users')->where('id', $comment->comment_user_id)->first();
                        @endphp
                        <span class="commentor-name">@lang('comp-detail.by') <a href="{{ route('user-public', [Session::get('lang'), $user->slug]) }}">{{ $user->name }}</a> </span>
                        <br>
                        <span class="comment-date">{{ $comment->created_at->format('m/d/Y') }}</span>
                    </div>
                </div>
                @endforeach
                <textarea rows="4" class="seperate-comment-textarea" id="comment" placeholder="@lang('comp-detail.enter')"></textarea>
            </div>
            <!--  Commment Section End-->
            <div class="cb_save_and_publish_btn submit-btn">
                <button type="submit" id="submit_btn" data-value="{{ $team_comp->c_id }}" class="all_btn">@lang('comp-detail.submit')</button>
            </div>
        </form>
        
    </div>
    <!-- Body Content Close -->
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#submit').on('submit', function(e) {
            e.preventDefault();
            
            @if(!Auth::user())
                $('#login_popup').modal('toggle');
                $(".register-form").parents('.register_content').removeClass('hide_register');                 
                $(".login-form").parents('.register_content').addClass('show_login');
            @else
                var comment = $('#comment').val();
                var c_id = $('#submit_btn').data('value');
                if(!comment) {
                    toastr.error('You should input comment!');
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('comps-comment', Session::get('lang')) }}",
                        method: "POST",
                        data: { 
                            comment: comment,
                            c_id: c_id
                        },
                        success: function(data) {
                            if(data) {
                                toastr.success('You have successfully submitted!');
                                location.reload();
                            } else {
                                toastr.success('Server has any problem!');
                            }
                            
                        }
                    })
                }
            @endif
        })
    })
</script>
@endsection