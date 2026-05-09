<!DOCTYPE html>
<html>

<head>

    <title>{{ $blog->title }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#f4f4f4;">

<div class="container py-5">

    <a href="/"
       class="btn btn-dark mb-4">
        Back
    </a>

    <img src="{{ asset('uploads/'.$blog->image) }}"
         class="img-fluid rounded mb-4"
         style="max-height:450px; width:100%; object-fit:cover;">

    <h1 class="fw-bold">
        {{ $blog->title }}
    </h1>

    <p class="text-muted mb-4">

        Category:
        {{ $blog->category->name ?? 'General' }}

        |

        {{ $blog->published_at }}

    </p>

    <div class="bg-white p-4 rounded shadow-sm">

        {!! $blog->content !!}

    </div>

</div>

</body>

</html>