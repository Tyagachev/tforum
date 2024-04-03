@can('ViewLoadAvatarButton', $user)
<div class="mt-2">
    <form class="d-flex flex-column align-center" action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control"  name="avatar" type="file" id="formFile">
        <p class="err p-0 mt-1 mb-0 text-center">Размер файла не более 2 МБ <br> Рекомендуемый размер изображения 100 х 100 px</p>
        <button id="btn_upload" class="btn btn-success" type="submit" disabled="">Загрузить</button>
    </form>

</div>
@endcan
