@extends('layouts.app')

@section('title', __('app.edit_prof_title'))

@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                {{ __('app.edit_prof1') }} <i class="fa fa-angle-left"></i> <a href="{{ route('profile') }}">{{ __('app.edit_prof1') }}</a> <i
                    class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.edit_prof3') }}</a>
            </div>
            <h1>{{ __('app.edit_prof4') }}</h1>
        </div>
        @isset ($profile->id)
            <div class="subscribe-block">
                @isset($profile->subscription)
                    <div class="date">
                        {{ __('app.edit_prof5') }}
                        <span>{{ \Illuminate\Support\Carbon::parse($profile->subscription)->format('d.m.Y H:i') }}</span>
                    </div>
                @endisset
                <a href="{{ route('payment') }}">
                    <button><span></span> {{ __('app.edit_prof6') }}</button>
                </a>
            </div>
        @endisset
    </div>
    <div class="profile-page">
        <div class="steps">
            <ul>
                <li><a class="s1 active">{{ __('app.edit_prof7') }}</a></li>
                <li><a class="s2">{{ __('app.edit_prof8') }}</a></li>
                <li><a class="s3">{{ __('app.edit_prof9') }}</a></li>
            </ul>
        </div>
        <div class="mob-steps">
            <div class="step s1">{{ __('app.edit_prof7') }}</div>
            <div class="step s2">{{ __('app.edit_prof8') }}</div>
            <div class="step s3">{{ __('app.edit_prof9') }}</div>
        </div>
        <form id="edit-form" method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
            @csrf
            <div class="content c1 active">
                <div class="flex">
                    <div class="photo">
                        <div id="upload_image" class="upload"
                             style="@isset($profile->image) background-image:  url({{ asset('storage/' . $profile->image) }});  @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                            <label>
                                <span id="logo">{{ __('app.edit_prof10') }}</span>
                                <input type="file" id="image" accept="image/jpeg,image/png" hidden
                                       autocomplete="off">
                            </label>
                        </div>
                        <p>{{ __('app.edit_prof11') }}</p>
                        <p>{{ __('app.edit_prof12') }}</p>
                    </div>
                    <div class="fields">
                        <div class="field-name">
                            {{ __('app.edit_prof13') }}
                        </div>
                        <div class="field">
                            <input class="inp" name="name" type="text"
                                   value="@isset ($profile->name) {{ $profile->name }} @endisset" autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof14') }}
                        </div>
                        <div class="field">
                            <input class="inp" name="address" type="text"
                                   value="@isset ($profile->address) {{ $profile->address }} @endisset"
                                   autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof15') }}
                        </div>
                        <div class="field">
                            <input class="inp ltr" name="phone_whatsapp" type="text"
                                   value="@isset ($profile->phone_whatsapp) {{ $profile->phone_whatsapp }} @endisset"
                                   autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof16') }}
                        </div>
                        <div class="field">
                            <input class="inp ltr" name="email" type="text"
                                   value="@isset ($profile->email) {{ $profile->email }} @endisset" autocomplete="off">
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name1.svg') }}"> {{ __('app.edit_prof17') }}
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof18') }}
                        </div>
                        <div class="field">
                            <select id="category" name="category" autocomplete="off">
                                @if (!isset($profile->category_id))
                                    <option value="" class="op_f">-------</option>
                                @endif
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if (isset($profile->category_id) and $profile->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="link">
                            <a id="add_category">{{ __('app.edit_prof19') }}</a>
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof20') }}
                        </div>
                        <div class="field">
                            <select id="subcategory" name="subcategory" autocomplete="off">
                            </select>
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof21') }}
                        </div>
                        <div class="field">
                            <select name="specialization_id" autocomplete="off">
                                @if (!isset($profile->specialization_id))
                                    <option value="" class="op_f">-------</option>
                                @endif
                                @isset($specializations)
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}"
                                                @if (isset($profile->specialization_id) and $profile->specialization_id == $specialization->id) selected @endif>{{ $specialization->title }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof22') }}
                        </div>
                        <div class="field">
                            <input class="inp" name="specialization" type="text"
                                   value="@isset ($profile->specialization_list) {{ $profile->specialization_list }} @endisset" autocomplete="off">
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name2.svg') }}"> {{ __('app.edit_prof23') }}
                        </div>
                        <div id="upload_pdf" class="upload">
                            <label>
                                <span>{{ __('app.edit_prof24') }}</span>
                                <input type="file" id="pdf" accept="application/pdf" hidden
                                       autocomplete="off">
                            </label>
                        </div>
                        <div class="files">
                            <div id="pdf_file" class="item" @if(!isset($profile->pdf)) style="display: none" @endisset>
                                @isset($profile->pdf)
                                    <a target="_blank" href="{{ asset('storage/' . $profile->pdf) }}"><img
                                            src="{{ asset('img/pdf.svg') }}">{{ __('app.edit_prof25') }}</a><a
                                        class="delete"></a>
                                @endisset
                            </div>
                        </div>
                        <div class="att">
                            <div class="name">
                                {{ __('app.edit_prof26') }}
                            </div>
                            {!! __('app.edit_prof27') !!}
                        </div>
                        <div class="button">
                            <button type="button" class="n">{{ __('app.edit_prof28') }} <span></span></button>
                            <a href="" onclick="event.preventDefault(); document.getElementById('edit-form').submit();">{{ __('app.edit_prof29') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content c2 other">
                <div class="flex">
                    <div class="fields big">
                        <div class="field-name">
                            {{ __('app.edit_prof30') }}
                        </div>
                        <div class="field">
                            <input class="inp" name="contact_person" type="text"
                                   value="@isset ($profile->contact_person ) {{ $profile->contact_person  }} @endisset"
                                   autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof31') }}
                        </div>
                        <div class="field flex">
                            <input class="inp tel2 ltr" name="contact_phone" type="text"
                                   value="@isset ($profile->contact_phone ) {{ $profile->contact_phone }} @endisset"
                                   autocomplete="off">
                            <input class="inp tel1 ltr" name="contact_phone_d" type="text" placeholder="{{ __('app.items6') }}"
                                   value="@isset ($profile->contact_phone_d ) {{ $profile->contact_phone_d  }} @endisset"
                                   autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof32') }}
                        </div>
                        <div class="field">
                            <input class="inp ltr" name="telegram" type="text"
                                   value="@isset ($profile->telegram ) {{ $profile->telegram }} @endisset"
                                   autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof33') }}
                        </div>
                        <div class="field">
                            <input class="inp ltr" name="viber" type="text"
                                   value="@isset ($profile->viber ) {{ $profile->viber }} @endisset" autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof34') }}
                        </div>
                        <div class="field">
                        <textarea class="inp" name="description"
                                  placeholder="{{ __('app.edit_prof35') }}">@isset ($profile->description ) {{ $profile->description }} @endisset</textarea>
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name3.svg') }}"> {{ __('app.edit_prof36') }}Регионы оказания услуг
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof37') }}
                        </div>
                        <div class="regions">
                            <div class="item">
                                <input name="regions[]" type="checkbox" class="checkbox reg" value="{{ __('app.all_israile') }}"
                                       id="chf"
                                       @if(isset($project->regions) and isset(explode('|', $profile->regions)[1]) and explode('|', $profile->regions)[1] == __('app.all_israile')) checked
                                       @endif autocomplete="off"><label
                                    for="chf">{{ __('app.all_israile') }}</label>
                            </div>
                            @forelse($regions[0] as $region)
                                <div class="item">
                                    <a class="link"><i class="fa fa-angle-left"></i></a>
                                    <input type="checkbox" class="checkbox" id="ch{{ $region->id }}" autocomplete="off">
                                    <label for="ch{{ $region->id }}">{{ $region->title }}</label>
                                    <div class="list">
                                        @if (isset($regions[$region->id]))
                                            @foreach($regions[$region->id] as $reg)
                                                <input name="regions[]" type="checkbox" class="checkbox"
                                                       id="ch{{ $reg->id }}" value="{{ $reg->title }}"
                                                       @if(isset($profile->regions) and in_array($reg->title, explode('|', $profile->regions))) checked
                                                       @endif autocomplete="off">
                                                <label
                                                    for="ch{{ $reg->id }}">{{ $reg->title }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @empty
                            <div class="item">
                                    <h5>Регионов не найдено</h5>
                                </div>
                            @endforelse
                        </div>
                        <div class="line"></div>
                        <div class="button">
                            <a class="next"></a>
                            <button type="button" class="n">{{ __('app.edit_prof28') }} <span></span></button>
                            <a href="" onclick="event.preventDefault(); document.getElementById('edit-form').submit();">{{ __('app.edit_prof29') }}</a> <a class="prev">{{ __('app.edit_prof291') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content c3 other">
                <div class="flex">
                    <div class="fields big">
                        <div class="field-name">
                            {{ __('app.edit_prof38') }}
                        </div>
                        <div class="field">
                            <input class="inp ltr" name="site" type="text"
                                   value="@isset ($profile->site ) {{ $profile->site }} @endisset" autocomplete="off">
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof39') }}
                        </div>
                        <div class="field">
                            <select name="experience" autocomplete="off">
                                <option value="">-------</option>
                                @foreach($exps as $exp)
                                    <option value="{{ $exp->title }}"
                                            @if(isset($profile->experience) and $profile->experience == $exp->title) selected @endif>{{ $exp->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field-name">
                            {{ __('app.edit_prof40') }}
                        </div>
                        <div class="field">
                            <select name="amountworkers" autocomplete="off">
                                <option value="">-------</option>
                                @foreach($amounts as $amount)
                                    <option value="{{ $amount->title }}"
                                            @if(isset($profile->amountworkers) and $profile->amountworkers == $amount->title) selected @endif>{{ $amount->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name4.svg') }}"> {{ __('app.edit_prof41') }}
                        </div>
                        <div class="regions">
                            @foreach($others[0] as $other)
                                <div class="item">
                                    <a class="link"><i class="fa fa-angle-left"></i></a>
                                    <input type="checkbox" class="checkbox" name="others[]"
                                           value="<>{{ $other->title }}" id="ot{{ $other->id }}" autocomplete="off">
                                    <label for="ot{{ $other->id }}">{{ $other->title }}</label>
                                    <div class="list">
                                        @if (isset($others[$other->id]))
                                            @foreach($others[$other->id] as $oth)
                                                <input name="others[]" type="checkbox" class="checkbox"
                                                       id="ot{{ $oth->id }}" value="{{ $oth->title }}"
                                                       @if(isset($profile->others) and in_array($oth->title, explode('|', $profile->others))) checked
                                                       @endif autocomplete="off">
                                                <label
                                                    for="ot{{ $oth->id }}">{{ $oth->title }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="link other">
                            <a id="add_cert">{{ __('app.edit_prof42') }}</a>
                        </div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name5.svg') }}"> {{ __('app.edit_prof43') }}
                        </div>
                        <div class="line"></div>
                        <div class="time-select">
                            <input type="checkbox" class="checkbox timeinp" id="time1" name="time1"
                                   @if(isset($profile->mode_week)) checked @endif autocomplete="off">
                            <label for="time1">
                                <div class="pre">{{ __('app.edit_prof44') }}</div>
                                <label @if(!isset($profile->mode_week)) style="display: none" @endif>
                                    <select name="starttime1" autocomplete="off">
                                        @for($i=6; $i<21; $i++)
                                            <option
                                                value="{{ substr('0' . $i, -2) . ':00' }}"
                                                @if(isset($profile->mode_week) and explode('|', $profile->mode_week)[0] == substr('0' . $i, -2) . ':00') selected @endif>{{ substr('0' . $i, -2) . ':00' }}</option>
                                        @endfor
                                    </select>
                                    <span>—</span>
                                    <select name="endtime1" autocomplete="off">
                                        @for($i=6; $i<21; $i++)
                                            <option
                                                value="{{ substr('0' . $i, -2) . ':00' }}"
                                                @if(isset($profile->mode_week) and explode('|', $profile->mode_week)[1] == substr('0' . $i, -2) . ':00') selected @endif>{{ substr('0' . $i, -2) . ':00' }}</option>
                                        @endfor
                                    </select>
                                </label>
                            </label>
                            <input type="checkbox" class="checkbox timeinp" id="time2" name="time2"
                                   @if(isset($profile->mode_sat)) checked @endif autocomplete="off">
                            <label for="time2">
                                <div class="pre">{{ __('app.edit_prof45') }}</div>
                                <label @if(!isset($profile->mode_sat)) style="display: none" @endif>
                                    <select name="starttime2" autocomplete="off">
                                        @for($i=6; $i<21; $i++)
                                            <option
                                                value="{{ substr('0' . $i, -2) . ':00' }}"
                                                @if(isset($profile->mode_sat) and explode('|', $profile->mode_sat)[0] == substr('0' . $i, -2) . ':00') selected @endif>{{ substr('0' . $i, -2) . ':00' }}</option>
                                        @endfor
                                    </select>
                                    <span>—</span>
                                    <select name="endtime2" autocomplete="off">
                                        @for($i=6; $i<21; $i++)
                                            <option
                                                value="{{ substr('0' . $i, -2) . ':00' }}"
                                                @if(isset($profile->mode_sat) and explode('|', $profile->mode_sat)[1] == substr('0' . $i, -2) . ':00') selected @endif>{{ substr('0' . $i, -2) . ':00' }}</option>
                                        @endfor
                                    </select>
                                </label>
                            </label>
                            <input type="checkbox" class="checkbox" id="time3" name="time3"
                                   @if (isset($profile->mode_alw) and $profile->mode_alw == 1) checked
                                   @endif autocomplete="off">
                            <label for="time3">
                                <div class="pre">{{ __('app.edit_prof46') }}</div>
                            </label>
                        </div>
                        <div class="shabbat">
                            <input type="checkbox" class="checkbox" id="time4" name="time4"
                                   @if (isset($profile->shabat) and $profile->shabat == 1) checked
                                   @endif autocomplete="off">
                            <label for="time4">
                                {{ __('app.edit_prof47') }}
                            </label>
                        </div>
                        <div class="line"></div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name6.svg') }}"> {{ __('app.edit_prof48') }}
                        </div>
                        <div id="upload_reviews" class="upload">
                            <label>
                                <span>{{ __('app.edit_prof49') }}</span>
                                <input type="file" id="reviews" accept="application/pdf" hidden
                                       autocomplete="off" multiple>
                            </label>
                        </div>
                        <div id="reviews_files" class="files">
                            @isset($profile->reviews)
                                @foreach ($profile->reviews as $review)
                                    <div class="item">
                                        <a data-caption="{{ $review->file_name }}" data-fancybox="reviews"
                                           href="{{ asset('storage/' . $review->path) }}">
                                            <img src="{{ asset('img/pdf.svg') }}">
                                            <span>{{ $review->file_name }}</span>
                                        </a>
                                        <a class="delete review_del"></a>
                                        <input value="{{ $review->id }}" hidden autocomplete="off">
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <div class="att">
                            <div class="name">
                                {{ __('app.edit_prof26') }}
                            </div>
                            {!! __('app.edit_prof50') !!}
                        </div>
                        <div class="fields-name">
                            <img src="{{ asset('img/name7.svg') }}"> {{ __('app.edit_prof51') }}
                        </div>
                        <div id="upload_gallery" class="upload">
                            <label>
                                <span>{{ __('app.edit_prof52') }}</span>
                                <input type="file" id="gallery" accept="image/jpeg,image/png" hidden
                                       autocomplete="off" multiple>
                            </label>
                        </div>
                        <div class="att other">
                            {!! __('app.edit_prof53') !!}
                        </div>
                        <div class="uploaded">
                            <p>{{ __('app.edit_prof54') }}</p>
                            <div id="gallery_files" class="flex2">
                                @isset($profile->images)
                                    @foreach ($profile->images as $image)
                                        <div class="item">
                                            <a data-caption="{{ $image->file_name }}" data-fancybox="gallery"
                                               href="{{ asset('storage/' . $image->path) }}">
                                                <img src="{{ asset('storage/' . $image->path) }}">
                                            </a>
                                            <a class="image_del"><strong>{{ __('app.edit_prof55') }}</strong></a>
                                            <p>{{ $image->file_name }}</p>
                                            <input value="{{ $image->id }}" hidden autocomplete="off">
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                        <div class="button">
                            <a href="#" class="next"></a>
                            <button type="submit" class="finish"><span></span> {{ __('app.edit_prof56') }}</button>
                            <a class="prev other">{{ __('app.edit_prof291') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="popup cat">
        <div class="window">
            <a class="close"></a>
            <p>{{ __('app.add_new_work_category') }}</p>
            <div class="field-name">
                {{ __('app.name_of_category') }}
            </div>
            <input id="title" type="text" placeholder="{{ __('app.enter_the_title') }}">
            <textarea id="text" placeholder="{{ __('app.describe_added_category') }}"></textarea>
            <button id="send_category">{{ __('app.response') }}</button>
        </div>
    </div>

    <div class="popup cert">
        <div class="window">
            <a class="close"></a>
            <p>{{ __('app.edit_prof57') }}</p>
            <div class="field-name">
                {{ __('app.edit_prof58') }}
            </div>
            <input id="title" type="text" placeholder="{{ __('app.enter_the_title') }}">
            <textarea id="text" placeholder="{{ __('app.edit_prof59') }}"></textarea>
            <button id="send_cert">{{ __('app.edit_prof60') }}</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#send_category').click(function () {
                $.ajax({
                    url: "{{ route('resource') }}?need=Category" + '&title=' + $(this).siblings('#title').val() + '&text=' + $(this).siblings('#text').val(),
                }).done(function (data) {
                    $('.popup.cat').find('.close').click();
                    show_alert(data);
                });
            });

            $('#send_cert').click(function () {
                $.ajax({
                    url: "{{ route('resource') }}?need=Sertificat" + '&title=' + $(this).siblings('#title').val() + '&text=' + $(this).siblings('#text').val(),
                }).done(function (data) {
                    $('.popup.cat').find('.close').click();
                    show_alert(data);
                });
            });

            $('#add_category').click(function () {
                $('.popup.cat').fadeIn();
            });
            $('#add_cert').click(function () {
                $('.popup.cert').fadeIn();
            });

            function get_sub(val) {
                $.ajax({
                    url: "{{ route('resource') }}?get_sub=" + val,
                }).done(function (data) {
                    $('#subcategory').html(data);
                });
            }

            $('.list').each(function () {
                if ($(this).children('input:checked').length > 0) {
                    $(this).siblings('input').prop('checked', true);
                } else {
                    $(this).siblings('input').prop('checked', false);
                }
            });
            @isset($profile->category_id)
            get_sub({{ $profile->category_id }});
            @endisset
            $('#category').change(function () {
                get_sub($(this).val());
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
            $('.timeinp').change(function () {
                if ($(this).prop('checked')) {
                    $(this).next('label').children('label').css('display', 'inline');
                } else {
                    $(this).next('label').children('label').css('display', 'none');
                }
            });
            $('.inp').on('input', function () {
                if ($(this).val() > '') {
                    $(this).parent('div').removeClass('bad').addClass('ok');
                } else {
                    $(this).parent('div').removeClass('ok').addClass('bad');
                }
            });
        });
    </script>
@endsection
