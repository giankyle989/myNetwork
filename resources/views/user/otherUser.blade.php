@include('partials.header')
<x-navbar :user="$user"/>
<x-otherUser_info :user="$user"/>
@if(auth()->user()->isFollowing($user))
    @if ($user->posts->count() > 0)
        <h2 class="font-semibold ml-1">Posts</h2>
        <x-post_list>
            @foreach($user->posts as $post)
                <x-post :user="$user" :post="$post" :comments="$post->post_comment"/>
            @endforeach
        </x-post_list>
    @endif
@else
    <p>You must follow this user to see their posts.</p>
@endif
@include('partials.footer')