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
                    <h1 class="text-2xl font-bold mb-4 text-white">CRUD Table</h1>

                    <!-- Add Button -->
                    <div class="mb-4">

                        @if(auth()->user()->can('add posts'))
                            <a href="{{ route('add-post') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Yenisini elave et
                            </a>
                        @endif

                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        @if(auth()->user()->can('show posts'))
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Text</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $post->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $post->text }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $post->created_at }}</td>
                                    <td class="border border-gray-300 px-4 py-2 flex gap-2">
                                        <!-- Edit Link -->
                                        @if(auth()->user()->can('edit posts'))
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                                            Edit
                                        </a>
                                        @endif

                                        @if(auth()->user()->can('delete posts'))
                                        <!-- Delete Form -->
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                                Delete
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">
                                        No posts available.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
