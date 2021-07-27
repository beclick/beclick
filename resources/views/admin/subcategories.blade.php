@isset($subcategories)
    @foreach($subcategories as $subcategory)
        <h5>
            <div>
                <a class="del btn btn btn-sm btn-secondary">D</a>
                <a class="upd btn btn-sm btn-secondary">U</a>
                <label class="click">{{ $category->title }}</label>
                <input value="{{ $category->id }}" hidden>
            </div>
        </h5>
    @endforeach
@endisset
