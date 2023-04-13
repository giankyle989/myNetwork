<div class="mt-1.5">
    <h4 class="font-semibold ml-1">Create post</h4>
    <form action="/store/post" method="post">
        @csrf
        <div class="border-2 shadow-xl rounded-lg bg-white">
            <div class="p-2 flex flex-row overflow-hidden whitespace-normal relative" >
                <input name="body" class="focus:outline-none flex-grow p-2" type="text" placeholder="Share your thoughts" autocomplete="off"/>
                <button type="submit" class="bg-sky-900 rounded-md py-1.5 px-4 text-white mt-1.5">Post</button>
            </div>
        </div>
    </form>
</div>