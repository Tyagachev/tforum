@extends('pages.admin.index')
@section('admin-content')
    <div style="margin: 0 0 0 10px">
        <h4>Добавление пользователя</h4>
        <form action="{{ route('admin.user-list.store') }}" method="POST">
            @csrf
            <div class="mb-2">
                <input type="text" name="name" required placeholder="Ник">
            </div>
            <div class="mb-2">
                <input type="email" name="email" required placeholder="Почта">
            </div>
            <div class="mb-2">
                <select name="role" id="">
                    <option value="0">Пользователь</option>
                    <option value="1">Администратор</option>
                    <option value="2">Модератор</option>
                </select>
            </div>
            <div class="mb-2">
                <input type="password" name="password" required placeholder="Пароль">
            </div>
            <div class="mb-2">
                <input type="password" name="password_confirmation" required placeholder="Подтвердите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
