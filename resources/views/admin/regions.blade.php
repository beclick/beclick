@if (isset($regions))
    <br>
    <h5 class="text-success">Regions</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="0">Create</a>
        </div>
    </h5>
    <br>
    @foreach($regions as $region)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="get val" request="subregion" val="{{ $region->id }}">{{ $region->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@elseif (isset($subregions))
    <br>
    <h5 class="text-success">Centers</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="{{ $region }}">Create</a>
        </div>
    </h5>
    <br>
    @foreach($subregions as $subregion)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="val" val="{{ $subregion->id }}">{{ $subregion->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@endif
