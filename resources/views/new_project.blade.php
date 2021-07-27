@extends('layouts.app')

@isset($project)
    @section('title', __('app.new_project1'))
@else
    @section('title', __('app.new_project_title'))
@endisset

@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                @isset($project) {{ __('app.new_project1') }} @else {{ __('app.new_project_title') }} @endisset <i
                    class="fa fa-angle-left"></i> <a
                    href="">{{ __('app.new_project2') }}</a>
            </div>
            <h1> @isset($project) {{ __('app.new_project1') }} @else {{ __('app.new_project_title') }} @endisset</h1>
        </div>
    </div>
    <div class="profile-page">
        <div class="steps">
            <ul>
                <li>
                    <a class="s1 active">{{ __('app.new_project3') }} @isset($project) {{ __('app.new_project1') }} @else {{ __('app.new_project_title') }} @endisset</a>
                </li>
                <li>
                    <a class="s2">{{ __('app.new_project4') }}</a>
                </li>
                <li>
                    <a class="s3">{{ __('app.new_project5') }}</a>
                </li>
            </ul>
        </div>
        <form id="proj_form">
            <input class="project" name="project[]" value="@isset($project) {{ $project->id }} @endisset" hidden>
            <div class="content c1 other active">
                <div class="flex">
                    <div class="fields big">
                        <div class="fields-name">
                            <img src="img/name10.svg"> {{ __('app.new_project6') }}
                        </div>
                        <div class="field-name">
                            {{ __('app.new_project7') }}
                        </div>
                        <div class="field">
                            <input class="inp" id="title" name="title" type="text"
                                   value="@isset($project) {{ $project->title }} @endisset" autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.new_project8') }}
                        </div>
                        <div class="field">
                            <select class="inp" id="type" name="type" autocomplete="off">
                                @if (!isset($project->type_id))
                                    <option value="">-------</option>
                                @endif
                                @isset($types)
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}"
                                                @if (isset($project->type_id) and $project->type_id == $type->id) selected @endif>{{ $type->title }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="field-name">
                            {{ __('app.new_project9') }}
                        </div>
                        <div class="field">
                            <textarea class="inp" id="text" name="text"
                                      autocomplete="off">@isset($project) {{ $project->text }} @endisset</textarea>
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="img/name3.svg"> {{ __('app.new_project10') }}
                        </div>
                        <div class="field-name">
                            {{ __('app.new_project11') }}
                        </div>
                        <div class="regions">
                            <div class="item">
                                <input name="regions[]" type="checkbox" class="checkbox reg" value="{{ __('app.all_israile') }}"
                                       id="chf"
                                       @if(isset($project->regions) and isset(explode('|', $project->regions)[1]) and explode('|', $project->regions)[1] == __('app.all_israile')) checked
                                       @endif autocomplete="off">
                                <label for="chf">{{ __('app.all_israile') }}</label>
                            </div>
                            @foreach($regions[0] as $region)
                                <div class="item">
                                    <a class="link"><i class="fa fa-angle-left"></i></a>
                                    <input type="checkbox" class="checkbox" id="ch{{ $region->id }}" autocomplete="off">
                                    <label for="ch{{ $region->id }}">{{ $region->title }}</label>
                                    <div class="list">
                                        @if (isset($regions[$region->id]))
                                            @foreach($regions[$region->id] as $reg)
                                                <input name="regions[]" type="checkbox" class="checkbox"
                                                       id="ch{{ $reg->id }}" value="{{ $reg->title }}"
                                                       @if(isset($project->regions) and in_array($reg->title, explode('|', $project->regions))) checked
                                                       @endif autocomplete="off">
                                                <label for="ch{{ $reg->id }}">{{ $reg->title }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name11.svg') }}"> {{ __('app.new_project12') }}
                        </div>
                        <div class="attach">
                            {!! __('app.new_project13') !!}
                            <input id="docs_url" name="docs_url" type="text"
                                   value="@isset($project) {{ $project->docs_url }} @endisset" autocomplete="off">
                        </div>
                        <div class="line"></div>
                        <div class="button flex">
                            <button type="button" id="next" class="big">{{ __('app.new_project14') }} <span></span>
                            </button>
                            <input name="contact_hide" type="checkbox" class="checkbox" id="ccc" value="check"
                                   @if(isset($project->contact_hide) and $project->contact_hide == 1) checked @endif>
                            <label for="ccc">
                                {!!__('app.new_project15')  !!}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content c2 other">
                <div class="flex">
                    <div class="fields big">
                        <div id="quest">
                            @isset($project->questions)
                                <div class="fields-name">
                                    <img src="{{ asset('img/name10.svg') }}"> {{ __('app.new_project16') }}
                                </div>
                                <div class="field-name">
                                    {!! $project->questions !!}
                                </div>
                                <div class="button flex">
                                    <button type="button" id="new_quest">{{ __('app.new_project17') }}
                                    </button>
                                </div>
                            @else
                                <div class="fields-name">
                                    {{ __('app.new_project18') }}
                                </div>
                            @endisset
                        </div>
                        <div class="line"></div>
                        <div class="button flex">
                            <button type="button" id="save" class="big">{{ __('app.new_project19') }} <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="content c3 other2">
            <div class="flex">
                <div class="list">
                    <div class="flex">
                        <button type="button" class="send-btn top-button big send_btn"><span></span> {{ __('app.find4') }}
                        </button>
                        <div class="selected">
                            {{ __('app.find5') }} <span></span>
                            <a id="all_check">{{ __('app.find6') }}</a>
                        </div>
                    </div>
                    <div class="search">
                        <div class="flex">
                            <p>{{ __('app.find7') }}</p>
                        </div>
                        <input type="text" name="mails" placeholder="{{ __('app.find8') }}">
                        <button type="button" id="mails"></button>
                    </div>
                    <form id="send_form">
                        <input class="project" name="project[]" value="@isset($project){{ $project->id }}@endisset"
                               hidden>
                        <div id="result" class="flex2 comp">
                            @include('layouts.items')
                        </div>
                    </form>
                </div>
                <div class="filter">
                    <div class="name main">
                        <img src="{{ asset('img/name12.svg') }}"> {{ __('app.find9') }}
                    </div>
                    <div class="block">
                        <select id="category" name="category" autocomplete="off">
                            @if (!isset($profile->category_id))
                                <option value="null">-------</option>
                            @endif
                            @isset($categories)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if (isset($request->category) and $request->category == $category->id) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                        <select id="subcategory" name="subcategory" autocomplete="off">
                            <option value="null">-------</option>
                        </select>
                        <select id="specialization" name="specialization" autocomplete="off">
                            @if (!isset($profile->specialization_id))
                                <option value="null">-------</option>
                            @endif
                            @isset($specializations)
                                @foreach($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                            @if (isset($request->specialization) and $request->specialization == $specialization->id) selected @endif>{{ $specialization->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                        <div class="result">
                            <p>{{ __('app.find10') }} <span id="count"></span></p>
                            <a id="clear">{{ __('app.find11') }}</a>
                        </div>
                        <div class="no_mob" style="direction: ltr">
                            <div class="name" style="direction: rtl">
                                {{ __('app.find12') }}
                            </div>
                            @include('layouts.recomended')
                        </div>
                    </div>
                </div>
                <div class="filter mob">
                    <button class="top-button big send_btn"><span></span> {{ __('app.find4') }}</button>
                    <div class="line"></div>
                    <div class="name">
                        {{ __('app.find12') }}
                    </div>
                    @include('layouts.recomended')
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.list').each(function () {
                if ($(this).children('input:checked').length > 0) {
                    $(this).siblings('input').prop('checked', true);
                } else {
                    $(this).siblings('input').prop('checked', false);
                }
            });

            $('.list').children('input').change(function () {
                if ($(this).parent().children('input:checked').length > 0) {
                    $(this).parent().siblings('input').prop('checked', true);
                    $('#chf').prop('checked', false);
                } else {
                    $(this).parent().siblings('input').prop('checked', false);
                }
            });

            $('.list').prev().prev('input').change(function () {
                if ($(this).is(':checked')) {
                    $(this).next().next('.list').children('input').prop('checked', true);
                    $('#chf').prop('checked', false);
                } else {
                    $(this).next().next('.list').children('input').prop('checked', false);
                }
            });

            $('#chf').change(function () {
                if ($(this).is(':checked')) {
                    $(this).parent().parent().find('input').not(this).prop('checked', false);
                }
            });

            $('#next').click(function () {
                $('.profile-page .steps ul li a.s2').click();
                $(document).scrollTop(0);
            });

            $('#save').click(function () {
                var new_project19 = '{{ __('app.new_project19') }}',
                    new_project20 = '{{ __('app.new_project20') }}';
                $.ajax({
                    url: "{{ route('new_project') }}",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $('#proj_form').serialize(),
                }).done(function (data) {
                    show_alert(data[1]);
                    if (data[0] === 1) {
                        $('.project').val(data[2]);
                        $('.profile-page .steps ul li a.s2').removeClass('active');
                        $('.profile-page .steps ul li a.s3').addClass('active');
                        $('.profile-page .content.c2').removeClass('active');
                        $('.profile-page .content.c3').addClass('active');
                        $(document).scrollTop(0);
                        $('#quest').empty().append(`<div class="fields-name">
                            <img src="img/name10.svg"> ${new_project19}
                        </div>
                        <div class="field-name">
                            ${data[3]}
                        </div>
                        <div class="button flex">
                        <button type="button" id="new_quest"> ${new_project20}
                    </button>
                    </div>`);
                    } else {
                        $('.profile-page .steps ul li a.s2').removeClass('active');
                        $('.profile-page .steps ul li a.s1').addClass('active');
                        $('.profile-page .content.c2').removeClass('active');
                        $('.profile-page .content.c1').addClass('active');
                        $('.inp').each(function (index) {
                            if ($(this).val() > '') {
                                $(this).parent('div').removeClass('bad').addClass('ok');
                            } else {
                                $(this).parent('div').removeClass('ok').addClass('bad');
                            }
                        });

                        $(document).scrollTop(0);
                    }
                });
            });

            $('#mails').click(function () {
                $.ajax({
                    url: "{{ route('resource') }}?mails=" + $(this).prev('input').val(),
                }).done(function (data) {
                    show_alert(data);
                });
            });

            function get_sub(val) {
                $.ajax({
                    url: "{{ route('resource') }}?get_sub=" + val,
                }).done(function (data) {
                    $('#subcategory').html(data);
                    $('#subcategory').children('option').prop('selected', false);
                    $('#subcategory').children('option').first().prop('selected', true);
                    get_count();
                });
            }

            @isset($request->category)
            get_sub({{ $request->category }});
            @endisset
            $('#category').change(function () {
                get_sub($(this).val());
            });

            var res;

            function get_count(clear) {
                var cat = $('#category').val(),
                    subcat = $('#subcategory').val(),
                    spec = $('#specialization').val(),
                    find13 = '{{  __('app.find13') }}';
                if (clear == 'clear') {
                    cat = 'null';
                    subcat = 'null';
                    spec = 'null';
                }
                $.ajax({
                    url: "{{ route('resource') }}?cat=" + cat + "&subcat=" + subcat + "&spec=" + spec,
                }).done(function (data) {
                    $('#count').html(`
                        ${data[0]}<a id="view"> ${find13}</a>
                    `);
                    res = data[1];
                });
            }

            function get_quest(type) {
                var new_project18 = '{{ __('app.new_project19') }}';
                $.ajax({
                    url: "{{ route('resource') }}?type=" + type,
                }).done(function (data) {
                    if (data[0] > 0) {
                        $('#quest').empty().append(data[1]);
                    } else {
                        $('#quest').empty().append(`<div class="fields-name">
                                                        ${new_project18}
                                                    </div>`);
                    }
                });
            }

            $('#type').change(function () {
                get_quest($(this).val());
            });
            $('#quest').on('click', '#new_quest', function () {
                get_quest($('#type').val());
            });
            @empty($project->questions)
            get_quest($('#type').val());
            @endempty

            $('#count').on('click', '#view', function () {
                $('#result').empty().append(res);
            });

            $('.filter').find('select').change(function () {
                get_count();
            });

            $('#clear').click(function () {
                $('.filter').find('select').children('option').prop('selected', false);
                get_count('clear');
            });

            $('.inp').on('input', function () {
                if ($(this).val() > '') {
                    $(this).parent('div').removeClass('bad').addClass('ok');
                } else {
                    $(this).parent('div').removeClass('ok').addClass('bad');
                }
            });

            $('.send_btn').click(function () {
                var new_project21 = '{{ __('app.new_project21') }}';
                $.ajax({
                    url: "{{ route('requested') }}",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $('#send_form').serialize(),
                }).done(function (data) {
                    show_alert(data[1]);
                    $('#send_form').find('.checkbox:checked').siblings('.only_send').addClass('active').html(`<span></span>${new_project21}`);
                });
            });

            $('#result').on('click', '.only_send', function () {
                var data = 'company[]=' + $(this).siblings('.checkbox').val() + '&project[]=' + $('.project').val(),
                    th = $(this),
                    new_project21 = '{{ __('app.new_project21') }}';
                $.ajax({
                    url: "{{ route('requested') }}",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: data,
                }).done(function (data) {
                    show_alert(data[1]);
                    if (data[0] === 1) {
                        th.addClass('active').html(`<span></span>${new_project21}`);
                    }
                });
            });
        });
    </script>

@endsection
