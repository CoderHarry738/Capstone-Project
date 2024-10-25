
@include('partials.header')
<?php $array = array('title' => 'Patient Portal') ;?>
<x-navbar :data="$array"/>
<x-messages />

<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-center text-white">Patient List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="relative overflow-x-auto">
        <table class="text-sm text-left text-gray-500 w-96">
            <thead class="text-xs uppercase text gray-700 bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Age
                    </th>
                    <th scope="col">

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ( $patients as $patient)
                <tr class="text-white bg-gray-800 border-b">
                   @php $default_profile = "https://avatars.dicebear.com/api/initials/".$patient->first_name."-".$patient->last_name.".svg"
                   @endphp
                    <td class="px-6 py-4">
                        <img src="{{ $patient->patient_image ? asset("storage/patient/thumbnail/".$patient->patient_image) : "default.png" }}">
                    </td>
                    <td class="px-6 py-4">
                        {{ $patient->first_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $patient->last_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $patient->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $patient->age }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="/patient/{{ $patient->id }}" class="px-4 py-1 text-white rounded bg-sky-600">view</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="max-w-lg p-4 pt-6 mx-auto">
        {{ $patients->links()}}
    </div>
    </div>
</section>
@include('partials.footer')

{{-- <ul>
    @foreach ( $patients as $patient)

    <li> {{ $patient->gender }}
        {{ $patient->gender_count }}

    </li>

    @endforeach
</ul> --}}
