@extends('admin.layouts.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h4 class="mb-3">Edit Category</h4>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="control-label">Image</label>
                        <input type="hidden" id="image" name="image" class="form-control"
                            value="{{ $category->image }}">

                        <div class="d-flex align-items-center border p-2 rounded">
                            <div class="me-3" id="image-container" style="cursor: pointer;">
                                <img id="img-featureimage"
                                    src="{{ $category->image }}"
                                    title="Choose logo"
                                    class="img-thumbnail"
                                    style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <div>

                                <button type="button" id="btn-remove-featureimage"
                                    class="btn btn-danger"
                                    @if(!$category->image) style="display: none;" @endif>
                                    <i class="ri-close-fill"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>


@push('modal')
<div class="modal fade" id="modal-select-media" tabindex="-1" aria-labelledby="modal-select-mediaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-select-mediaLabel">Select Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="mediaTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="temp-images-tab" data-bs-toggle="tab" data-bs-target="#temp-images" type="button" role="tab">Temporary Images</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="upload-image-tab" data-bs-toggle="tab" data-bs-target="#upload-image" type="button" role="tab">Upload Image</button>
                    </li>
                </ul>

                <!-- Tab Contents -->
                <div class="tab-content" id="mediaTabContent">
                    <!-- Temporary Images Tab -->
                    <div class="tab-pane fade show active p-3" id="temp-images" role="tabpanel">
                        <form id="form-add-media" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" name="query" id="search_media" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                            </div>
                            <div class="row media-list-result p-2 text-center media-scroll mb-1">
                                <!-- Dynamically load your temp images -->
                            </div>
                            <div class="text-center">
                                <button type="button" id="load-more" class="btn btn-primary">Load More</button>
                            </div>
                            <button type="button" id="selectImage" class="btn btn-primary">Select Image</button>
                        </form>
                    </div>

                    <!-- Upload Image Tab -->
                    <div class="tab-pane fade p-3" id="upload-image" role="tabpanel">
                        <div class="mb-3">
                            <div class="dropzone dz-clickable" id="mediaDropzone">
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>
                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3" id="media-item-list">
                            <!-- Uploaded media items will be listed here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const imageContainer = document.getElementById('image-container');
    const imageInput = document.getElementById('image');
    const imgFeature = document.getElementById('img-featureimage');
    const btnRemove = document.getElementById('btn-remove-featureimage');
    const selectImageButton = document.getElementById('selectImage');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let selectedImagePath = ''; // Store the selected image path

    // Open modal on image click
    imageContainer.addEventListener('click', function () {
        openMediaModal('featureimage', 'radio');
    });

    // Function to load media items via AJAX
    function loadMediaList(start, limit, columnName, selectableType) {
        const searchQuery = ''; 

        fetch('{{ route("media.load") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                start: start,
                limit: limit,
                query: searchQuery,
                column_name: columnName,
                selectable_type: selectableType,
            }),
        })
        .then((response) => response.json())
        .then((data) => {
            const mediaListContainer = document.querySelector('.media-list-result');
            mediaListContainer.innerHTML = data.html;
        })
        .catch((error) => console.error('Error loading media:', error));
    }

    // Function to open modal and load media items
    function openMediaModal(columnName, selectableType) {
        const modalElement = document.getElementById('modal-select-media');

        if (modalElement) {
            const modal = new bootstrap.Modal(modalElement);
            loadMediaList(0, 10, columnName, selectableType);
            modal.show();
        } else {
            console.error("Modal element not found.");
        }
    }

    // Handle media selection
    document.addEventListener('click', function (e) {
        const mediaItem = e.target.closest('.media-item');

        if (mediaItem) {
            selectedImagePath = mediaItem.getAttribute('data-image-path');

            if (selectedImagePath) {
                imgFeature.src = selectedImagePath;
                imageInput.value = selectedImagePath;
                btnRemove.style.display = 'inline-block';
            }
        }
    });

    // Handle select image button click
    selectImageButton.addEventListener('click', function () {
        if (selectedImagePath) {
            console.log('Selected Image:', selectedImagePath);

            // Close the modal after selecting the image
            const modal = bootstrap.Modal.getInstance(document.getElementById('modal-select-media'));
            modal.hide();
        } else {
            alert('Please select an image first.');
        }
    });

    // Remove the image
    btnRemove.addEventListener('click', function () {
        imgFeature.src = 'https://ecommerce.infovistar.com/gpc-ci4/assets/images/placeholder.jpg';
        imageInput.value = '';
        btnRemove.style.display = 'none';
        selectedImagePath = ''; // Reset the selected image path
    });
});
</script>
@endpush