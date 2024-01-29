<div class="mt-2">
    <form class="d-flex flex-column align-center" action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control" name="avatar" type="file" id="formFile">
        <div class="mt-4"></div>
        <button class="btn btn-success" type="submit">Загрузить</button>
    </form>
</div>
