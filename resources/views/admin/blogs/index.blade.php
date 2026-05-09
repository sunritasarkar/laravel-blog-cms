@extends('admin.layout')

@section('content')

<h2 class="mb-4">All Blogs</h2>

<a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">
    Add Blog
</a>
<table class="table table-bordered">

    <thead>

        <tr>

            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

        @foreach($blogs as $blog)

        <tr>

            <td>
    <a href="{{ route('blogs.show', $blog->id) }}">
        {{ $blog->title }}
    </a>
</td>

            <td>{{ $blog->category->name ?? 'No Category' }}</td>

            <td>{{ $blog->published_at }}</td>

            <td>
                <a href="{{ route('blogs.edit', $blog->id) }}"
                class="btn btn-sm btn-warning">
                Edit
                </a>

                <form action="{{ route('blogs.destroy', $blog->id) }}"
      method="POST"
      style="display:inline;">

    @csrf

    @method('DELETE')

    <button class="btn btn-danger btn-sm">
        Delete
    </button>

</form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection