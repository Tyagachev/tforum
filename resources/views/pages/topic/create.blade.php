@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            <form action="{{ route('store.topic') }}" method="POST">
                @csrf
                <input type="hidden" name="theme_id" value="{{ $id }}">
                <div class="form-group pt-2">
                    <div class="count_flex">
                        <label for="exampleFormControlInput1"><span class="tab_text-gold">Тема:</span><span class="text-danger">*</span></label></label>
                        <div>
                            <span class="count_symbol-text">Кол-во символов: </span>
                            <span class="count_letter-title">40</span>
                        </div>
                    </div>
                    <input name="title" type="text" class="form_topic-title" id="exampleFormControlInput1" required  placeholder="Название темы" value="{{ old('title') }}">
                </div>
                <div class="form-group mt-2">
                    <div class="form-group pt-2">
                        <div class="count_flex">
                            <label for="exampleFormControlInput1"><span class="tab_text-gold">Текст:</span><span class="text-danger">*</span></label></label>
                            <div>
                                <span class="count_symbol-text">Кол-во символов: </span>
                                <span class="count_letter-text">2000</span>
                            </div>
                        </div>
                    </div>

                    <textarea name="text" class="form_topic-textarea" id="" rows="10" cols="45" required  placeholder="Введите текст"></textarea>
                </div>
                <button type="submit" class=" btn btn-success mt-2">Опубликовать</button>
            </form>
        </div>
    </div>
@endsection
