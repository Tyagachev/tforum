@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            @if(session('success'))<p class="bg-success">{{ session('success') }}</p>@endif
                <div class="d-flex pt-5">
                    <div class="theme_image-block">
                        <img class="theme_img" src="{{ url('storage/'. $theme->image) }}" alt="">
                    </div>
                    <div>
                        <h3 class="text">{{ $theme->title }}</h3>
                        <h5 class="text">{{ $theme->subtitle }}</h5>
                        @can('view', auth()->user())<a href="{{ route('edit.theme', $theme) }}">Редактировать</a>@endcan
                    </div>
                </div>
                <div class="pt-4">
                    @if(Auth::user())
                        <a href="{{ route('create.topic', $theme->id) }}">
                            <button type="button" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                </svg>
                                Добавить тему
                            </button>
                        </a>
                </div>
                @else
                    <div class="pt-4">
                        <p class="text">Добавить тему можно после авторизации <a href="{{ route('login') }}">Войти</a></p>
                    </div>
                @endif
            <hr style="color: #fff">
            @if(empty($themeTopics))
                <h1 class="text">Записей пока нет :)</h1>
            @else
                <table class="table_wrp">
                    <thead class="thead">
                    <tr>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Тема</span></th>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Автор</span></th>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Создан</span></th>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Просмотры</span></th>
                        <th class="th_col" scope="col"><span class="tab_text-gold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                </svg>
                            </span>
                        </th>
                    </tr>
                    </thead>
                    @foreach($themeTopics as $topic)
                        <tbody>
                        <tr onclick="window.location.href='{{ route('show.topic', $topic) }}'" class="tr_row">
                            <td class="td_row"><div style="word-wrap: break-word"><span class="tab_text-title">{{ $topic->title }}</span></div></td>
                            <td class="td_row"><span class="tab_text">{{ \App\Models\User::find($topic->user_id)->name }}</span></td>
                            <td class="td_row"><span class="tab_text">{{ $topic->created_at->format('d.m.Y') }}</span></td>
                            <td class="td_row"><span class="tab_text">{{ $topic->view_count }}</span></td>
                            <td class="td_row"><span class="tab_text">{{ \App\Models\Topic::query()->find($topic->id)->comments()->count() }}</span></td>
                        </tr>
                        </tbody>
                    @endforeach
                    @endif
                </table>
        </div>
    </div>
@endsection
