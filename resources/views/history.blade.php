<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- History Table Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Success Message -->
                    @if (session()->has('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- History Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nama</th>
                                    <th class="px-4 py-2">Tanggal</th>
                                    <th class="px-4 py-2">Jam</th>
                                    <th class="px-4 py-2">Unit</th>
                                    <th class="px-4 py-2">Driver</th>
                                    <th class="px-4 py-2">Tambahan/Tujuan</th>
                                    <th class="px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($p as $pe)
                                    <tr>
                                        <td class="px-4 py-2">{{ $pe->nama }}</td>
                                        <td class="px-4 py-2">{{ $pe->tanggal }}</td>
                                        <td class="px-4 py-2">{{ $pe->jam }}</td>
                                        <td class="px-4 py-2">{{ $pe->unit }}</td>
                                        <td class="px-4 py-2">{{ $pe->driver }}</td>
                                        <td class="px-4 py-2">{{ $pe->tambahan }}</td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('pendaftaran.destroy', ['pendaftaran' => $pe]) }}"
                                                  onsubmit="return confirm('Are you sure you want to delete this registration?');">
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