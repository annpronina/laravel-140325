<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="post-list">
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->content }}</p>
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image">
                            @endif

                            <form action="{{ route('comments.store', $post->id) }}" method="post">
                                @csrf
                                <textarea name="content" id="" cols="50" rows="10"></textarea>
                                <button class="button">Comment</button>
                            </form>

                            <ul>
                                @foreach($post->comments as $comment)
                                    <li>{{ $comment->content }}</li>
                                @endforeach
                            </ul>


                            <ul>
                            @foreach($post->comments as $comment)
                                <li>by {{ $comment->user->name }}</li>
                                <p>{{ $comment->content }}</p>

                           </ul>

                           @if ($comment->user_id == auth()->user()->id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                @endif
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>