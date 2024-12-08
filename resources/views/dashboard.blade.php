<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-4">
                    <h1 class="text-2xl font-bold mb-4">CRUD Table</h1>

                    <!-- Add Button -->
                    <div class="mb-4">
                        <a href="{{ route('add-post') }}" class="bg-blue-500 text-green-600 px-4 py-2 rounded hover:bg-blue-600">
                            Yenisini elave et
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Row 1 -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">1</td>
                                <td class="border border-gray-300 px-4 py-2">John Doe</td>
                                <td class="border border-gray-300 px-4 py-2">john@example.com</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <button class="bg-yellow-500 text-blue-500 px-2 py-1 rounded hover:bg-yellow-600">
                                        Edit
                                    </button>
                                    <button class="bg-red-500 text-red-500 px-2 py-1 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
