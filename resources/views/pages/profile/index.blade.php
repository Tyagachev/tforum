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
                @if($user->avatar->image)
                    <div class="d-flex flex-column align-items-center">
                        <div class="mb-4">
                            <img style="width: 100px; height: 100px"
                                 src="{{ url(('storage/' . $user->avatar->image)) }}" alt="">
                        </div>
                        @can('deleteAva', $user->avatar)
                            <form action="{{ route('delete.avatar') }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button class="btn btn-warning" type="submit">Удалить аватар</button>
                            </form>
                        @endcan
                    </div>
                @else
            </div>
            <div class="d-flex flex-column align-items-center p-2">
                <img style="width: 60px;" src="{{ asset('img/person.svg') }}" alt="">
                @include('pages.avatar.create')
            </div>
            @endif
            <div class="d-flex flex-column align-items-center">
                <div class="pt-2">
                    <p class="text">{{ $user->name }}</p>
                </div>
                <div class="pt-2">
                    <p class="text">На форуме с {{ $user->created_at->format('d.m.Y') }}</p>
                </div>

            </div>
            <hr style="color:#ffff">
            <div class="d-flex justify-content-center mt-5">
                <div class="w-50">
                    @include('pages.raiting.show')
                </div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="mt-4">
                    @can('ViewDeleteProfileButton', $user)
                        <form action="{{ route('profile.user.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-danger">Удалить профиль</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
