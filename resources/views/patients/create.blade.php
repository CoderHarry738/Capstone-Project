@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-center text-white">Add New Patient</h1>
    </a>
</header>
<main class="max-w-lg p-8 mx-auto my-10 bg-white rounded-lg shadow-2xl">

    <section class="mt-10">
        <form action="/add/patient/" enctype="multipart/form-data" class="flex flex-col" method="POST">
            @csrf
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="first_name" class="block mb-2 ml-3 text-sm font-bold text-gray-700">First Name</label>
                <input type="text" name="first_name" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none" autocomplete="off" value={{ old('first_name') }}>
                @error('first_name')
                    <p class="p-1 text-xs text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="last_name" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Last Name</label>
                <input type="text" name="last_name" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none" autocomplete="off" value={{ old('last_name') }}>
                @error('last_name')
                    <p class="p-1 text-xs text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="gender" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Gender</label>
                <select name="gender" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none">
                    <option value="" {{ old('gender') == "" ? 'selected' : '' }}></option>
                    <option value="Male" {{ old('gender') == "Male" ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == "Female" ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p class="p-1 text-xs text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="age" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Age</label>
                <input type="number" name="age" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none" value={{ old('age') }}>
                @error('age')
                    <p class="p-1 text-xs text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="email" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none" autocomplete="off" value={{ old('email') }}>
                @error('email')
                    <p class="p-1 text-xs text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="pt-3 mb-6 bg-gray-200 rounded">
                <label for="patient_image" class="block mb-2 ml-3 text-sm font-bold text-gray-700">Patient Image</label>
                <input type="file" name="patient_image" class="w-full px-3 text-gray-700 bg-gray-200 border-b-4 border-gray-400 rounded focus:outline-none" autocomplete="off" >
                @error('patient_image')
                    <p class="p-1 text-xs text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="py-2 font-bold text-white transition duration-200 bg-blue-600 rounded shadow-lg hover:bg-blue-700 hover:shadow-xl" type="submit">Add New</button>
        </form>
    </section>
</main>
@include('partials.footer')
