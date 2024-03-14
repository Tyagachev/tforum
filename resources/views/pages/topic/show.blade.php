@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            @if(session('success'))
                <p class="bg-success">{{ session('success') }}</p>
            @endif
            <div style="word-wrap: break-word">
                <h1><span class="text_color">{{ $topicObject->title }}</span></h1>
                <!--Это-->
                @can('editTopic', $topicObject)
                    <a href="{{ route('edit.topic', $topicObject->user_id)}}">Редактировать</a>
                @endcan
                <hr style="color:#ffff">
                <div class="topic_card p-2">
                    <div class="d-flex">
                        <a style="text-decoration: none" href="{{ route('profile.index', $topicObject->user_id) }}">
                            <div class="avatar_border">
                                <!--Это-->
                                @if($topicObject->user->avatar->image)
                                    <img style="width: 100px; height: 100px;"
                                         src="{{ url(('storage/' . $topicObject->user->avatar->image)) }}" alt="">
                                @else
                                    <img style="width: 100px; height: 100px;" src="{{ asset('img/person.svg') }}"
                                         alt="">
                                @endif
                            </div>
                        </a>
                        <div class="w-100">
                            <div style="word-break: break-all">
                                <div class="">
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
                    <div class="mb-4 mt-4">
                        @if(auth()->user())
                            @if($topicObject->user_id != \Illuminate\Support\Facades\Auth::id())
                                <p class="accordion">Добавить комментарий</p>
                            @endif
                            <div class="panel">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <textarea id="textarea_style" name="text" class="textarea_style" id="" cols="30"
                                              rows="2" placeholder="Комментарий" required>{{ old('text') }}</textarea>
                                    <div id="text_area_div"></div>
                                    <input style="display: none" name="topic_id" type="hidden"
                                           value="{{ $topicObject->id }}">
                                    <input style="display: none" name="reply_user_id" type="hidden"
                                           value="{{ $topicObject->user_id }}">
                                    <input type="hidden" name="parent_id" value="{{ null }}">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="count_symbol-text">Кол-во символов: </span>
                                            <span class="count_letter-text">1000</span><span
                                                style="color: white">/1000</span>
                                        </div>
                                        <div>
                                            <button class="btn btn-info btn-send rounded-pill" type="submit">
                                                Ответить
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="pt-4">
                                <p class="text">Оставить комментарий можно после авторизации <a class="text-info" href="{{ route('login') }}">Войти</a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                @include('pages.topic.comment_display', [
                'topic_id' => $topicObject->id,
                'reply_user_id' => $topicObject->user_id,
                'comments' => $topicObject->comments,
                ])
                <div>
                </div>
            </div>
        </div>
@endsection
