@if (isset($categories))
    <br>
    <h5 class="text-success">Categories</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="0">Create</a>
        </div>
    </h5>
    <br>
    @foreach($categories as $category)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="get val" request="subcat" val="{{ $category->id }}">{{ $category->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@elseif (isset($subcategories))
    <br>
    <h5 class="text-success">Subcategories</h5>
    <hr>
    <h5>
        <div class="read">
            <a class="crt btn btn-block btn-sm btn-secondary" sub="{{ $category }}">Create</a>
        </div>
    </h5>
    <br>
    @foreach($subcategories as $subcategory)
        <h5 class="num">
            <div class="read">
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="val" val="{{ $subcategory->id }}">{{ $subcategory->title }}</label>
                <a class="iter float-left">{{ $loop->iteration }}</a>
            </div>
        </h5>
    @endforeach
@endif
