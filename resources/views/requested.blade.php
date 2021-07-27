@extends('layouts.app')

@section('title', __('app.requested_title'))

@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                {{ __('app.requested_title') }} <i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.requested1') }}</a>
            </div>
            <h1>{{ __('app.requested_title') }}</h1>
        </div>
    </div>
    <div class="profile-page">
        <div class="steps">
            <ul>
                <li><a class="s1 @empty($request->project) active @endempty">{{ __('app.requested2') }}</a></li>
                <li><a class="s2 @isset($request->project) active @endisset">{{ __('app.requested3') }}</a></li>
            </ul>
        </div>
        <div class="content c1 other2 @empty($request->project) active @endempty">
            <div class="flex">
                <div class="list">
                    <div class="flex">
                        <button class="top-button send_btn"><span></span> {{ __('app.requested4') }}</button>
                    </div>
                    <form id="project_form">
                        <div class="projects-page find active flex2">
                            @foreach($projects as $project)
                                <div class="item">
                                    <div class="main-info">
                                        <input type="checkbox" class="checkbox" id="proj{{ $project->id }}"
                                               name="project[]" value="{{ $project->id }}"
                                               @if($project->id == $request->project) checked @endif><label
                                            for="proj{{ $project->id }}">{{ __('app.requested5') }}</label>
                                        <div class="flex">
                                            <div class="date">
                                                ID {{ $project->id }}
                                                <span>{{ \Illuminate\Support\Carbon::parse($project->created_at)->format('d.m.Y H:i') }}</span>
                                            </div>
                                            <div class="views">
                                                {{ $project->views }}
                                            </div>
                                        </div>
                                        <a href="{{ route('projects', ['project' => $project->id]) }}"
                                           class="name">{{ $project->title }}</a>
                                        <p class="ellipsis">{{ $project->text }}</p>
                                    </div>
                                    <div class="button flex">
                                        @if (isset($project->responses) and $project->responses->count() > 0)
                                            <div class="count">
                                                @if ($project->responses->where('read', 0)->count() > 0)
                                                    <span>+ {{ $project->responses->where('read', 0)->count() }}</span>
                                                @endif
                                                {{ $project->responses->count() }}<a
                                                    href="{{ route('projects', ['proj' => $project->id]) }}">{{ __('app.requested6') }}</a>
                                            </div>
                                        @else
                                            <div class="count no2">
                                                {{ __('app.requested7') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="filter">
                    <div class="block">
                        <div class="no_mob">
                            <div class="name">
                                {{ __('app.find12') }}
                            </div>
                            @include('layouts.recomended')
                        </div>
                    </div>
                </div>
                <div class="filter mob">
                    <button class="top-button big send_btn"><span></span> {{ __('app.requested8') }}</button>
                    <div class="line"></div>
                    <div class="name">
                        {{ __('app.find12') }}
                    </div>
                    @include('layouts.recomended')
                </div>
            </div>
        </div>
        <div class="content c2 other2 @isset($request->project) active @endisset">
            <div class="flex">
                <div class="list">
                    <div class="flex">
                        <button type="button" class="send-btn top-button big send_btn"><span></span>{{ __('app.find4') }}
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

            $('.list').children('input').change(function () {
                if ($(this).parent().children('input:checked').length > 0) {
                    $(this).parent().siblings('input').prop('checked', true);
                } else {
                    $(this).parent().siblings('input').prop('checked', false);
                }
            });

            @isset($request->company)
            $('.comp').find('.checkbox').prop('checked', true);

            @endisset

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

            $('#mails').click(function () {
                $.ajax({
                    url: "{{ route('resource') }}?mails=" + $(this).prev('input').val(),
                }).done(function (data) {
                    show_alert(data);
                });
            });

            $('.send_btn').click(function () {
                var data = $('#send_form').serialize() + '&' + $('#project_form').serialize(),
                    new_project21 = '{{ __('app.new_project21') }}';
                $.ajax({
                    url: "{{ route('requested') }}",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: data,
                }).done(function (data) {
                    show_alert(data[1]);
                    $('#send_form').find('.checkbox:checked').siblings('.only_send').addClass('active').html(`<span></span>${new_project21}`);
                });
            });

            $('#result').on('click', '.only_send', function () {
                var data = 'company[]=' + $(this).siblings('.checkbox').val() + '&' + $('#project_form').serialize(),
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
