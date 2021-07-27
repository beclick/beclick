@if (isset($scripts) and $scripts == 'start')
    <script src="{{ asset('js/common.js') . '?' . rand(0, 99999) }}"></script>
@endisset
@if (isset($scripts) and $scripts == 'tiny')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endisset
