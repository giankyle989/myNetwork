<nav x-data="{ open: false}" class="bg-sky-900 p-2">
    <div class="min-w-full container flex flex-wrap justify-between items-center ">
        <div class=" gap-2 p-2 text-white flex">
            <h3 class="font-bold">MyNetwork</h3>
            <x-search/>
        </div>

        <button data-collapse-toggle="navbar-main" class=" lg:hidden mr-4"  @click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" fill="#f8f8f8" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        </button>
        <div class="w-full lg:hidden" x-show="open">
            <x-items/>
        </div>
        <div class="hidden lg:block" id="navbar-main">
            <x-items/>
        </div>
    </div>
</nav>
