@extends("dashboard.layout")

@section("content")

<h1>Crear Post</h1>

@include("dashboard.fragment._errors-form")

<form action="{{ route('post.store') }}" method="POST">
    @include("dashboard.post._form")
</form>

@endsection