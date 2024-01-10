@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            <form action="{{ route('store.theme') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group pt-2">
                    <label for="exampleFormControlInput1"><span class="tab_text-gold">Заголовок:</span><span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" required  placeholder="Название темы" value="{{ old('title') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="exampleFormControlInput1"><span class="tab_text-gold">Подзаголовок:</span><span class="text-danger">*</span></label>
                    <input name="subtitle" class="form-control" required  placeholder="Введите текст" value="{{ old('subtitle') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="exampleFormControlInput1"><span class="tab_text-gold">Картинка:</span><span class="text-danger">*</span></label>
                    <br>
                    <input style="color: gold" type="file" name="image" required />
                </div>
                <button type="submit" class=" btn btn-success mt-5">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
