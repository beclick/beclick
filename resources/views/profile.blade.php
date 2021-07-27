@extends('layouts.app')

@isset($company)
    @section('title', $profile->name)
@else
    @section('title', __('app.prof_title'))
@endisset


@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                @isset($company)
                    <a href="{{ route('company', ['id' => $profile->id]) }}">{{ $profile->name }}</a>
                    <i class="fa fa-angle-left"></i>
                    @if(isset($profile->category) and isset($profile->subcategory))
                        <a href="{{ route('find', ['category' => $profile->category_id, 'subcategory' => $profile->subcategory_id]) }}">{{ $all_categories[$profile->category_id]->where('id', $profile->subcategory_id)->first()->title }}</a>
                        <i class="fa fa-angle-left"></i>
                    @endif
                    @if(isset($profile->category))
                        <a href="{{ route('find', ['category' => $profile->category_id]) }}">{{ $all_categories[0]->where('id', $profile->category_id)->first()->title }}</a>
                        <i class="fa fa-angle-left"></i>
                    @endif
                    <a href="{{ route('find') }}">{{ __('app.prof1') }}</a>
                    <i class="fa fa-angle-left"></i>
                    <a href="{{ route('home') }}">{{ __('app.prof2') }}</a>
                @else
                    <a href="">{{ __('app.prof_title') }}</a><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.prof2') }}</a>
                @endisset
            </div>
            <div class="company">
                <div class="avatar"
                     style="width: 10rem; height: 10rem; @isset($profile->image) background-image: url({{ asset('storage/' . $profile->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                </div>
                <div style="padding-right: 3rem">
                    <h1>@isset($profile->name) {{ $profile->name }} @endisset</h1>
                    <div class="links">
                        <a onclick="copytext('{{ route('company', ['id' => $profile->id]) }}'); this.innerText = '{{ __('app.prof6') }}'">{{ __('app.prof3') }}</a>
                        @isset($company)
                            <a class="favorite">{{ __('app.prof4') }}</a>
                            <a class="comp">{{ __('app.prof5') }}</a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        @empty($company)
            <div class="subscribe-block">
                @if (isset($profile->subscription) and $subscription == true)
                    <div class="date">
                        {{ __('app.prof7') }}
                        <span>{{ \Illuminate\Support\Carbon::parse($profile->subscription)->format('d.m.Y H:i') }}</span>
                    </div>
                    <a href="{{ route('payment') }}">
                        <button><span></span> {{ __('app.prof8') }}</button>
                    </a>
                @elseif ($subscription == true)
                    <button><span></span> {{ __('app.prof9') }}</button>
                @else
                    <a href="{{ route('payment') }}">
                        <button><span></span> {{ __('app.prof10') }}</button>
                    </a>
                @endif
            </div>
        @endempty
    </div>
    <div class="company-mob-block">
        <div class="links">
            <a onclick="copytext('{{ route('company', ['id' => $profile->id]) }}')"></a>
            @isset($company)
                <a class="favorite"></a>
                <a class="comp"></a>
            @endisset
        </div>
        @isset ($profile->pdf)
            <div class="pdf">
                <div><img src="{{ asset('img/pdf2.svg') }}"></div>
                <div><a data-fancybox="profile2" href="{{ asset('storage/' . $profile->pdf) }}">{{ __('app.prof11') }}</a>
                </div>
            </div>
        @endisset
    </div>
    <div class="company-page flex">
        <div class="info">
            <div class="name">
                <img src="{{ asset('img/name8.svg') }}"> {{ __('app.prof12') }}
            </div>
            <div class="block">
                <div class="flex">
                    <div class="col">
                        <div class="item">
                            @isset($profile->contact_phone)
                                {{ __('app.prof13') }}
                                <span>{{ $profile->contact_phone }} @isset($profile->contact_phone_d)
                                        {{ __('app.items6') }} {{ $profile->contact_phone_d }} @endisset</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->phone_whatsapp)
                                {{ __('app.prof14') }}
                                <span><a class="wa" href="">{{ $profile->phone_whatsapp }}</a></span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->telegram)
                                {{ __('app.prof15') }}
                                <span>{{ $profile->telegram }}</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->viber)
                                {{ __('app.prof16') }}
                                <span>{{ $profile->viber }}</span>
                            @endisset
                        </div>
                    </div>
                    <div class="col">
                        <div class="item">
                            @isset($profile->address)
                                {{ __('app.prof17') }}
                                <span>{{ $profile->address }}</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->email)
                                {{ __('app.prof18') }}
                                <span><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->contact_person)
                                {{ __('app.prof19') }}
                                <span>{{ $profile->contact_person }}</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->regions)
                                {{ __('app.prof20') }}
                                <span>
                                    @foreach (explode('|', $profile->regions) as $region)
                                        @if ($loop->index > 0)
                                            <p>{{ $region }}</p>
                                        @endif
                                    @endforeach
                                </span>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="name">
                <img src="{{ asset('img/name1.svg') }}"> {{ __('app.prof21') }}
            </div>
            <div class="block">
                <div class="item">
                    @isset($profile->category)
                        {{ __('app.prof22') }}
                        <span>{{ $profile->category->title }}</span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->subcategory)
                        {{ __('app.prof23') }}
                        <span>{{ $profile->subcategory->title }}</span>
                    @endisset
                </div>
                <div class="item">
                    @if(isset($profile->specialization) or isset($profile->specialization_list))
                        {{ __('app.prof24') }}
                    @endif
                    @isset($profile->specialization)
                        <span>{{ $profile->specialization->title }}</span>
                    @endisset
                    @isset($profile->specialization_list)
                        <span>{{ $profile->specialization_list }}</span>
                    @endisset
                </div>
            </div>
            <div class="line"></div>
            <div class="name">
                <img src="{{ asset('img/name1.svg') }}"> {{ __('app.prof25') }}
            </div>
            <div class="block">
                <div class="item">
                    @isset($profile->description)
                        {{ __('app.prof26') }}
                        <span>{{ $profile->description }}</span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->site)
                        {{ __('app.prof27') }}
                        <span><a href="{{ $profile->site }}">{{ $profile->site }}</a></span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->experience)
                        {{ __('app.prof28') }}
                        <span>{{ $profile->experience }}</span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->amountworkers)
                        {{ __('app.prof29') }}
                        <span>{{ $profile->amountworkers }}</span>
                    @endisset
                </div>
            </div>
            <div class="line"></div>
            @isset($profile->others)
                @foreach (explode('<>', $profile->others) as $others)
                    @if ($loop->index > 0 and isset($others))
                        <div class="name">
                            <img src="{{ asset('img/name4.svg') }}">{{ explode('|', $others)[0] }}
                        </div>
                        <div class="block">
                            <ul class="docs">
                                @isset($others)
                                    @foreach (explode('|', $others) as $other)
                                        @if ($loop->index > 0)
                                            <li>{{ $other }}</li>
                                        @endif
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    @endif
                @endforeach
                <div class="line"></div>
            @endisset
            <div class="name">
                <img src="{{ asset('img/name5.svg') }}"> {{ __('app.prof30') }}
            </div>
            <div class="block">
                <div class="hours">
                    @if ($profile->mode_alw == 1)
                        <p> {{ __('app.prof31') }} </p>
                    @else
                        <p>
                            @isset($profile->mode_week)
                                {{ __('app.prof32') }} {{ explode('|', $profile->mode_week)[0] }}
                                {{ __('app.prof33') }} {{ explode('|', $profile->mode_week)[1] }}
                            @endisset
                        </p>
                        <p>
                            @isset($profile->mode_sat)
                                {{ __('app.prof34') }} {{ explode('|', $profile->mode_sat)[0] }}
                                {{ __('app.prof33') }} {{ explode('|', $profile->mode_sat)[1] }}
                            @endisset
                        </p>
                    @endif
                    @if ($profile->shabat == 1)
                        <p>{{ __('app.prof35') }}</p>
                    @endif
                </div>
            </div>
            <div class="line"></div>
            <div class="name">
                <img src="{{ asset('img/name7.svg') }}"> {{ __('app.prof36') }}
            </div>
            <div class="block">
                <div class="gallery">
                    @foreach($profile->images as $image)
                        <div class="item">
                            <img src="{{ asset('storage/' . $image->path) }}">
                            <a data-caption="{{ $image->file_name }}" data-fancybox="gallery"
                               href="{{ asset('storage/' . $image->path) }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="info2">
            <div class="name">
                <img src="{{ asset('img/name9.svg') }}"> {{ __('app.prof37') }}
            </div>
            <div class="block">
                <div class="item">
                    {{ __('app.prof38') }}
                    <span>{{ \Illuminate\Support\Carbon::parse($profile->created_at)->format('d.m.Y') }}</span>
                </div>
                <div class="item">
                    {{ __('app.prof39') }}
                    <span>{{ $profile->num_proj }}</span>
                </div>
                <div class="item">
                    {{ __('app.prof40') }}
                    <span>{{ $profile->views }}</span>
                </div>
                <div class="item">
                    {{ __('app.prof41') }}
                    @if ($profile->resp_time / $profile->resp_num < 60)
                        <span>~{{ round($profile->resp_time / $profile->resp_num) }} {{ __('app.items3') }}</span>
                    @elseif($profile->resp_time / $profile->resp_num < 1440)
                        <span>~{{ round($profile->resp_time / $profile->resp_num / 60) }} {{ __('app.items4') }}</span>
                    @elseif($profile->resp_time / $profile->resp_num < 10080)
                        <span>~{{ round($profile->resp_time / $profile->resp_num / 1440) }} {{ __('app.items5') }}</span>
                    @endif
                </div>
            </div>
            <div class="line"></div>
            @isset($profile->pdf)
                <div class="pdf">
                    <div><img src="{{ asset('img/pdf2.svg') }}"></div>
                    <div><a data-fancybox="profile1" href="{{ asset('storage/' . $profile->pdf) }}">{{ __('app.prof11') }}</a>
                    </div>
                </div>
                <div class="line"></div>
            @endisset
            <div class="name">
                <img src="{{ asset('img/name6.svg') }}"> {{ __('app.prof42') }}
            </div>
            <div class="block">
                <div class="reviews flex2">
                    @foreach($profile->reviews as $review)
                        <div class="item">
                            <img src="{{ asset('img/review.png') }}">
                            <a data-caption="{{ $review->file_name }}" data-fancybox="reviews"
                               href="{{ asset('storage/' . $review->path) }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @isset($company)
        <div class="popup complaint">
            <div class="window">
                <a class="close"></a>
                <p>{{ __('app.prof43') }}</p>
                <div class="field-name">
                    {{ __('app.prof44') }}
                </div>
                <textarea id="text" placeholder="Введите причину"></textarea>
                <button id="send_comp">{{ __('app.prof45') }}</button>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('.comp').click(function () {
                    $('.popup.complaint').fadeIn();
                });
                $('#send_comp').click(function () {
                    $.ajax({
                        url: "{{ route('resource') }}?complaint={{ $profile->id }}" + '&text=' + $(this).siblings('#text').val(),
                    }).done(function (data) {
                        $('.popup.complaint').find('.close').click();
                        show_alert(data);
                    });
                });

                function favorite(val) {
                    $.ajax({
                        url: "{{ route('resource') }}?favorite=" + val,
                    }).done(function (data) {
                        show_alert(data);
                    });
                }

                $('.favorite').click(function () {
                    favorite({{ $profile->id }});
                });
            });
        </script>
    @endisset
@endsection
