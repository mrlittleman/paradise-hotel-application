<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <!-- Wider max width -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-gray-100">
                    <section class="container px-5 py-12 mx-auto">
                        <div class="mb-12">
                            <h2 class="text-4xl font-semibold text-white text-center mb-6">All Jobs ({{ $listings->count() }})</h2>
                            <div class="flex justify-center space-x-4 mb-8">
                                @foreach ($tags->take(6) as $tag) <!-- Show only 4-6 tags -->
                                    <a href="{{ route('listings.index', ['tag' => $tag->slug]) }}" class="text-blue-500 hover:text-blue-400 font-semibold">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <!-- Two columns for listings -->
                                @foreach($listings as $listing)
                                    <div class="mb-6 p-4 border rounded-lg bg-gray-700 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <h3 class="text-2xl font-bold text-white">{{ $listing->title }}</h3> <!-- Title in white -->
                                        <p class="text-gray-300 mt-2">{{ $listing->description }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <div class="mt-6">
                        <!-- Job Post Content here -->
                        <p>Your job post content goes here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
