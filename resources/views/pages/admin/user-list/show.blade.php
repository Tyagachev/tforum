@extends('pages.admin.index')
@section('admin-content')
    <div>
        <p>{{ $userObj->name }}</p>
    </div>
    <div>
        <form action="{{ route('admin.user-list.delete') }}" method="POST">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{$userObj->id}}">
            <button class="btn btn-danger" type="submit">Удалить</button>
        </form>
    </div>
@endsection
