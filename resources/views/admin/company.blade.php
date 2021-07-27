<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/png">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/common.js') . '?' . rand(0, 99999) }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@yield('script')
<!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

    <!-- Styles -->
    <link href="{{ asset('style.css') . '?' . rand(0, 99999) }}" rel="stylesheet">
    <link href="{{ asset('slick.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrap">
    <div class="flex">
        <div class="page-name">
            <div class="company">
                <div class="avatar"
                     style="width: 10rem; height: 10rem; @isset($profile->image) background-image: url({{ asset('storage/' . $profile->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                </div>
                <div style="padding-right: 3rem">
                    <h1>@isset($profile->name) {{ $profile->name }} @endisset</h1>
                    <div class="links">
                        <a onclick="copytext('{{ route('company', ['id' => $profile->id]) }}'); this.innerText = 'Link copied'">Copy link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe-block">
            <a href="{{ route('admin.home') }}">
                <button> Назад</button>
            </a>
            <a href="{{ route('admin.home', ['id' => $profile->id, 'advert' => 'true']) }}">
                @if ($profile->advert == 0)
                    <button>To advertise</button>
                @elseif ($profile->advert == 1)
                    <button>Not advertising</button>
                @endif
            </a>
        </div>
    </div>
    <div class="company-mob-block">
        <div class="links">
            <a onclick="copytext('{{ route('company', ['id' => $profile->id]) }}')"></a>
        </div>
        @isset ($profile->pdf)
            <div class="pdf">
                <div><img src="{{ asset('img/pdf2.svg') }}"></div>
                <div><a data-fancybox="profile2" href="{{ asset('storage/' . $profile->pdf) }}">View extended company profile</a>
                </div>
            </div>
        @endisset
    </div>
    <div class="company-page flex">
        <div class="info">
            <div class="name">
                <img src="{{ asset('img/name8.svg') }}"> Company contacts and address
            </div>
            <div class="block">
                <div class="flex">
                    <div class="col">
                        <div class="item">
                            @isset($profile->contact_phone)
                                Company phone
                                <span>{{ $profile->contact_phone }} @isset($profile->contact_phone_d)
                                        add {{ $profile->contact_phone_d }} @endisset</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->phone_whatsapp)
                                Cell Phone / WhatsApp
                                <span><a class="wa" href="">{{ $profile->phone_whatsapp }}</a></span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->telegram)
                                Telegram
                                <span>{{ $profile->telegram }}</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->viber)
                                Viber
                                <span>{{ $profile->viber }}</span>
                            @endisset
                        </div>
                    </div>
                    <div class="col">
                        <div class="item">
                            @isset($profile->address)
                                The address
                                <span>{{ $profile->address }}</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->email)
                                Email
                                <span><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->contact_person)
                                The contact person
                                <span>{{ $profile->contact_person }}</span>
                            @endisset
                        </div>
                        <div class="item">
                            @isset($profile->regions)
                                Regions and city of work
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
                <img src="{{ asset('img/name1.svg') }}"> Job category and specialization
            </div>
            <div class="block">
                <div class="item">
                    @isset($profile->category)
                        Category
                        <span>{{ $profile->category->title }}</span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->subcategory)
                        Subcategory
                        <span>{{ $profile->subcategory->title }}</span>
                    @endisset
                </div>
                <div class="item">
                    @if(isset($profile->specialization) or isset($profile->specialization_list))
                        Specialization
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
                <img src="{{ asset('img/name1.svg') }}"> Public data of the company
            </div>
            <div class="block">
                <div class="item">
                    @isset($profile->description)
                        Company description
                        <span>{{ $profile->description }}</span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->site)
                        The site of the company
                        <span><a href="{{ $profile->site }}">{{ $profile->site }}</a></span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->experience)
                        Experience
                        <span>{{ $profile->experience }}</span>
                    @endisset
                </div>
                <div class="item">
                    @isset($profile->amountworkers)
                        Amount of workers
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
                <img src="{{ asset('img/name5.svg') }}"> Режим работы
            </div>
            <div class="block">
                <div class="hours">
                    @if ($profile->mode_alw == 1)
                        <p> 24/7 </p>
                    @else
                        <p>
                            @isset($profile->mode_week)
                                Sun-Thu from {{ explode('|', $profile->mode_week)[0] }}
                                before {{ explode('|', $profile->mode_week)[1] }}
                            @endisset
                        </p>
                        <p>
                            @isset($profile->mode_sat)
                                friday from {{ explode('|', $profile->mode_sat)[0] }}
                                before {{ explode('|', $profile->mode_sat)[1] }}
                            @endisset
                        </p>
                    @endif
                    @if ($profile->shabat == 1)
                        <p>Unavailable on Shabbat</p>
                    @endif
                </div>
            </div>
            <div class="line"></div>
            <div class="name">
                <img src="{{ asset('img/name7.svg') }}"> Gallery of works
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
                <img src="{{ asset('img/name9.svg') }}"> Statistics
            </div>
            <div class="block">
                <div class="item">
                    Registration date
                    <span>{{ \Illuminate\Support\Carbon::parse($profile->created_at)->format('d.m.Y') }}</span>
                </div>
                <div class="item">
                    Projects Created
                    <span>{{ $profile->num_proj }}</span>
                </div>
                <div class="item">
                    Number of views
                    <span>{{ $profile->views }}</span>
                </div>
                <div class="item">
                    Response time
                    @if ($profile->resp_time / $profile->resp_num < 60)
                        <span>~{{ round($profile->resp_time / $profile->resp_num) }} minutes</span>
                    @elseif($profile->resp_time / $profile->resp_num < 1440)
                        <span>~{{ round($profile->resp_time / $profile->resp_num / 60) }} hours</span>
                    @elseif($profile->resp_time / $profile->resp_num < 10080)
                        <span>~{{ round($profile->resp_time / $profile->resp_num / 1440) }} weeks</span>
                    @endif
                </div>
            </div>
            <div class="line"></div>
            @isset($profile->pdf)
                <div class="pdf">
                    <div><img src="{{ asset('img/pdf2.svg') }}"></div>
                    <div><a data-fancybox="profile1" href="{{ asset('storage/' . $profile->pdf) }}">View extended company profile</a>
                    </div>
                </div>
                <div class="line"></div>
            @endisset
            <div class="name">
                <img src="{{ asset('img/name6.svg') }}"> Reviews
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
</div>
