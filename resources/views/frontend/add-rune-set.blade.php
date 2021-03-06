@extends('layouts.frontend.layout')

@section('head')
<link rel="alternate" hreflang="en" href="{{ url('en/add-rune-set/'.$monster->name) }}" />
<link rel="alternate" hreflang="fr" href="{{ url('fr/add-rune-set/'.$monster->fr_name) }}" />
<link rel="alternate" hreflang="x-default" href="{{ url('en/add-rune-set/'.$monster->name) }}" />
@endsection

@section('styles')

@endsection

@section('language')
<div class="select-lang lang-close">
    <a href="{{ url('en/add-rune-set/'.$monster->name) }}">
        <img src="{{ asset('assets/image/england-flag.png') }}" alt="">
    </a>
    <a href="{{ url('fr/add-rune-set/'.$monster->fr_name) }}">
        <img src="{{ asset('assets/image/france-flag.png') }}" alt="">
    </a>
</div>
@endsection

@section('content')
<!-- Content Start-->
<!-- <div class="main-content run-set-1-page" style="background-image: url({{ asset('assets/image/test-bg-champ.jpg') }})"> -->
<div class="main-content run-set-1-page" style="background-image: url({{ asset('images/game/bg_images/'.$monster->bg_image) }});">

    <!-- Body Content -->
    <div class="main-top-sec page-space">
        <div class="text-center ragdoll-top-sec page-title-section mt-3 mt-md-0 ">
            <h1 class="page-title">@lang('add-rune.title') {{ Session::get('lang') == 'en'? $monster->name : $monster->fr_name }}</h1>
            <img src="{{ asset('assets/image/add-run-set/separator-title.png') }}" alt="">
            <p class="page-title-subtext">@lang('add-rune.description')</p>
        </div>
        <form class="runes-form" id="add-rune-set" method="POST">
            {{ csrf_field() }}
            <div class="name-field">
                <input type='hidden' name="rs_user_id" value="{{ $user_id }}">
                <input type='hidden' name="rs_monster_id" value="{{ $monster->id }}">
                <input type="text" name="rs_name" id="user-name" placeholder="@lang('add-rune.rune_name')" required >
            </div>
            <div class="checkbox-field">

                <div class="dropdown dropdown1 dropdown-search-wrap" data-control="checkbox-dropdown">
                    <label class="dropdown-label">@lang('add-rune.rune')</label>
                    <div class="dropdown-list">
                        <div class="search-filed">
                            <input type="search" placeholder="@lang('add-rune.search')" class="dropdown-search" id="rune-set-search" onkeyup="filterFunction()"/>
                            <i class="fa fa-search"></i>
                        </div>
                        @php
                            $runes = DB::table('runes')->get();
                        @endphp
                        <div class="inner-dropdown-sec" id="search-box">
                            @foreach($runes as $rune)
                            <label class="dropdown-option search-dropdown">
                                <input type="radio" name="rs_rune" value="{{ $rune->r_id }}"/>
                                <span>{{ Session::get('lang') == 'en'? $rune->r_name : $rune->fr_r_name }}</span>
                                <img src="{{ asset('images/game/icons/runes/'.$rune->r_icon) }}" alt="">
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown2" data-control="checkbox-dropdown">
                    <label class="dropdown-label">@lang('add-rune.sub_stats')</label>
                    <div class="dropdown-list">
                        @php
                            $sub_stats = DB::table('sub_stats')->get();
                        @endphp
                        <div class="inner-dropdown-sec">
                            @foreach($sub_stats as $sub_stat)
                            <label class="dropdown-option">
                                <input type="checkbox" name="rs_substats[]" class="rs_substats" value="{{ $sub_stat->sub_id }}" />
                                <span class="check_btn">{{ Session::get('lang') == 'en'? $sub_stat->sub_name : $sub_stat->fr_sub_name }}</span>
                                <img src="{{ asset('images/game/icons/sub-stats/'.$sub_stat->sub_icon) }}" alt="">
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown3" data-control="checkbox-dropdown">
                    <label class="dropdown-label">@lang('add-rune.skill')</label>
                    <div class="dropdown-list">
                        <div class="inner-dropdown-sec">
                            <label class="dropdown-option">
                                <input type="radio" name="rs_skill_stones" value="1" />
                                <span>{{ Session::get('lang') == 'en'? $monster->skill_stone1_name : $monster->fr_skill_stone1_name }}</span>
                            </label>
                            <label class="dropdown-option">
                                <input type="radio" name="rs_skill_stones" value="2" />
                                <span>{{ Session::get('lang') == 'en'? $monster->skill_stone2_name : $monster->fr_skill_stone2_name }}</span>
                            </label>
                            <label class="dropdown-option">
                                <input type="radio" name="rs_skill_stones" value="3" />
                                <span>{{ Session::get('lang') == 'en'? $monster->skill_stone3_name : $monster->fr_skill_stone3_name }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown4" data-control="checkbox-dropdown">
                    <label class="dropdown-label">@lang('add-rune.position')</label>
                    <div class="dropdown-list">
                        <div class="inner-dropdown-sec">
                            @for($i=1; $i<=8; $i++)
                            <label class="dropdown-option">
                                <input type="radio" name="rs_comp_position" value="{{ $i }}" />
                                <span>{{ $i }} - {{ $i%8 > 4 ? 'Back Lane' : 'Front Lane' }}</span>
                            </label>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>

            <div class="textarea-field">
                <textarea name="rs_comment" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"
                    placeholder="@lang('add-rune.textarea')" required></textarea>
            </div>
            <div class="submit-field">
                <input type="submit" value="@lang('add-rune.submit')">
            </div>

        </form>
    </div>
    <!-- Body Content Close -->

</div>
<!-- Content Start-->
@endsection

@section('scripts')

<script>

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("rune-set-search");
  filter = input.value.toUpperCase();
  div = document.getElementById("search-box");
  search_dropdown = document.getElementsByClassName("search-dropdown");
  span = div.getElementsByTagName("span");
  for (i = 0; i < span.length; i++) {
    txtValue = span[i].textContent || span[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        search_dropdown[i].style.display = "";
    } else {
        search_dropdown[i].style.display = "none";
    }
  }
}

$(document).ready(function () {
    $('#add-rune-set').on('submit', function(e) {
        e.preventDefault();

        var check = $("input[type=checkbox]:checked").length;
        var rs_rune = $("input[name='rs_rune']:checked").val();
        var rs_skill_stones = $("input[name='rs_skill_stones']:checked").val();
        var rs_comp_position = $("input[name='rs_comp_position']:checked").val();

        if(!rs_rune) {
            toastr.error('You should select rune!');
            return false;
        }

        if(!rs_skill_stones) {
            toastr.error('You should select skill stone!');
            return false;
        }

        if(!rs_comp_position) {
            toastr.error('You should select position!');
            return false;
        }

        if(check == 0) {
            toastr.error('You should select one sub-stats at least!');
            return false;
        } else if(check > 4) {
            toastr.error("You can select maximum 4 sut-stats!");
            return false;
        } 
        
        if(rs_rune && rs_skill_stones && rs_comp_position && check <= 4) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('rune-set-store', Session::get('lang')) }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    toastr.success('You have successfully submitted!');
                    location.reload();
                },
                error: function(error) {
                    toastr.error('Server error!');
                }
            })
        }
    });
});
</script>
@endsection