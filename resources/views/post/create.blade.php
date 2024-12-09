<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6">
                    <h1 class="text-2xl font-bold mb-6">Create Post</h1>

                    <form action="{{ route('store-post') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    @csrf

                    <!-- Post Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Post Name</label>
                            <input type="text" name="name" id="name"
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                   placeholder="Enter the name of the post" required>
                        </div>

                        <!-- Post Content -->
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                            <textarea name="text" id="content" rows="5"
                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                      placeholder="Write your post content here" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="bg-blue-500 text-green-500 px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
