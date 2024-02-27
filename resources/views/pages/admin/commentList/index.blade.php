@extends('pages.admin.index')
@section('admin-content')
    <div class="container">
        <form action="{{ route('admin.comment-list.store') }}" method="POST">
            @csrf
            <input type="text" name="word" class="form-control form-control-lg rounded-0 w-25" placeholder="Слово для проверки">
            <button class="btn btn-primary mt-2" type="submit">Добавить</button>
        </form>
    </div>
@endsection
