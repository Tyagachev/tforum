@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            @if(session('success'))
                <p class="bg-success">{{ session('success') }}</p>
            @endif
            <div style="word-wrap: break-word">
                <h1><span class="text_color">{{ $topicObject->title }}</span></h1>
                    @can('editTopic', $topicObject)
                        <a href="{{ route('edit.topic', $topicObject->user_id)}}">Редактировать</a>
                    @endcan
                    <hr style="color:#ffff">
                <div class="topic_card p-2">
                        <div class="d-flex">
                            <a style="text-decoration: none" href="{{ route('profile.index', $topicObject->user_id) }}">
                                <div class="avatar_border">
                                    @if($topicObject->user->avatar->image)
                                        <img style="width: 100px; height: 100px;" src="{{ url(('storage/' . $topicObject->user->avatar->image)) }}" alt="">
                                    @else
                                        <img style="width: 100px; height: 100px;" src="{{ asset('img/person.svg') }}" alt="">
                                    @endif
                                </div>
                            </a>
                            <div class="w-100">
                                <div style="word-break: break-all">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="d-flex justify-content-between pb-3">
                                                <p class="text">{{ $topicObject->user->name }}</p>
                                                <p class="text">{{ $topicObject->dateAsCarbon->diffForHumans() }}</p>
                                            </div>
                                            <p class="text">{!! $topicObject->text !!}</p>
                                        </div>
                                        <div class="ps-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div>
                </div>
                <div class="mb-4">
                    @if(auth()->user())
                        @if($topicObject->user_id != auth()->user()->id)<p class="accordion">Ответить</p>@endif
                        <div class="panel">
                            <form action="{{ route('comment.store') }}" method="POST">
                                <div>
                                    <span class="count_symbol-text">Кол-во символов: </span>
                                    <span class="count_letter-text">40</span>
                                </div>
                                <div class="d-flex">
                                    @csrf
                                    <textarea id="textarea_style" name="text" class="textarea_style" id="" cols="30" rows="2" placeholder="Комментарий" required>{{ old('text') }}</textarea>
                                    <div id="text_area_div"></div>
                                    <input style="display: none" name="topic_id" type="hidden" value="{{ $topicObject->id }}">
                                    <input style="display: none" name="reply_user_id" type="hidden" value="{{ $topicObject->user_id }}">
                                    <input type="hidden" name="parent_id" value="{{ null }}">
                                    <button style="background-color: red;
                                    border: 0;" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send" viewBox="0 0 20 20">
                                                <path class="fil0" d="M19.62 9.24c0.07,-0.03 0.14,-0.07 0.2,-0.13 0.24,-0.25 0.24,-0.65 0,-0.89 -0.06,-0.06 -0.13,-0.11 -0.2,-0.14l-18.17 -7.79 -0.01 0 -0.56 -0.24c-0.24,-0.1 -0.51,-0.05 -0.69,0.14 -0.16,0.15 -0.22,0.37 -0.17,0.58l0.13 0.6 0 0 1.62 7.29 -1.62 7.3 0 0 -0.13 0.6c-0.05,0.21 0.01,0.43 0.17,0.58 0.18,0.18 0.45,0.23 0.69,0.13l18.74 -8.03 0 0zm-16.7 0.05l0.11 -0.49c0.02,-0.09 0.02,-0.18 0,-0.27l-0.11 -0.5 13.38 0 1.47 0.63 -1.47 0.63 -13.38 0z"/>
                                            </svg>
                                    </button>
                                    </div>
                            </form>
                        </div>
                    @else
                        <div class="pt-4">
                            <p class="text">Оставить комментарий можно после авторизации <a class="text-info" href="{{ route('login') }}">Войти</a></p>
                        </div>
                    @endif
                </div>
                </div>
                @include('pages.topic.commentDisplay', [
                'topic_id' => $topicObject->id,
                'reply_user_id' => $topicObject->user_id,
                'comments' => $topicObject->comments,
                ])
            <div>
            </div>
        </div>
    </div>
@endsection
