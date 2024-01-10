<div>
    <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="avatar" type="file" required>
        <button type="submit">Загрузить</button>
    </form>
</div>
