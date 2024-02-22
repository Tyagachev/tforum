@extends('pages.admin.index')
@section('admin-content')
    <div class="container">
        <h4>Список пользователей</h4>
        <div class="input-group w-75 m-1">
            <form class="d-flex w-75" action="{{ route('admin.user-list.search') }}" method="GET">
                <input type="text" name="user_name" class="form-control form-control-lg rounded-0" placeholder="Ник пользователя">
                <div class="input-group-append" style="background-color: #e4e4e4">
                    <button type="submit" class="btn btn-lg btn-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <h4>{{ session('not_found') }}</h4>
        <div class="pt-2 pb-2">
            <a href="{{ route('admin.user-list.create') }}"><button class="btn btn-primary">Добавить пользователя</button></a>
        </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ник</th>
            <th scope="col">Почта</th>
            <th scope="col">Роль</th>
            <th scope="col">Рег</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usersList as $list)
        <tr>
            <td>{{ $list->id }}</td>
            <td onclick="window.location.href='{{ route('admin.user-list.show',$list->id) }}'"><a href="{{ route('admin.user-list.show',$list->id) }}">{{ $list->name }}</td>
            <td>{{ $list->email }}</td>
            <td>{{ $list->role }}</td>
            <td>{{ $list->created_at->format('d.m.Y') }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
