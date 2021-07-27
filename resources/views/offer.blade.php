@extends('layouts.app')

@section('title', __('app.offer_title'))

@section('content')
    <div class="flex">
        <a href="{{ route('requests') }}" class="back-mob-link"></a>
        <div class="page-name">
            <div class="navi other">
                {{ $project->title }}
                <i class="fa fa-angle-left"></i> <a href="{{ route('requests') }}">{{ __('app.offer_title') }}</a>
                <i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.offer1') }}</a>
            </div>
        </div>
        <div class="top-back-link other">
            <a href="{{ route('requests') }}" class="other"><span></span> {{ __('app.offer2') }}</a>
        </div>
    </div>
    <div class="project-page">
        <div class="top-info">
            <div class="flex">
                <div class="date">
                    <span
                        class="other">{{ \Illuminate\Support\Carbon::parse($project->created_at)->format('d.m.Y H:i') }}</span>
                </div>
                @if (strtotime($project->created_at) < strtotime($project->updated_at))
                    <div class="date">
                        <strong style="color: #EB5757">{{ __('app.offer3') }} <span
                                class="other">{{ \Illuminate\Support\Carbon::parse($project->updated_at)->format('d.m.Y H:i') }}
                        </strong></span>
                    </div>
                @endif
            </div>
            <div class="flex">
                <div class="info">
                    <div class="name">
                        {{ $project->title }}
                    </div>
                    <p>{{ $project->text }}</p>
                    <div class="field-name">
                        {!! $project->questions !!}
                    </div>
                    <div class="button">
                        <a href="{{ route('requests', ['delete' => $project->id]) }}">
                            <button class="other"><span></span> {{ __('app.offer4') }}</button>
                        </a>
                        <a target="_blank" href="{{ $project->docs_url }}"
                           class="trash other">{{ __('app.offer5') }}</a>
                    </div>
                </div>
                @if ($project->contact_hide == 1)
                    <div class="hidden-info">
                        <p>{{ __('app.offer6') }}</p>
                    </div>
                @else
                    <table>
                        <tr>
                            <td>{{ __('app.offer7') }}</td>
                            <td>
                                @foreach (explode('|', $project->regions) as $region)
                                    @if ($loop->index > 0)
                                        <p>{{ $region }}</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            @isset($project->profile->address)
                                <td>{{ __('app.offer8') }}</td>
                                <td>{{ $project->profile->address }}</td>
                            @endisset
                        </tr>
                        <tr>
                            @isset($project->profile->contact_phone)
                                <td>{{ __('app.offer9') }}</td>
                                <td>{{ $project->profile->contact_phone }} @isset($project->profile->contact_phone_d)
                                        {{ __('app.items6') }} {{ $project->profile->contact_phone_d }} @endisset</td>
                            @endisset
                        </tr>
                        <tr>
                            @isset($project->profile->email)
                                <td>{{ __('app.email') }}</td>
                                <td><a href="mailto:{{ $project->profile->email }}">{{ $project->profile->email }}</a>
                                </td>
                            @endisset
                        </tr>
                        <tr>
                            @isset($project->profile->contact_person)
                                <td>{{ __('app.offer10') }}</td>
                                <td>{{ $project->profile->contact_person }}</td>
                            @endisset
                        </tr>
                    </table>
                @endif
            </div>
        </div>
        @if ($project->contact_hide == 1)
            <div class="hidden-info">
                <p>{{ __('app.offer6') }}</p>
            </div>
        @else
            <div class="response">
                <div class="main-info flex">
                    <div class="name">
                        <div>
                            <a href="{{ route('company', ['id' => $project->profile->id]) }}">
                                <div class="avatar"
                                     style=" @isset($project->profile->image) background-image: url({{ asset('storage/' . $project->profile->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                                </div>
                            </a>
                        </div>
                        <div style="padding-right: 2rem">
                            <div class="n other">
                                {{ $project->profile->name }}
                            </div>
                            <p>{{ $project->profile->description }}</p>
                        </div>
                    </div>
                    <div class="date other">
                        <p>{{ \Illuminate\Support\Carbon::parse($project->profile->created_at)->format('d.m.Y H:i') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @foreach($project->responses->where('profile_id', $myprofile->id) as $response)
            <div class="response">
                <div class="main-info flex">
                    <div class="name">
                        <p>{!! $response->text !!}</p>
                    </div>
                    <div class="date">
                        <p>{{ \Illuminate\Support\Carbon::parse($response->created_at)->format('d.m.Y H:i') }}</p>
                        <div class="price">
                            {{ __('app.offer11') }}
                            <span>${{ $response->price }}</span>
                        </div>
                    </div>
                </div>
                <div class="button flex">
                    @isset($response->pdf)
                        <a data-fancybox="pdf{{ $response->id }}" href="{{ asset('storage/' . $response->pdf) }}"
                           class="pdf">{{ __('app.offer12') }}</a>
                    @endisset
                </div>
            </div>
        @endforeach
        <form id="send_form">
            @csrf
            <div class="editor">
                <p>{{ __('app.offer13') }}</p>
                <div class="wysiwig">
                    <textarea id="text"></textarea>
                </div>
                <div class="flex">
                    <div class="price">
                        <p><span>*</span> {{ __('app.offer14') }}</p>
                        <div class="field">
                            <span>$</span>
                            <input name="price" type="number">
                        </div>
                    </div>
                    <div class="button">
                        <label>
                            <a class="pdf">{{ __('app.offer15') }}</a>
                            <input type="file" name="pdf" accept="application/pdf" autocomplete="off" hidden>
                        </label>
                        <button class="send_btn" type="button"><span></span> {{ __('app.offer16') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('resource', ['scripts' => 'tiny']) }}",
            }).done(function (data) {
                setTimeout(function () {
                    $('head').append(data);
                }, 100);
                setTimeout(function () {
                    tinymce.init({selector: '#text', directionality: 'rtl'});
                }, 1000);
            });


            $('.pdf').next('input').change(function () {
                var offer17 = '{{ __('app.offer17') }}';
                if (this.files[0]) {
                    var fr = new FileReader(),
                        type = this.files[0].type,
                        name = this.files[0].name;
                    if (type === 'application/pdf') {
                        fr.addEventListener('load', function () {
                            $('.pdf').text(name);
                        }, false);
                        fr.readAsDataURL(this.files[0]);
                    } else {
                        show_alert(offer17);
                    }
                }
            });

            $('.send_btn').click(function () {
                var text = tinymce.get('text').getContent(),
                    formData = new FormData($('#send_form')[0]);
                formData.append('text', text);
                $.ajax({
                    url: "{{ route('requests', ['proj' => $project->id]) }}",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    contentType: false,
                    processData: false,
                    data: formData,
                }).done(function (data) {
                    show_alert(data[1]);
                    if (data[0] === 1) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    }
                });
            });
        });
    </script>

@endsection
