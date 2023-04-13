@include('partials.header')

<div class="h-screen flex justify-center items-center bg-slate-100">
    {{-- Center Container--}}
    <main class="flex flex-col md:flex-row">
        {{-- Title & tagline --}}
        <div class="text-center mb-6 md:text-left md:flex md:flex-col md:justify-center md:mr-6">
            <h3 class="text-6xl font-bold text-sky-900">MyNetwork</h3>
            <p class="hidden md:block text-2xl">Building bridges. Connecting People.</p>
        </div>
    
    
        {{-- Login Form --}}
        <div class="border-2 p-4 shadow-xl rounded">
            <form action="/login/process" method="post" class="p-4 gap-2 flex flex-col">
                @csrf
                @error('email')
                <p class="text-xs text-red-600">
                    {{$message}}
                </p>
            @enderror
                <div class="">
                    <label for="email">Email</label>
                    <input class="w-full border-2 p-1.5 focus:outline-none focus:border-sky-300 rounded" name="email" type="text" value={{old('email')}}>
                </div>
                <div class="">
                    <label for="password">Password</label>
                    <input class="w-full border-2 p-1.5 focus:outline-none focus:border-sky-300 rounded" name="password" type="password"/>

                </div>
                <button type="submit" class="bg-sky-500 hover:bg-sky-400 text-white font-bold py-2 px-4 border-b-4 border-sky-700 hover:border-sky-500 rounded my-2">Login</button>
                <a href="register" class="text-center text-sky-400 hover:text-sky-300">Create an account</a>
            </form>
        </div>
    </main>
</div>

@include('partials.footer')