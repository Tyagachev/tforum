@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('error'))
        <p class="bg-danger">{{ session('error') }}</p>
    @endif
    <div class="bd-example pt-1">
        <form action="{{ route('update.news') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $edit->id }}" >
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">Заголовок<span class="text-danger">*</span></label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Введите текст заголовка" value="{{$edit->title}}">
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">Подзаголовок<span class="text-danger">*</span></label>
                <input name="subtitle" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Введите текст подзаголовка" value="{{$edit->subtitle}}">
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">Текст новости</label>
                <textarea name="text" class="form-control" id="mytextarea" rows="10" cols="45">{{ str_replace('<br>', "\r\n", $edit->text)}}</textarea>
            </div>
            <div style="height: 40px;" class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-info text-white">Обновить</button>
            </div>
        </form>
    </div>
</div>
@endsection
