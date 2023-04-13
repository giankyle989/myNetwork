@include('partials.header')
<x-navbar/>

<div class="flex flex-col lg:flex-row lg:justify-center gap-3 p-2">
    {{--Left Side--}}
    <div class="lg:h-screen lg:ml-4 lg:mt-2 lg:w-1/4 shrink-0 overflow-hidden">
        <div class="lg:ml-6 lg:mt-4 m-2 h-full">
            <x-user_info :user="$user">
                <x-slot name="editProfile">
                    <div>
                        <a href="/profile/edit" class="p-2 bg-sky-900 text-white rounded-full">Edit Profile</a>
                    </div>
                </x-slot>
            </x-user_info>
            {{--UserConnections--}}
            <div>
                <x-user_connection/>
            </div>
        </div>
    </div>
    {{--Right Side--}}
    <div class="flex flex-col lg:w-3/4 mx-4">
        <div class="p-2">
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
</div>
@include('partials.footer')