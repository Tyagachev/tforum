@extends('pages.admin.index')
@section('admin-content')
    <div class="container">
        <h4>Список подозрительных комментов</h4>
        <form action="{{ route('admin.comment-list.show') }}" method="GET">
            <p>Выберите дату:
                <input type="date" name="today" value="{{ \Carbon\Carbon::now()->toDateString()}}">
                <input type="date" name="tomorrow" value="{{ \Carbon\Carbon::now()->addDays(1)->toDateString() }}">
                <button class="btn btn-primary" type="submit">Поиск</button>
        </form>
    @include('pages.admin.commentList.show')
       </div>
   @endsection


