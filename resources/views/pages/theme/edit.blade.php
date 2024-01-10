@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            @if(session('error'))<p class="bg-danger">{{ session('error') }}</p>@endif
                <form action="{{ route('update.theme') }}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $editTheme->id }}">
                    <div class="form-group pt-2">
                        <label for="exampleFormControlInput1"><span class="tab_text-gold">Заголовок:</span><span class="text-danger">*</span></label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" required  placeholder="Название темы" value="{{ $editTheme->title }}">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleFormControlInput2"><span class="tab_text-gold">Подзаголовок:</span><span class="text-danger">*</span></label>
                        <input name="subtitle" class="form-control" id="exampleFormControlInput2" required  placeholder="Введите текст" value="{{ $editTheme->subtitle }}">
                    </div>
                    <button type="submit" class=" btn btn-success mt-2">Сохранить</button>
                </form>
                <form action="{{ route('delete.theme') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $editTheme->id }}">
                    <button type="submit" class=" btn btn-danger mt-2">Удалить</button>
                </form>
        </div>
    </div>
@endsection
