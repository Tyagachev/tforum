@foreach($comments as $comment)
    <div>
        <div style="padding: 10px">
            <div>
                <div class="comment-wrp">
                    @if($comment->parent_id == null)
                        <div class="profile d-flex justify-content-between">
                            <a style="text-decoration: none" href="{{ route('profile.index', $comment->user_id) }}">
                                <div class="avatar_border_reply">
                                @if($comment->user->avatar->image)
                                        <img style="width: 100px; height: 100px; margin-right: 10px;" src="{{ url(('storage/' . $comment->user->avatar->image)) }}" alt="">
                                @else
                                        <img style="width: 60px; margin-right: 10px;" src="{{ asset('img/person.svg') }}" alt="">
                                @endif
                                <p class="text">{{ $comment->user->name }}</p>
                                </div>
                            </a>
                            <div class="d-flex flex-column align-items-center mb-1">
                                <p class="text">{{ $comment->dateAsCarbon->diffForHumans() }}</p>
                                @can('deleteComment', $comment->getCommentData($comment->id))
                                    <form action="{{ route('comment.delete') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $comment->id }}">
                                        <button class="btn_delete" type="submit">Удалить</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    <div class="d-flex">
                        <div>
                            <p class="tab_text-gold">Комментарий к посту</p>
                        </div>
                        <div class="comment_arrow">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gold" class="bi bi-arrow-90deg-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708z"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                        <div style="background-color: #555d70; padding: 10px; border: 1px solid white">
                            {!! $comment->topic->text !!}
                        </div>
                        <div>
                            <p class="text">{!! $comment->text !!}</p>
                        </div>
                    @else
                        <div style="margin: 0 0 0 20px">
                            <div class="d-flex justify-content-between">
                                <a style="text-decoration: none" href="{{ route('profile.index', $comment->user_id) }}">
                                    <div class="profile d-flex">
                                        <div class="avatar_border_reply">
                                            @if($comment->user->avatar->image)
                                                <img style="width: 100px; height: 100px; margin-right: 10px;" src="{{ url('storage/' . $comment->user->avatar->image) }}" alt="">
                                            @else
                                                <img style="width: 60px; margin-right: 10px;" src="{{ asset('img/person.svg') }}" alt="">
                                            @endif
                                            <p class="text">{{ $comment->user->name }}</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex flex-column align-items-center mb-1">
                                    <p class="text">{{ $comment->dateAsCarbon->diffForHumans() }}</p>
                                    @can('deleteComment', $comment)
                                        <form action="{{ route('comment.delete') }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $comment->id }}">
                                            <button class="btn_delete" type="submit">Удалить</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <p class="tab_text-gold">Ответ на комментарий</p>
                                </div>
                                <div class="comment_arrow">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gold" class="bi bi-arrow-90deg-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708z"/>
                                </svg>
                            </span>
                                </div>
                            </div>
                        <div style="background-color: #555d70;padding: 10px; border: 1px solid white">
                        <div class="d-flex">
                            <div style="margin-right: 10px">
                                @if($comment->user->avatar->image)
                                    <img style="width: 60px" src="{{ url('storage/' . $comment->user->avatar->image) }}" alt="">
                                @else
                                    <img style="width: 60px;" src="{{ asset('img/person.svg') }}" alt="">
                                @endif
                            </div>
                            <div>
                                <p>{{ $comment->getReplyUserName($comment->reply_user_id) }}</p>
                                <p class="text">{!! $comment->getCommentData($comment->parent_id)->text !!}</p>
                            </div>
                        </div>
                    </div>
                        <div class="comment_text">
                            <p class ="text">{!! $comment->text !!}</p>
                        </div>
                    @endif
                            <div>
                                <form class="likeForm">
                                    @if(auth()->user())
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                    <input type="hidden" name="likeable_id" value="{{ $comment->id }}">
                                    @endif
                                    <div class="d-flex justify-content-end align-items-center">
                                            <button  class="btn p-1">
                                                <svg id="{{ $comment->id }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                     fill="
                                                     {{ ($comment->isLikeExistComment($comment->id)) ? 'red' : 'white' }}"
                                                     class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                </svg>
                                            </button>
                                        @php
                                            $i = 0;
                                        @endphp

                                        @foreach($comment->likes as $likes)
                                            @php
                                                if ($likes->likeable_id == $comment->id) {
                                                    $i++;
                                                }
                                            @endphp
                                        @endforeach
                                        <div>
                                            <span id="{{ $comment->id }}" style="color: white">{{ $i }}</span>
                                        </div>
                                    </div>

                                </form>
                            </div>
                    <div>
                        @if(auth()->user())
                            @if($comment->user_id != auth()->user()->id)<p class="accordion">Добавить комментарий</p>@endif
                            <div class="panel">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                        <textarea class="textarea_style" name="text" id="" cols="30" rows="2" placeholder="Комментарий" required>{{ old('text') }}</textarea>
                                        <input type="hidden" name="topic_id" value="{{ $topic_id }}">
                                        <input type="hidden" name="reply_user_id" value="{{ $comment->user_id }}">
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span class="count_symbol-text">Кол-во символов: </span>
                                            <span class="count_letter-text">1000</span><span style="color: white">/1000</span>
                                        </div>
                                        <div>
                                            <button class="btn btn-info btn-send rounded-pill" type="submit">
                                                Ответить
                                            </button>
                                        </div>
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

