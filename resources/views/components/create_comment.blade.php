<form method="post" action="/store/comment">
    @csrf
    <div class="pt-4">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input class="w-full rounded-md p-2" type="text" name="comment_text" placeholder="Write a comment">
    </div>
</form>