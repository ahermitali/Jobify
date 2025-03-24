@extends('admin.layouts.master')


@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Category</h4>
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
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="productname">Category Name</label>
                                        <input id="productname" name="name" type="text" class="form-control" placeholder="Product Name" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="control-label">Status</label>
                                        <select class="form-control select2" name="status">
                                            <option>Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="control-label">Image</label>
                                        <input type="hidden" id="image" name="image" class="form-control">

                                        <div class="img-div text-center btn-featureimage" data-column="featureimage">
                                            <span class="text-blue cursor-pointer img-logo" style="display: none;">Choose logo</span>
                                            <span id="btn-select-featureimage" data-column="featureimage">
                                                <img id="img-featureimage"
                                                    src="https://ecommerce.infovistar.com/gpc-ci4/assets/images/placeholder.jpg"
                                                    title="Choose logo"
                                                    class="img-fluid">
                                            </span>
                                            <button type="button"
                                                id="btn-remove-featureimage"
                                                data-column="featureimage"
                                                class="btn btn-sm btn-default pull-right"
                                                title="Clear">
                                                <i class="ri-close-fill fs-16"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>


































                                <div class="row mb-4">
                                    <label class="col-md-3 col-form-label" for="featureimage-input">
                                        Feature Image <br><small>(300x300)</small>
                                    </label>
                                    <div class="col-md-8">
                                        <!-- Feature Image Input -->
                                        <input type="hidden" id="featureimage" name="feature_image">

                                        <div class="img-div text-center btn-featureimage" data-column="featureimage">
                                            <span class="text-blue cursor-pointer img-logo" style="display: none;">Choose logo</span>
                                            <span id="btn-select-featureimage" data-column="featureimage">
                                                <img id="img-featureimage"
                                                    src="https://ecommerce.infovistar.com/gpc-ci4/assets/images/placeholder.jpg"
                                                    title="Choose logo"
                                                    class="img-fluid">
                                            </span>
                                            <button type="button"
                                                id="btn-remove-featureimage"
                                                data-column="featureimage"
                                                class="btn btn-sm btn-default pull-right"
                                                title="Clear">
                                                <i class="ri-close-fill fs-16"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Feature Image -->
                                <div class="row mb-4">
                                    <label class="col-md-3 col-form-label" for="featureimage-input">
                                        Feature Image <br><small>(300x300)</small>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="hidden" id="featureimage" name="feature_image">

                                        <div class="img-div text-center btn-featureimage p-3 border rounded" data-column="featureimage">
                                            <span class="text-blue cursor-pointer img-logo" style="display: none;">Choose logo</span>

                                            <!-- Image preview -->
                                            <span id="btn-select-featureimage" data-column="featureimage">
                                                <img id="img-featureimage"
                                                    src="https://ecommerce.infovistar.com/gpc-ci4/assets/images/placeholder.jpg"
                                                    title="Choose logo"
                                                    class="logo-display mx-auto img-fluid"
                                                    style="max-width: 100%; max-height: 150px;">
                                            </span>

                                            <!-- Remove button -->
                                            <button type="button"
                                                id="btn-remove-featureimage"
                                                data-column="featureimage"
                                                class="btn btn-sm btn-danger position-absolute"
                                                style="top: 10px; right: 10px;"
                                                title="Clear">
                                                <i class="ri-close-fill fs-16"></i> Remove
                                            </button>
                                        </div>

                                        <!-- File input -->
                                        <input type="file" id="featureimage-input" class="form-control mt-2" accept="image/*">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="showtoast">Save</button>
                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Function to load media items via AJAX
        function loadMediaList(start, limit, columnName, selectableType) {
            console.log("media loaded");
            const searchQuery = document.getElementById('search_media').value;

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
            loadMediaList(0, 10, columnName, selectableType);
            const modalElement = document.getElementById('modal-select-media');
            const modal = new bootstrap.Modal(modalElement); // Bootstrap 5 Modal API
            console.log("html");
            modal.show();
        }

        // Open modal for feature image (radio buttons)
        document.getElementById('btn-select-featureimage').addEventListener('click', function() {
            openMediaModal('featureimage', 'radio');
        });

        // Open modal for gallery images (checkboxes)
        document.getElementById('btn-select-galleryimage').addEventListener('click', function() {
            openMediaModal('galleryimage', 'checkbox');
        });

        // Handle media selection

        let selectedImagePath = null; // Variable to store the selected feature image path
        let selectedImages = []; // Array to store selected gallery images

        // Event listener for selecting an image (Radio button or Checkbox)
        document.querySelector('.media-list-result').addEventListener('click', function(e) {
            if (e.target.closest('input[type="radio"]')) {
                // Radio button logic: Only one feature image can be selected
                selectedImagePath = e.target.value; // Store the selected feature image path
                const columnName = e.target.dataset.column;
                console.log("Image selected (Radio): ", selectedImagePath); // Debugging

                // Ensure full URL is used for the feature image
                if (!selectedImagePath.startsWith('http://localhost/cse/public/storage/')) {
                    selectedImagePath = 'http://localhost/cse/public/storage/' + selectedImagePath;
                }

                // Clear any previously selected gallery images (not feature image)
                selectedImages = [];

                console.log("Feature Image Path: ", selectedImagePath); // Debugging

            } else if (e.target.closest('input[type="checkbox"]')) {
                // Checkbox logic: Multiple gallery images can be selected
                const checkbox = e.target;
                const imagePath = checkbox.value; // Get the image path from the checkbox value

                console.log(imagePath);
                let fullImagePath = imagePath;

                // Check if the image path is not a full URL
                if (!fullImagePath.startsWith('http://localhost/cse/public/storage/')) {
                    fullImagePath = 'http://localhost/cse/public/storage/' + imagePath;
                }

                // If checked, add the image to the selected images array
                if (checkbox.checked) {
                    if (!selectedImages.includes(fullImagePath)) {
                        selectedImages.push(fullImagePath);
                    }
                } else {
                    // If unchecked, remove the image from the selected images array
                    const index = selectedImages.indexOf(fullImagePath);
                    if (index > -1) {
                        selectedImages.splice(index, 1);
                    }
                }

                console.log("Selected Gallery Images (Checkbox): ", selectedImages); // Debugging
            }
        });

        // Event listener for the "Select Image" button (to select the radio button image or gallery images)
        document.getElementById('selectImage').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission

            const columnName = 'featureimage'; // This should match your form's field name or data-column

            // If a radio button image is selected, update the form fields for the radio button selection
            if (selectedImagePath) {
                document.getElementById(columnName).value = selectedImagePath;
                document.getElementById(`img-${columnName}`).src = selectedImagePath;
                document.getElementById(`img-${columnName}`).classList.remove('d-none');

                // Clear gallery image selection
                document.getElementById('galleryimage-input').value = ''; // Reset gallery image input
            }

            // If any gallery images are selected, update the gallery images input field
            if (selectedImages.length > 0) {
                // Save the selected gallery images as a comma-separated string
                document.getElementById('galleryimage-input').value = selectedImages.join(',');

                // Preview selected gallery images
                previewGalleryImages(selectedImages);
            }

            // Close the modal after selection
            const modal = bootstrap.Modal.getInstance(document.getElementById('modal-select-media'));
            modal.hide();
        });

        // Function to preview selected gallery images
        function previewGalleryImages(images) {
            const previewContainer = document.getElementById('previews');
            previewContainer.innerHTML = ''; // Clear any previous previews

            images.forEach(image => {
                const previewDiv = document.createElement('div');
                previewDiv.classList.add('col-md-3', 'mb-3');

                const imagePreview = document.createElement('img');
                imagePreview.src = image;
                imagePreview.alt = image;
                imagePreview.classList.add('img-thumbnail', 'w-100');

                previewDiv.appendChild(imagePreview);
                previewContainer.appendChild(previewDiv);
            });
        }

        // Function to remove a selected gallery image
        window.removeImage = function(btn) {
            const imageContainer = btn.closest('.col-sm-6');
            imageContainer.remove();
        };

        // Function to remove a selected gallery image
        window.removeImage = function(btn) {
            const imageContainer = btn.closest('.col-sm-6');
            imageContainer.remove();
        };
    });
</script>
@endpush