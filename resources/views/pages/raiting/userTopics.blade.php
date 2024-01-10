@extends('layouts.app')
@section('content')
    <div class="page">
        <div class="container">
            <div class="pt-2">
                <h5 class="text">Посты пользователя {{ $user->name }}</h5>
            </div>
            <hr style="color: #fff">
            @if(empty($userTopics))
                <h5 class="text">Постов пока нет :)</h5>
            @else
                <table class="table_wrp">
                    <thead class="thead">
                    <tr>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Тема</span></th>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Создан</span></th>
                        <th class="th_col" scope="col"><span class="tab_text-gold">Просмотры</span></th>
                    </tr>
                    </thead>
                    @foreach($userTopics as $topic)
                        <tbody>
                        <tr onclick="window.location.href='{{ route('show.topic', $topic) }}'" class="tr_row">
                            <td class="td_row"><div style="word-wrap: break-word"><span class="tab_text-title">{{ $topic->title }}</span></div></td>
                            <td class="td_row"><span class="tab_text">{{ $topic->created_at->format('d.m.Y') }}</span></td>
                            <td class="td_row"><span class="tab_text">{{ $topic->view_count }}</span></td>
                        </tr>
                        </tbody>
                    @endforeach
                    @endif
                </table>
        </div>
    </div>
@endsection
