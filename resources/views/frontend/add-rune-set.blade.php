@extends('layouts.frontend.layout')

@section('styles')

<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">

@endsection

@section('content')
<!-- Content Start-->
<div class="main-content run-set-1-page" style="background-image: url(./assets/image/test-bg-champ.jpg);">

    <!-- Body Content -->
    <div class="main-top-sec page-space">
        <div class="text-center ragdoll-top-sec page-title-section mt-3 mt-md-0 ">
            <h1 class="page-title">Add a Rune Set for Ragdoll</h1>
            <img src="assets/image/add-run-set/separator-title.png" alt="">
            <p class="page-title-subtext">Once your Rune Set is ready, you can send it in for verification! Thank you
                for helping us! ;)</p>
        </div>
        <form class="runes-form" id="add-rune-set" method="POST">
            {{ csrf_field() }}
            <div class="name-field">
                <input type='hidden' name="rs_user_id" value="{{ $user_id }}">
                <input type='hidden' name="rs_monster_id" value="{{ $monster_id }}">
                <input type="text" name="rs_name" id="user-name" placeholder="Rune Set name" required >
            </div>
            <div class="checkbox-field">

                <div class="dropdown dropdown1 dropdown-search-wrap" data-control="checkbox-dropdown">
                    <label class="dropdown-label">Rune Set</label>
                    <div class="dropdown-list">
                        <div class="search-filed">
                            <input type="search" placeholder="Search by name" class="dropdown-search" />
                            <i class="fa fa-search"></i>
                        </div>
                        @php
                            $runes = DB::table('runes')->get();
                        @endphp
                        <div class="inner-dropdown-sec  ">
                            @foreach($runes as $rune)
                            <label class="dropdown-option">
                                <input type="radio" name="rs_rune" value="{{ $rune->r_id }}" required/>
                                <span>{{ $rune->r_name }}</span>
                                <img src="{{ asset('images/game/icons/runes/'.$rune->r_icon) }}" alt="">
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown2" data-control="checkbox-dropdown">
                    <label class="dropdown-label">Sub-Stats</label>
                    <div class="dropdown-list">
                        @php
                            $sub_stats = DB::table('sub_stats')->get();
                        @endphp
                        <div class="inner-dropdown-sec">
                            @foreach($sub_stats as $sub_stat)
                            <label class="dropdown-option">
                                <input type="checkbox" name="rs_substats[]" value="{{ $sub_stat->sub_id }}" />
                                <span class="check_btn">{{ $sub_stat->sub_name }}</span>
                                <img src="{{ asset('images/game/icons/sub-stats/'.$sub_stat->sub_icon) }}" alt="">
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown3" data-control="checkbox-dropdown">
                    <label class="dropdown-label">Skill Stone</label>
                    <div class="dropdown-list">
                        <div class="inner-dropdown-sec">
                            <label class="dropdown-option">
                                <input type="radio" name="rs_skill_stones" value="1" required />
                                <span>Damage</span>
                            </label>
                            <label class="dropdown-option">
                                <input type="radio" name="rs_skill_stones" value="2" />
                                <span>Mana Cost</span>
                            </label>
                            <label class="dropdown-option">
                                <input type="radio" name="rs_skill_stones" value="3" />
                                <span>Tooth for a tooth</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown4" data-control="checkbox-dropdown">
                    <label class="dropdown-label">Comp Position</label>
                    <div class="dropdown-list">
                        <div class="inner-dropdown-sec">
                            @for($i=1; $i<=8; $i++)
                            <label class="dropdown-option">
                                <input type="radio" name="rs_comp_position" value="{{ $i }}" required />
                                <span>{{ $i }} - {{ $i%8 > 4 ? "Back Lane" : "Front Lane"}}</span>
                            </label>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>

            <div class="textarea-field">
                <textarea name="rs_comment" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"
                    placeholder="Indicate the purpose of the rune set and how to use it..." required></textarea>
            </div>
            <div class="submit-field">
                <input type="submit" value="Submit">
            </div>

        </form>
    </div>
    <!-- Body Content Close -->

</div>
<!-- Content Start-->
@endsection

@section('scripts')
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/extensions/toastr.js')) }}"></script>

<script>
$(document).ready(function () {
    $('#add-rune-set').on('submit', function(e) {
        e.preventDefault();

        var check = $("input[type=checkbox]:checked").length;

        if(check == 0) {
            toastr.error('You should select one sub-stats at least!');
        } else if(check > 4) {
            toastr.error("You can select maximum 4 sut-stats!");
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('rune-set-store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    toastr.success('You have successfully submitted!');
                    location.reload();
                }
            })
        }
    });
});
</script>
@endsection