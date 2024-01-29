@extends('pages.admin.index')
@section('admin-content')
    <div class="m-2">
        <form action="{{ route('admin.tag.store') }}" method="POST">
            @csrf
            <div class="">
                <label class="col-md-4 col-form-label">Название тега:</label>
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" name="name" required>
                </div>
                <label class="col-md-4 col-form-label">Связать с темой:</label>
                <div class="col-md-6 mb-2">
                    <select name="theme_id" required>
                        @foreach($theme as $t)
                        <option value="{{ $t->id }}">{{ $t->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </form>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Сообщество</th>
                <th scope="col">Тэг</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $res)
                <tr>
                    <td>{{ $res->title }}</td>
                    <td>{{ $res->name }}</td>
                    <td>
                        <form action="{{ route('admin.tag.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="tag_id" value="{{ $res->tag_id }}">
                            <input type="hidden"  name="theme_id" value="{{ $res->theme_id }}">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
