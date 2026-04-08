<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Characters Table Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Success Message -->
                    @if (session()->has('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Character Button -->
                    <div class="mb-5">
                        <a href="{{ route('characters.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Unit
                        </a>
                    </div>

                    <!-- Characters Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Interior</th>
                                    <th class="px-4 py-2">Fitur</th>
                                    <th class="px-4 py-2">Unit</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Edit</th>
                                    <th class="px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c as $ca)
                                    <tr>
                                        <td class="px-4 py-2">
                                            <img src="{{ asset($ca->file) }}" alt="Character Image" class="w-32 h-32 object-cover">
                                        </td>
                                        <td class="px-4 py-2">
                                            <img src="{{ asset($ca->interior_image) }}" alt="Image interior" class="w-32 h-32 object-cover">
                                        </td>
                                        <td class="px-4 py-2">{{ $ca->feature }}</td>
                                        <td class="px-4 py-2">{{ $ca->unit }}</td>
                                        <td class="px-4 py-2">{{ $ca->status }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('characters.edit', ['character' => $ca]) }}"
                                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('characters.destroy', ['character' => $ca]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- driver Table Section (Second Table) -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Success Message -->
                    @if (session()->has('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Event Button -->
                    <div class="mb-5">
                        <a href="{{ route('events.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Driver
                        </a>
                    </div>

                    <!-- Events Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Foto</th>
                                    <th class="px-4 py-2">Nama</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Edit</th>
                                    <th class="px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($e as $ev)
                                    <tr>
                                        <td class="px-4 py-2">
                                            <img src="{{ asset($ev->file) }}" alt="Event Image" class="w-32 h-32 object-cover">
                                        </td>
                                        <td class="px-4 py-2">{{ $ev->nama }}</td>
                                        <td class="px-4 py-2">{{ $ev->status }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('events.edit', ['event' => $ev]) }}"
                                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('events.destroy', ['event' => $ev]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

                
                     <!-- Logo Table Section (Third Table) -->
<div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Success Message -->
                    @if (session()->has('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                     <!-- Create Event Button -->
                     <div class="mb-6">
                        <a href="{{ route('image.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Logo banner
                        </a>
                    </div>

                    <!-- logo Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">logo</th>
                                    <th class="px-4 py-2">banner</th>
                                    <th class="px-4 py-2">Edit</th>
                                    <th class="px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($i as $im)
                                    <tr>
                                        <td class="px-4 py-2">
                                            <img src="{{ asset($im->logo) }}" alt="logo" class="w-32 h-32 object-cover">
                                        </td>
                                        <td class="px-4 py-2">
                                            <img src="{{ asset($im->banner) }}" alt="banner" class="w-32 h-32 object-cover">
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('image.edit', ['image' => $im]) }}"
                                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('image.destroy', ['image' => $im]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>