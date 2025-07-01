

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3>Rate {{ $user->name }} user from 1 to 5</h3>

                <form method="POST" action="{{ route('rating.submit', $user->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="rating">Rating:</label>
                        <input type="number" name="rating" id="rating" min="1" max="5" required>
                    </div>

                    <div class="mb-4">
                        <label for="comment">Comment (optional):</label>
                        <textarea name="comment" id="comment" rows="4" placeholder="Leave a comment"></textarea>
                    </div>

                    <button type="submit">Submit Rating</button>
                </form>

                @if(session('success'))
                    <div>{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </div>

