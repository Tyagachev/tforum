@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            @if(session('success'))
                <span class="bg-success">{{ session('success') }}</span>
                @else
                <span class="bg-success">{{ session('error') }}</span>
            @endif
            <div>
                <p>{{ $user->id }}</p>
                <p>{{ $user->avatar->user_id }}</p>
                @if($user->avatar->image)
                    <div class="d-flex flex-column align-items-center">
                        <div class="mb-4">
                            <img style="width: 100px; height: 100px" src="{{ url(('storage/' . $user->avatar->image)) }}" alt="">
                        </div>
                        @can('deleteAva', $user->avatar)
                        <form action="{{ route('delete.avatar') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn btn-danger" type="submit">Удалить аватар</button>
                        </form>
                        @endcan
                        <div class="pt-2">
                            <p class="text">{{ $user->name }}</p>
                        </div>
                        <div class="pt-2">
                            <p class="text">На форуме с {{ $user->created_at->format('d.m.Y') }}</p>
                        </div>
                    </div>
                @else
            </div>
                <div class="d-flex flex-column align-items-center">
                    @include('pages.avatar.create')
                </div>
               @endif
                <hr style="color:#ffff">
            <div class="d-flex justify-content-center mt-5">
                <div class="w-50">
                    @include('pages.raiting.show')
                </div>
            </div>
        </div>
    </div>
@endsection
