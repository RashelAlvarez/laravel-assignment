<h1>List of Posts and Comments</h1>

@foreach ($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>

        <h3>Comentarios:</h3>
        @if ($post->comments->isEmpty())
            <p>No hay comentarios para este post.</p>
        @else
            <ul>
                @foreach ($post->comments as $comment)
                    <li>
                        <strong>{{ $comment->name }}:</strong> {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endforeach
