@if (isset($specializations))
    <br>
    <h5 class="text-success">Specializations</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="0">Create</a>
        </div>
    </h5>
    <br>
    @foreach($specializations as $specialization)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="val" val="{{ $specialization->id }}">{{ $specialization->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@endif
