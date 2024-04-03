@extends('layouts.app')
@section('content')
<div class="page">
    <div class="wrp">
    <img class="w-100" src="{{ asset('img/logo1.jpg') }}" alt="">
    <div class="container">
        <div class="pt-2">
            @can('view', auth()->user())
                <div class="theme_header-btn">
                    <a href="{{ route('create.theme') }}">
                        <button class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            </svg>
                            Добавить сообщество
                        </button>
                    </a>
                </div>
            @endcan
            <div class="theme_block-wrp">
                @foreach($themes as $theme)
                    <a class="theme_link" href="{{ route('show.theme', $theme->id) }}">
                        <div class="theme_block">
                            <div class="mb-2">
                                <img class="theme_img" src="{{ url('storage/' . $theme->image) }}" alt="">
                            </div>
                            <div class="theme_text-wrp">
                                <h5 class="theme_text-title">{{ $theme->title }}</h5>
                                <p class="theme_text-subtitle">{{ $theme->subtitle }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="pt-5"></div>
</div>
@endsection
