@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            @if(session('error'))
                <p class="bg-danger">{{ session('error') }}</p>
            @endif
            <form action="{{ route('update.topic') }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group pt-2">
                    <label for="exampleFormControlInput1"><span class="tab_text-gold">Тема:</span><span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" required  placeholder="Название темы" value="{{ $editTopic->title }}">
                    <input style="display: none"  name="id" type="hidden" class="form-control" id="exampleFormControlInput1" value="{{ $editTopic->id }}">
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput1"><span class="tab_text-gold">Текст:</span><span class="text-danger">*</span></label>
                    <textarea name="text" class="form-control" id="" rows="10" cols="45" required  placeholder="Введите текст">{{ str_replace('<br>', "\r\n", $editTopic->text) }}</textarea>
                </div>
                <button type="submit" class=" btn btn-success mt-2">Сохранить</button>
            </form>
                <form action="{{ route('delete.topic') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input name="id" type="hidden" value="{{ $editTopic->id }}">
                    <input name="theme_id" type="hidden" value="{{ $editTopic->theme_id }}">
                    <button type="submit" class="btn btn-danger mt-2">Удалить</button>
                </form>
        </div>
    </div>
@endsection
