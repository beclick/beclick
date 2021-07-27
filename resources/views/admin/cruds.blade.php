@extends('layouts.admin')

@section('title', 'Admin – Beclick')

@section('content')

    <div class="container mt-3">
        <h3>CRUD`s</h3>
        <hr>
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="heading1">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1"
                            aria-expanded="true" aria-controls="collapse1">
                        <h5>CRUD - Categories</h5>
                    </button>
                </div>
                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="cat" class="data">
                                    @include('admin.categories')
                                </div>
                            </div>
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="subcat" class="data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading2">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2"
                            aria-expanded="true" aria-controls="collapse2">
                        <h5>CRUD - Specializations</h5>
                    </button>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="spec" class="data">
                                    @include('admin.specializations')
                                </div>
                            </div>
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <br>
                                <h5 class="text-success">New specializations</h5>
                                <hr>
                                <div id="specializations">
                                    @foreach($newspecializations as $newspecialization)
                                        <h5>
                                            {{ $newspecialization }}
                                        </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading3">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3"
                            aria-expanded="true" aria-controls="collapse3">
                        <h5>CRUD - Regions</h5>
                    </button>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="region" class="data">
                                    @include('admin.regions')
                                </div>
                            </div>
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="subregion" class="data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading4">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4"
                            aria-expanded="true" aria-controls="collapse4">
                        <h5>CRUD - Others</h5>
                    </button>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="other" class="data">
                                    @include('admin.others')
                                </div>
                            </div>
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="subother" class="data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading5">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse5"
                            aria-expanded="true" aria-controls="collapse5">
                        <h5>CRUD - Number of employees / Work experience</h5>
                    </button>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="amount" class="data">
                                    @include('admin.amountworkers')
                                </div>
                            </div>
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="exper" class="data">
                                    @include('admin.experiences')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading6">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse6"
                            aria-expanded="true" aria-controls="collapse6">
                        <h5>CRUD - Project type / Questions</h5>
                    </button>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="type" class="data">
                                    @include('admin.types')
                                </div>
                            </div>
                            <div class="col-lg text-right border border-secondary rounded m-1">
                                <div id="quest" class="data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function get_resource(request, val) {
                $.ajax({
                    url: "{{ route('admin.resource') }}?" + request + "=" + val,
                }).done(function (data) {
                    $('#' + request).empty().append(data[1]);
                });
            }

            $(document).on('click', '.get', function () {
                get_resource($(this).attr('request'), $(this).attr('val'));
                $(document).find('.get').removeClass('text-info');
                $(this).addClass('text-info');
            });

            $(document).on('click', '.crt', function () {
                $(document).find('.read').removeClass('d-none');
                $(document).find('form').remove();
                var sub = $(this).attr('sub'),
                    request = $(this).parents('.data').attr('id'),
                    route = "{{ route('admin.cruds') }}?req=" + request + "&act=create";
                $(this).parent().addClass('d-none');
                $(this).parent().parent().append(`
                    <form class="form-row" action="${route}">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-success">SAVE</button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="value">
                            <input name="sub" value="${sub}" hidden>
                        </div>
                    </form>
               `);
            });

            $(document).on('click', '.crt_quest', function () {
                $(document).find('.read').removeClass('d-none');
                $(document).find('form').remove();
                var sub = $(this).attr('sub'),
                    request = $(this).parents('.data').attr('id'),
                    route = "{{ route('admin.cruds') }}?req=" + request + "&act=create";
                $(this).parent().addClass('d-none');
                $(this).parent().parent().append(`
                    <form action="${route}"><div class="form-row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-success">SAVE</button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="value">
                            <input name="sub" value="${sub}" hidden>
                        </div>
                        <div class="col">
                            <select name="type_quest" autocomplete="off" class="custom-select custom-select-sm">
                                <option value="1">Данные</option>
                                <option value="2">Ед.выбор</option>
                                <option value="3">Мн.выбор</option>
                            </select>
                        </div></div>
                        <label><h6>enter the base value, or options separated by a separator-"|"</h6></label>
                        <div class="form-row">
                            <div class="col"><textarea class="col form-control" name="variants"></textarea></div>
                        </div>
                        <hr>
                    </form>
                    `);
            });

            $(document).on('click', '.upd', function () {
                $(document).find('.read').removeClass('d-none');
                $(document).find('form').remove();
                var id = $(this).siblings('.val').attr('val'),
                    val = $(this).siblings('.val').text(),
                    request = $(this).parents('.data').attr('id'),
                    iter = $(this).siblings('.iter').text(),
                    route = "{{ route('admin.cruds') }}?req=" + request + "&act=update";
                $(this).parent().addClass('d-none');
                $(this).parent().parent().append(`
                    <form class="form-row" action="${route}">
                        <div class="col-auto">
                            <a class="up btn btn-sm btn-primary">&#8593</a>
                            <a class="dw btn btn-sm btn-primary">&#8595</a>
                            <button type="submit" class="btn btn-sm btn-success">SAVE</button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="value" value="${val}">
                            <input name="id" value="${id}" hidden>
                        </div><div class="col-auto"><a class="float-left">${iter}</a></div>
                    </form>
               `);
            });

            $(document).on('click', '.upd_quest', function () {
                $(document).find('.read').removeClass('d-none');
                $(document).find('form').remove();
                var id = $(this).siblings('.val').attr('val'),
                    vr = $(this).siblings('.val').attr('var'),
                    val = $(this).siblings('.val').text(),
                    request = $(this).parents('.data').attr('id'),
                    iter = $(this).siblings('.iter').text(),
                    route = "{{ route('admin.cruds') }}?req=" + request + "&act=update";
                $(this).parent().addClass('d-none');
                $(this).parent().parent().append(`
                    <form action="${route}"><div class="form-row">
                        <div class="col-auto">
                            <a class="up btn btn-sm btn-primary">&#8593</a>
                            <a class="dw btn btn-sm btn-primary">&#8595</a>
                            <button type="submit" class="btn btn-sm btn-success">SAVE</button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="value" value="${val}">
                            <input name="id" value="${id}" hidden>
                        </div>
                        <div class="col-auto"><a class="float-left">${iter}</a></div></div>
                        <label><h6>enter the base value, or options separated by a separator-"|"</h6></label>
                        <div class="form-row">
                            <div class="col"><textarea class="col form-control" name="variants">${vr}</textarea></div>
                        </div>
                        <hr>
                    </form>
               `);
            });

            $(document).on('click', '.up', function () {
                var th = $(this).parents('.num'),
                    pr = th.prev('.num');
                pr.before(th);
            });

            $(document).on('click', '.dw', function () {
                var th = $(this).parents('.num'),
                    pr = th.next('.num');
                pr.after(th);
            });

            $(document).on('click', '.del', function () {
                $(document).find('.read').removeClass('d-none');
                $(document).find('form').remove();
                var id = $(this).siblings('.val').attr('val'),
                    val = $(this).siblings('.val').text(),
                    request = $(this).parents('.data').attr('id'),
                    iter = $(this).siblings('.iter').text(),
                    route = "{{ route('admin.cruds') }}?req=" + request + "&act=delete";
                $(this).parent().addClass('d-none');
                $(this).parent().parent().append(`
                    <form class="form-row" action="${route}">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </div>
                        <div class="col">
                            <label>${val}</label>
                            <input name="id" value="${id}" hidden>
                        </div><div class="col-auto"><a class="float-left">${iter}</a></div>
                    </form>
               `);
            });

            $(document).on('submit', 'form', function (event) {
                event.preventDefault();
                var dt = $(this).parents('.data'),
                    url = $(this).attr('action'),
                    formData = new FormData($(this)[0]);
                dt.find('.num').each(function (index) {
                    var id = $(this).find('.val').attr('val');
                    formData.append('index[]', id + '|' + (index + 1));
                });
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    contentType: false,
                    processData: false,
                    data: formData
                }).done(function (data) {
                    var id = dt.attr('id');
                    get_resource(id, dt.find('.crt, .crt_quest').attr('sub'));
                });
            });

            $('#specializations').on('click', '.upd', function () {
                var id = $(this).siblings('input').val(),
                    val = $(this).siblings('label').text(),
                    route = "{{ route('admin.cruds', ['specialization' => 'update']) }}";
                $('#myaction').modal('show').find('.modal-header').empty().append(`
                    <h5>Редактировать</h5>
               `);
                $('#myaction').modal('show').find('.modal-body').empty().append(`
                    <form action="${route}">
                        <input type="text" class="form-control" name="value" value="${val}">
                        <input type="text" class="form-control" name="id" value="${id}" hidden>
                        <hr>
                        <button type="submit" class="btn btn-block btn-success">Соранить</button>
                    </form>
               `);
            });

            $('#specializations').on('click', '.del', function () {
                var id = $(this).siblings('input').val(),
                    val = $(this).siblings('label').text(),
                    route = "{{ route('admin.cruds', ['specialization' => 'delete']) }}";
                $('#myaction').modal('show').find('.modal-header').empty().append(`
                    <h5>Удалить ${val}</h5>
               `);
                $('#myaction').modal('show').find('.modal-body').empty().append(`
                    <form action="${route}">
                        <input type="text" class="form-control" name="id" value="${id}" hidden>
                        <button type="submit" class="btn btn-block btn-success">Удалить</button>
                    </form>
               `);
            });

            $('#specializations').parent('div').on('click', '.crt', function () {
                var route = "{{ route('admin.cruds', ['specialization' => 'create']) }}";
                $('#myaction').modal('show').find('.modal-header').empty().append(`
                    <h5>Создать</h5>
               `);
                $('#myaction').modal('show').find('.modal-body').empty().append(`
                    <form action="${route}">
                        <input type="text" class="form-control" name="value">
                        <hr>
                        <button type="submit" class="btn btn-block btn-success">Создать</button>
                    </form>
               `);
            });
        });
    </script>

@endsection
