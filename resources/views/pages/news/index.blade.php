@extends('layouts.app')
@section('content')
<div class="page">
    <div>
        <div class="container">
            <img class="w-100" src="{{ asset('img/logo2.jpg') }}" alt="">
            <div class="pt-1">
                @can('view', Auth::user())
                <a href="{{ route('create.news') }}">
                <button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                </svg> Добавить новость</button>
                </a>
                @if(session('success'))
                <p class="bg-success">{{ session('success') }}</p>
                @else
                <p class="bg-danger">{{ session('error') }}</p>
                @endif
                @endcan
            </div>
                <div>
                    @foreach($news as $n)
                    <a class="news_link" href="{{ route('show.news', $n->id) }}">
                    <div class="news_wrapper">
                        <div class="w-100 p-1">
                            <div class="d-flex">
                                <img style="max-width: 200px;" src="{{ url('storage/' . $n->image) }}" alt="">
                                <div style="min-width: 200px;  word-wrap: break-word; margin:5px">
                                    <span class="inner_title"><h5>{{ $n->title }}</h5></span>
                                    <div class="pt-2">
                                        <span class="inner_subtitle">{{ $n->subtitle }}</span>
                                    </div>
                                    <div class="pt-2">
                                        <span class="text_data">{{ date('d.m.Y', strtotime($n->created_at)) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="mx-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                    <span style="color:white">{{ $n->view_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endsection
