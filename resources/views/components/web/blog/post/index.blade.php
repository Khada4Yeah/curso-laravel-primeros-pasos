<div>
    {{ $slot }}

    @foreach ($posts as $p)
    <div class="card card-white mb-2">
        <h3>{{ $p->title }}</h3>
        <a href="{{ route('web.blog.show', $p) }}">Ir</a>
        <h3>{{ $p->description }}</h3>
    </div>
    @endforeach

    {{ $posts->links() }}

</div>