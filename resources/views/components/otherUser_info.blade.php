{{--UserInfo--}}
<div class="border-2 flex flex-col items-center p-4 rounded bg-white shadow-xl lg:h-fit">
    <div class="p-2">
        <img class="h-24 w-24 rounded-full border-2 border-slate-300 object-cover" src="{{Storage::url($user->image)}}" alt="User Photo">
    </div>

    <div class="p-2">
        <h3> {{ $user->firstname }} {{ $user->lastname }}</h3>
    </div>

    <div>
        {{ $editProfile ?? ''}}
    </div>


</div>