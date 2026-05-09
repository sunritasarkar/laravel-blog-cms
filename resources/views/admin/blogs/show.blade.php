@extends('admin.layout')

@section('content')

<h1 class="mb-3">
    {{ $blog->title }}
</h1>

<p class="text-muted">
    Category: {{ $blog->category->name ?? 'No Category' }}
</p>

<img src="{{ asset('uploads/'.$blog->image) }}"
     width="300"
     class="mb-4">

<div class="border p-4 bg-light rounded">

    {!! $blog->content !!}

</div>

@endsection