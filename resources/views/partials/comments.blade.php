@foreach ($comments as $comment)
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading user_name">

                {{ $comment->user ? $comment->user->name : 'Delete' }}

                @if ($comment->parentComment)
                    <small class="ml-2 text-muted">
                        (Ответ
                        {{ $comment->parentComment->user ? $comment->parentComment->user->name : 'Delete' }}
                        )
                    </small>
                @endif

                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </h4>
            <p>{{ $comment->content }}</p>
            <a href="#" class="btn btn-primary btn-sm reply-button" data-comment-id="{{ $comment->id }}">Reply</a>

            <!-- Форма для ответа на комментарий -->
            <div class="reply-form" id="reply-form-{{ $comment->id }}" style="display: none;">
                <form action="{{ route('comments.storeOrReply') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Your reply"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit Reply</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.reply-button').click(function (e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            $('#reply-form-' + commentId).toggle();
        });
    });
</script>
