@extends('layouts.app')
@section('content')
    <div class="page">
        <h4 class="inner_title text-center pt-2">Правила форума</h4>
        <div class="pb-2">
            @foreach($rules as $rule)
                <div class="d-flex">
                    <div class="list-group-item pb-4">
                        <p class="text" style="padding: 0 5px 0 0">{{ $rule->paragraph }}.</p>
                    </div>
                    <div>
                        <p class="text">{!! $rule->rule !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
