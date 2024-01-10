@extends('layouts.app')
@section('content')
<div class="container">
    <div class="bd-example pt-1">
        <form action="{{ route('store.news') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">Заголовок<span class="text-danger">*</span></label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" required placeholder="Введите текст заголовка" value="{{ old('title') }}">
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">Подзаголовок<span class="text-danger">*</span></label>
                <input name="subtitle" type="text" class="form-control" id="exampleFormControlInput1" required placeholder="Введите текст подзаголовка" value="{{ old('subtitle') }}">
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">Текст новости</label>
                <textarea name="text" class="form-control" required id="mytextarea" rows="10" cols="45"></textarea>
            </div>
            <div style="height: 40px;" class="d-flex justify-content-between mt-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Добавить файл</label>
                    <input name="image" type="file" required class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-info text-white">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection
