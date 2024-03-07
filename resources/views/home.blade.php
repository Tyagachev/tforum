@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header text-center">Добро пожаловать!</div>

                        <div class="card-body text-center">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div>
                                <div >
                                    <img class="w-25 h-25" src="{{ asset('img/tlogo.png') }}">
                                </div>
                            </div>
                            <h3>Регистрация прошла успешно!</h3>
                            <a href="/"><button class="btn btn-success">Вернуться на главную</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

