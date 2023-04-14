    {{--UserInfo--}}
    <div class="border-2 flex flex-col items-center p-4 rounded bg-white shadow-xl lg:h-fit">
        <div class="p-2">
            <img class="h-24 w-24 rounded-full border-2 border-slate-300 object-cover" src="{{Storage::url($user->image)}}" alt="User Photo">
        </div>

        <div class="p-2">
            <h3> {{ $user->firstname }} {{ $user->lastname }}</h3>
        </div>
        <div class="p-2 flex">
            @if ($user->country)
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 22s8.029-5.56 8-12c0-4.411-3.589-8-8-8S4 5.589 4 9.995C3.971 16.44 11.696 21.784 12 22zM8 9h3V6h2v3h3v2h-3v3h-2v-3H8V9z"></path></svg>
            {{$user->country->name}}, {{$user->country->code}}
            @endif
        </div>
        <div>
            {{ $editProfile ?? ''}}
        </div>
    </div>