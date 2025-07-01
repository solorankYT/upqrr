<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3>Your Ratings Summary</h3>

                <div>
                    <strong>Average Rating: </strong>
                    @if ($ratingCount > 0)
                        {{ number_format($averageRating, 2) }} / 5
                    @else
                        No ratings yet.
                    @endif
                </div>

                <div>
                    <strong>Total Ratings: </strong> {{ $ratingCount }}
                </div>

                <h4>Recent Ratings</h4>
                <ul>
                    @foreach ($ratings as $rating)
                        <li class="mb-2 border-b pb-2">
                            <strong>Rating:</strong> {{ $rating->rating }} / 5
                            <br>
                            <strong>Comment:</strong> {{ $rating->comment ?? 'No comment' }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
