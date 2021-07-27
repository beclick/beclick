@isset($questions)
    <div class="fields-name">
        <img src="{{ asset('img/name10.svg') }}"> {{ __('app.quest1') }}
    </div>
    @foreach($questions as $question)
        <div class="field-name">
            {{ $question->title }}
            <input id="title" type="text" name="questions[]"
                   value="name|||{{ $question->title }}" autocomplete="off" hidden>
        </div>
        <div class="field">
            @if ($question->type_question == 1)
                <input id="title" type="text" name="questions[]"
                       value="{{ $question->variants }}" autocomplete="off">
            @elseif ($question->type_question == 2)
                <select id="category_n" name="questions[]" autocomplete="off">
                    @isset($question->variants)
                        @foreach (explode('|', $question->variants) as $variant)
                            <option value="{{ $variant }}">{{ $variant }}</option>
                        @endforeach
                    @endisset
                </select>
            @elseif ($question->type_question == 3)
                <div class="regions">
                    <div class="item">
                        @isset($question->variants)
                            @foreach (explode('|', $question->variants) as $variant)
                                <input type="checkbox" class="checkbox" id="chss{{ $loop->iteration }}" name="questions[]"
                                       value="{{ $variant }}" autocomplete="off">
                                <label for="chss{{ $loop->iteration }}">{{ $variant }}</label>
                            @endforeach
                        @endisset
                    </div>
                </div>
            @endif
        </div>
    @endforeach
@endisset
