@extends('layouts.app')

@section('title', __('app.find_title'))

@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                @if(isset($request->category) and isset($request->subcategory))
                    <a href="{{ route('find', ['category' => $request->category, 'subcategory' => $request->subcategory]) }}">{{ $all_categories[$request->category]->where('id', $request->subcategory)->first()->title }}</a>
                    <i class="fa fa-angle-left"></i>
                @endif
                @if(isset($request->category))
                    <a href="{{ route('find', ['category' => $request->category]) }}">{{ $all_categories[0]->where('id', $request->category)->first()->title }}</a>
                    <i class="fa fa-angle-left"></i>
                @endif
                <a href="{{ route('find') }}">{{  __('app.find1') }}</a>
                <i class="fa fa-angle-left"></i>
                <a href="{{ route('home') }}">{{  __('app.find2') }}</a>
            </div>
            <h1>{{  __('app.find3') }}</h1>
        </div>
    </div>
    <div class="profile-page">
        <div class="content c2 other2 active">
            <div class="flex">
                <div class="list">
                    <div class="flex">
                        <button type="button" class="send-btn top-button big send_btn"><span></span> {{  __('app.find4') }}
                        </button>
                        <div class="selected">
                            {{  __('app.find5') }} <span></span>
                            <a id="all_check">{{  __('app.find6') }}</a>
                        </div>
                    </div>
                    <div class="search">
                        <div class="flex">
                            <p>{{  __('app.find7') }}</p>
                        </div>
                        <input type="text" name="mails" placeholder="{{  __('app.find8') }}">
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
                        <img src="{{ asset('img/name12.svg') }}"> {{  __('app.find9') }}
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
                            <p>{{  __('app.find10') }} <span id="count"></span></p>
                            <a id="clear">{{  __('app.find11') }}</a>
                        </div>
                        <div class="no_mob" style="direction: ltr">
                            <div class="name" style="direction: rtl">
                                {{  __('app.find12') }}
                            </div>
                            @include('layouts.recomended')
                        </div>
                    </div>
                </div>
                <div class="filter mob">
                    <button class="top-button big send_btn"><span></span> {{  __('app.find4') }}</button>
                    <div class="line"></div>
                    <div class="name">
                        {{  __('app.find12') }}
                    </div>
                    @include('layouts.recomended')
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
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
                if (clear === 'clear') {
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
                document.location.href = '{{ route('requested') }}?' + $('#send_form').serialize();
            });

            $('#result').on('click', '.only_send', function () {
                document.location.href = '{{ route('requested') }}?company[]=' + $(this).siblings('.checkbox').val();
            });
        });
    </script>

@endsection
