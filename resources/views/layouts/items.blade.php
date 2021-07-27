@isset($companies)
    @foreach($companies as $company)
        <div class="item">
            <input type="checkbox" class="checkbox" id="item{{ $company->id }}" name="company[]"
                   value="{{ $company->id }}"><label
                for="item{{ $company->id }}">{{ __('app.items1') }}</label>
            <div class="name">
                <a href="{{ route('company', ['id' => $company->id]) }}">
                    <div class="avatar"
                        style="width: 3rem; height: 3rem; @isset($company->image) background-image: url({{ asset('storage/' . $company->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                    </div>
                </a>
                <div style="padding-right: 1rem">
                    {{ $company->name }}
                    <br/>
                    <a href="{{ route('company', ['id' => $company->id]) }}">{{ __('app.items2') }}</a>
                </div>
            </div>
            <p class="ellipsis">{{ $company->description }}</p>
            <div class="counts">
                @if ($company->resp_time / $company->resp_num < 60)
                    <span>~{{ round($company->resp_time / $company->resp_num) }} {{ __('app.items3') }}</span>
                @elseif($company->resp_time / $company->resp_num < 1440)
                    <span>~{{ round($company->resp_time / $company->resp_num / 60) }} {{ __('app.items4') }}</span>
                @elseif($company->resp_time / $company->resp_num < 10080)
                    <span>~{{ round($company->resp_time / $company->resp_num / 1440) }} {{ __('app.items5') }}</span>
                @endif
                <span>{{ $company->num_proj }}</span>
            </div>
            <div class="links">
                @isset($company->contact_phone)
                    <a href="tel:{{ $company->contact_phone }}"> {{ $company->contact_phone }} @isset($company->contact_phone_d)
                            {{ __('app.items6') }} {{ $company->contact_phone_d }} @endisset</a>
                @else
                    <a> ------------- </a>
                @endisset
                @isset($company->email)
                    <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                @else
                    <a> ------------- </a>
                @endisset
            </div>
            <button class="only_send" type="button"><span></span> {{ __('app.items7') }}</button>
        </div>
    @endforeach
@endisset
