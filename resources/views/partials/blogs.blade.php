<div class="row">

    @foreach($blogs as $blog)

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm border-0 h-100">

            <img src="{{ asset('uploads/'.$blog->image) }}"
                 class="card-img-top"
                 style="height:220px; object-fit:cover;">

            <div class="card-body">

                <span class="badge bg-primary mb-2">
                    {{ $blog->category->name ?? 'General' }}
                </span>

                <h4>{{ $blog->title }}</h4>

                <p class="text-muted">
                    {{ $blog->short_description }}
                </p>

          <a href="{{ route('blogs.show', $blog->id) }}"
   class="btn btn-dark">
    Read More
</a>

            </div>

        </div>

    </div>

    @endforeach

</div>