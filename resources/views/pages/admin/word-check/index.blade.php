@extends('pages.admin.index')
@section('admin-content')
    <div class="container">
        <h4>Список запрещенных слов для фильтрации</h4>
        <div class="input-group w-75 m-1">
            <form class="d-flex w-75" action="{{ route('admin.word-check.store') }}" method="POST">
                @csrf
                <input type="text" name="word" class="form-control form-control-lg rounded-0 p-1" placeholder="Слово для проверки">
                <div class="input-group-append" style="background-color: #e4e4e4">
                    <button class="btn btn-primary pb-3" type="submit">Добавить</button>
                </div>
            </form>
        </div>
        @foreach($word as $w)
        <div class="d-flex flex-column p-2">
            <div>
                <p class="mb-1">{{ $w->word }}</p>
            </div>
            <div>
                <form action="{{ route('admin.word-check.delete') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="word_id" value="{{ $w->id }}">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
