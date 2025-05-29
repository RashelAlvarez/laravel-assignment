<h1>List of Users and Posts</h1>

@foreach ($users as $user)
    <h2>{{ $user->name }}</h2>
    <h3>Posts:</h3>
    <ul>
        @foreach ($user->posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endforeach
