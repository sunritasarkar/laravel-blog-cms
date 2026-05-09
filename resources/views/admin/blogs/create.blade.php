@extends('admin.layout')

@section('content')

<h2 class="mb-4">Create Blog</h2>

<form action="{{ route('blogs.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">

        <label class="form-label">Title</label>

        <input type="text"
               name="title"
               class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">Slug</label>

        <input type="text"
               name="slug"
               class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">Category</label>

        <select name="category_id"
                class="form-control">

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">Short Description</label>

        <textarea name="short_description"
                  class="form-control"
                  rows="3"></textarea>

    </div>

    <div class="mb-3">

        <label class="form-label fs-5 fw-bold">
            Content Editor
        </label>

        <div class="border rounded-4 p-3 bg-light shadow-sm">

            <div class="mb-3 d-flex flex-wrap gap-2">

                <button type="button"
                        class="btn btn-dark"
                        onclick="format('bold')"
                        title="Bold">

                    <i class="bi bi-type-bold"></i>

                </button>

                <button type="button"
                        class="btn btn-dark"
                        onclick="format('italic')"
                        title="Italic">

                    <i class="bi bi-type-italic"></i>

                </button>

                <button type="button"
                        class="btn btn-dark"
                        onclick="format('underline')"
                        title="Underline">

                    <i class="bi bi-type-underline"></i>

                </button>

                <button type="button"
                        class="btn btn-primary"
                        onclick="format('insertUnorderedList')"
                        title="Bullet List">

                    <i class="bi bi-list-ul"></i>

                </button>

                <button type="button"
                        class="btn btn-primary"
                        onclick="format('insertOrderedList')"
                        title="Number List">

                    <i class="bi bi-list-ol"></i>

                </button>

                <button type="button"
                        class="btn btn-success"
                        onclick="addHeading()"
                        title="Heading">

                    <i class="bi bi-type-h2"></i>

                </button>

                <button type="button"
                        class="btn btn-warning"
                        onclick="addLink()"
                        title="Insert Link">

                    <i class="bi bi-link-45deg"></i>

                </button>

                <button type="button"
                        class="btn btn-info"
                        onclick="insertImage()"
                        title="Insert Image">

                    <i class="bi bi-image"></i>

                </button>

                <button type="button"
                        class="btn btn-secondary"
                        onclick="format('justifyLeft')"
                        title="Align Left">

                    <i class="bi bi-text-left"></i>

                </button>

                <button type="button"
                        class="btn btn-secondary"
                        onclick="format('justifyCenter')"
                        title="Align Center">

                    <i class="bi bi-text-center"></i>

                </button>

                <button type="button"
                        class="btn btn-secondary"
                        onclick="format('justifyRight')"
                        title="Align Right">

                    <i class="bi bi-text-right"></i>

                </button>

            </div>

            <div id="editor"
                 contenteditable="true"
                 class="form-control bg-white border-0"
                 style="
                    min-height: 350px;
                    overflow:auto;
                    font-size:16px;
                    padding:20px;
                    border-radius:15px;
                 ">
            </div>

        </div>

        <textarea name="content"
          id="hiddenContent"
          style="display:none;"></textarea>

    </div>

    <div class="mb-3">

        <label class="form-label">Image</label>

        <input type="file"
               name="image"
               class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">Published Date</label>

        <input type="date"
               name="published_at"
               class="form-control">

    </div>

    <button class="btn btn-success px-4">
        Publish Blog
    </button>

</form>

@endsection

@push('scripts')

<script>

function format(command) {
    document.execCommand(command, false, null);
}

function addHeading() {
    document.execCommand('formatBlock', false, 'h2');
}

function addLink() {

    let url = prompt('Enter URL');

    if(url) {
        document.execCommand('createLink', false, url);
    }
}

function insertImage() {

    let url = prompt('Enter Image URL');

    if(url) {
        document.execCommand('insertImage', false, url);
    }
}

document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('form');

    form.addEventListener('submit', function () {

        document.getElementById('hiddenContent').value =
            document.getElementById('editor').innerHTML;

    });

});

</script>

@endpush