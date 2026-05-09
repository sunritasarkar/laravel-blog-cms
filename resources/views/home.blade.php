<!DOCTYPE html>
<html>

<head>

    <title>Blog CMS</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#f4f4f4;">

<nav class="navbar navbar-dark bg-dark mb-5">

    <div class="container">

        <a class="navbar-brand fw-bold">
            Blog CMS Platform
        </a>

    </div>

</nav>

<div class="container">

    <h1 class="mb-4 fw-bold">
        Latest Blogs
    </h1>

    <div class="mb-4">

        <button class="btn btn-dark filter-btn"
                data-category="">
            All
        </button>

        @foreach($categories as $category)

            <button class="btn btn-outline-dark filter-btn"
                    data-category="{{ $category->id }}">

                {{ $category->name }}

            </button>

        @endforeach

    </div>

    <div id="blog-data">

        @include('partials.blogs')

    </div>

</div>

<script>

document.querySelectorAll('.filter-btn').forEach(button => {

    button.addEventListener('click', function() {

        let category = this.dataset.category;

        fetch('/?category=' + category, {

            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }

        })

        .then(response => response.text())

        .then(data => {

            document.getElementById('blog-data').innerHTML = data;

        });

    });

});

</script>

</body>

</html>