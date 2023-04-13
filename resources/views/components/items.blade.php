<ul class="flex flex-col md:flex-row px-4 text-sm font-bold">
    <li>
        <a href="/" class="block py-2 pl-3 pr-4 text-white">Feed</a>
    </li>
    <li>
        <a href="/profile" class="block py-2 pl-3 pr-4 text-white">Profile</a>
    </li>
    <li>
        <form action="/logout" method="post">
            @csrf
            <button class="block py-2 pl-3 pr-4 text-white" type="submit">Logout</button>
        </form>
    </li>
</ul>