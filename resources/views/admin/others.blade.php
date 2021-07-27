@if (isset($others))
    <br>
    <h5 class="text-success">Others</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="0">Create</a>
        </div>
    </h5>
    <br>
    @foreach($others as $other)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="get val" request="subother" val="{{ $other->id }}">{{ $other->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@elseif (isset($subothers))
    <br>
    <h5 class="text-success">Sections</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="{{ $other }}">Create</a>
        </div>
    </h5>
    <br>
    @foreach($subothers as $subother)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="val" val="{{ $subother->id }}">{{ $subother->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@endif
