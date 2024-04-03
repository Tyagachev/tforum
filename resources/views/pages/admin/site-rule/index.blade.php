@extends('pages.admin.index')
@section('admin-content')
    <div class="container">
        <h4>Правила форума</h4>
        <form action="{{ route('admin.rule.store') }}" method="POST">
            @csrf
            <input class="form-control mb-2 w-25" type="number" name="paragraph" placeholder="Параграф">
            <div class="form-floating mb-2">
                <textarea class="form-control" type="text" name="rule" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Правило</label>
            </div>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </form>
        @include('pages.admin.site-rule.rule-list', $ruleList)
    </div>
@endsection
