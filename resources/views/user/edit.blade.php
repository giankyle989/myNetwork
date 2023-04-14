@include('partials.header')
<x-navbar :user="$user"/> 
<div class="h-screen flex justify-center items-center">
    
    {{-- Center Container--}}
    <main class="flex flex-col md:flex-row">

        {{-- Title & tagline --}}
        <div class="text-center mb-6 md:text-left md:flex md:flex-col md:justify-center md:mr-6">
            <h3 class="text-6xl font-bold text-sky-900">Edit Profile</h3>
        </div>

        {{-- Edit Form --}}
        <div class="border-2 p-4 shadow-xl rounded bg-white">
            <form action="/update" method="post" class="p-4 gap-2 flex flex-col" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="">
                    <label for="firstname">First Name</label>
                    <input class="w-full border-2 p-1.5 focus:outline-none focus:border-sky-300 rounded" name="firstname" type="text" value="{{$user->firstname}}"/>
                </div>
                <div class="">
                    <label for="lastname">Last Name</label>
                    <input class="w-full border-2 p-1.5 focus:outline-none focus:border-sky-300 rounded" name="lastname" type="text" value="{{$user->lastname}}"/>
                </div>
                <div class="flex flex-col">
                    <label for="image">Image</label>
                    <input class="border-2" name="image" type="file"/>
                </div>
                <select name="country" class="form-select">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country', $user->country_id) == $country->id ? 'selected' : '' }}>
                            {{ $country->name }} - {{ $country->code }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-sky-500 hover:bg-sky-400 text-white font-bold py-2 px-4 border-b-4 border-sky-700 hover:border-sky-500 rounded my-2">Update</button>
            </form>
        </div>
    </main>
</div>
@include('partials.footer')

