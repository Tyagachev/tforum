@foreach($comments as $comment)
    <div>
        <div style="padding: 10px">
            <div>
                <div class="comment-wrp">

                    @if($comment->parent_id == null)
                        <p class="tab_text-gold">Комментарий к посту:</p>
                        <div style="background-color: #555d70; padding: 10px; border: 1px solid white">
                            {!! \App\Models\Topic::query()->find($comment->topic_id)->text !!}
                        </div>
                        <div>
                            <p class="text">{!! $comment->text !!}</p>
                        </div>
                    @else
                        <div style="margin: 0 0 0 20px">
                            <div class="d-flex justify-content-between">
                                <a style="text-decoration: none" href="{{ route('profile.index', $comment->user_id) }}">
                                    <div class="profile">
                                        <img style="width: 100px; height: 100px;" src="{{ url(('storage/' . \App\Models\User::query()->find($comment->user_id)->avatar->image)) }}" alt="">
                                        <p class="text">{{ \App\Models\User::query()->find($comment->user_id)->name }}</p>
                                    </div>
                                </a>
                                <div class="d-flex flex-column mb-1">
                                    <p class="text">{{ $comment->created_at->format('d.m.Y') }}</p>
                                    @can('deleteComment', \App\Models\Comment::query()->find($comment->id))
                                        <form action="{{ route('comment.delete') }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $comment->id }}">
                                            <button class="btn_delete" type="submit">Удалить</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        <p class="tab_text-gold">Ответ на комментарий:</p>
                        <div style="background-color: #555d70;padding: 10px; border: 1px solid white">
                        <div class="d-flex">
                            <div style="margin-right: 10px">
                                <img style="width: 60px" src="{{ url(('storage/' . \App\Models\User::query()->find($comment->reply_user_id)->avatar->image)) }}" alt="">
                            </div>
                            <div>
                                <p>{{ \App\Models\User::query()->find($comment->reply_user_id)->name }}</p>
                                <p class="text">{!! \App\Models\Comment::query()->find($comment->parent_id)->text !!}</p>
                            </div>
                        </div>
                    </div>
                        <div class="comment_text">
                            <p class ="text">{!! $comment->text !!}</p>
                        </div>
                        </div>
                    @endif
                    <div>
                        @if(auth()->user())
                            <p class="accordion">Ответить</p>
                            <div class="panel">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <div style="display: flex; margin-bottom: 10px">
                                        <textarea class="textarea_style" name="text" id="" cols="30" rows="2" placeholder="Комментарий" required></textarea>
                                        <input type="hidden" name="topic_id" value="{{ $topic_id }}">
                                        <input type="hidden" name="reply_user_id" value="{{ $comment->user_id }}">
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <button class="textarea_btn" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send" viewBox="0 0 20 20">
                                                <path class="fil0" d="M19.62 9.24c0.07,-0.03 0.14,-0.07 0.2,-0.13 0.24,-0.25 0.24,-0.65 0,-0.89 -0.06,-0.06 -0.13,-0.11 -0.2,-0.14l-18.17 -7.79 -0.01 0 -0.56 -0.24c-0.24,-0.1 -0.51,-0.05 -0.69,0.14 -0.16,0.15 -0.22,0.37 -0.17,0.58l0.13 0.6 0 0 1.62 7.29 -1.62 7.3 0 0 -0.13 0.6c-0.05,0.21 0.01,0.43 0.17,0.58 0.18,0.18 0.45,0.23 0.69,0.13l18.74 -8.03 0 0zm-16.7 0.05l0.11 -0.49c0.02,-0.09 0.02,-0.18 0,-0.27l-0.11 -0.5 13.38 0 1.47 0.63 -1.47 0.63 -13.38 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('pages.topic.commentDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
