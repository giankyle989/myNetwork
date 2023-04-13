@include('partials.header')
<x-navbar/>
@if(count($users) > 0)
<div class="h-screen gap-y-2">
    <div class="w-1/2 mx-auto text-center">
        <h2>Search results for "{{ $query }}"</h2>
    </div>
    <div class="md:w-1/2 md:mx-auto mx-6">
    <ul>
        @foreach($users as $user)
            <li>
                <div class="flex flex-row justify-between items-center border-2 my-3 p-2 rounded-lg bg-white">
                    <div class="flex items-center shrink-0 gap-2">
                        <img class="shrink-0 h-14 w-14 rounded-full" src="{{Storage::url($user->image)}}" alt="User Photo">
                        <p class="text-lg">{{$user->firstname}} {{$user->lastname}}</p>
                    </div>
                    <div>
                        <a href="/profile/otherUser/{{$user->id}}" class="bg-sky-900 p-1.5 text-white rounded-md">Visit profile</a>
                    </div>
                </div>
            </li>
            
            
        @endforeach
    </ul>
    </div>
</div>

@else
    <p>No users found.</p>
@endif

@include('partials.footer')