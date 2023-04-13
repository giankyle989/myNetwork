@include('partials.header')
@include('components.navbar')

<div class="flex flex-col lg:flex-row">
    <div class="hidden lg:block lg:w-1/3 lg:m-4">
        <x-user_info :user="$user"/>
    </div>
    <div class="lg:w-2/3 mx-4">
        <x-create_post/>
        @if ($user->posts->count() > 0)
            <h2 class="font-semibold ml-1">Posts</h2>
            <x-post_list>
                @foreach($user->posts as $post)
                <x-post :user="$user" :post="$post" :comments="$post->post_comment"/>
            @endforeach
            </x-post_list>
        @endif
    </div>

</div>




@include('partials.footer')