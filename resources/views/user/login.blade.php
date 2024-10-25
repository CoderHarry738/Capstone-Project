@include('partials.header')
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-center text-white">Patient Login</h1>
    </a>
</header>
<main class="max-w-lg p-8 mx-auto my-10 bg-white rounded-lg shadow-2xl">
    <section>
    <h3 class="text-2xl font-bold">Welcome to Patient Portal</h3>
    <p class="pt-2 text-gray-600">Sign up a new account <a href="/register" class="font-bold text-purple-400">here</a></p>
    </section>
    <section class="mt-10">
        <form action="/login/process" method="POST" class="flex flex-col">
            @csrf
            @error('email')
                <p class="p-1 text-xs text-red-500">
                {{ $message }}
                </p>
            @enderror
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="email" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none">
            </div>
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="password" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none">
            </div>
            <button type="submit" class="py-2 font-bold text-white transition duration-200 bg-blue-600 rounded shadow-lg hover:bg-blue-700 hover:shadow-xl" type="submit">Login</button>
        </form>
    </section>
</main>
@include('partials.footer')
