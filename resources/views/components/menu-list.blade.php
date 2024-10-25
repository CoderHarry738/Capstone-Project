<ul class="flex flex-col px-4 md:flex-row">
    @auth
    <li>
        <a href="/add/patient" class="block py-2 pl-3 pr-4">Add New</a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
        <button class="block py-2 pl-3 pr-4">Logout</button>
    </form>
    </li>
    @else


    <li>
        <a href="/login" class="block py-2 pl-3 pr-4">Sign In</a>
    </li>
    <li>
        <a href="/register" class="block py-2 pl-3 pr-4">Sign Up</a>
    </li>
    @endauth
</ul>
