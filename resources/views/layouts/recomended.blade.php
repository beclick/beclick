@forelse($adverts as $advert)
    <div class="shop">
        <div class="name">
            <div style="padding-right: 1rem">
                {{ $advert->name }}
            </div>
            <a href="{{ route('company', ['id' => $advert->id]) }}">
                <div class="avatar"
                    style="width: 4rem; height: 4rem; @isset($advert->image) background-image: url({{ asset('storage/' . $advert->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                </div>
            </a>
        </div>
        <p class="ellipsis">{{ $advert->description }}</p>
    </div>
@empty
<div class="shop">
        <p class="ellipsis">Не найдено!</p>
    </div>
@endforelse
<div class="shops-link">
    <a href="#">{{ __('app.recom1') }}</a>
</div>
<div class="name">
    {{ __('app.recom2') }}
</div>
<div class="material">
    <img src="img/material.png">
    <a href="#">{{ __('app.recom3') }}</a>
</div>
