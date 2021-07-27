@if (isset($types))
    <br>
    <h5 class="text-success">Project types</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="0">Create</a>
        </div>
    </h5>
    <br>
    @foreach($types as $type)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="get val" request="quest" val="{{ $type->id }}">{{ $type->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@elseif (isset($quests))
    <br>
    <h5 class="text-success">Project issues</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt_quest btn btn-block btn-sm btn-secondary" sub="{{ $type }}">Create</a>
        </div>
    </h5>
    <br>
    @foreach($quests as $quest)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd_quest btn btn-sm btn-secondary">U</a>
                <label class="val" val="{{ $quest->id }}" var="{{ $quest->variants }}">{{ $quest->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
                @if($quest->type_question == 1)
                    <input type="text" class="form-control form-control-sm" value="{{ $quest->variants }}" autocomplete="off">
                @elseif($quest->type_question == 2)
                    <select autocomplete="off" class="custom-select custom-select-sm">
                        @isset($quest->variants)
                            @foreach (explode('|', $quest->variants) as $variant)
                                <option value="{{ $variant }}">{{ $variant }}</option>
                            @endforeach
                        @endisset
                    </select>
                @elseif($quest->type_question == 3)
                    @isset($quest->variants)
                        @foreach (explode('|', $quest->variants) as $variant)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chss{{ $loop->iteration }}">
                                <label class="custom-control-label" for="chss{{ $loop->iteration }}">{{ $variant }}</label>
                            </div>
                        @endforeach
                    @endisset
                @endif
            </div>
        </h5>
    @endforeach
@endif
