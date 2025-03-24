@extends('admin.layouts.master')

@push('styles') <!-- Plugins css -->
<link href="{{ asset('admin/assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endpush


@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mb-3">
                <h4 class="card-title mb-0">Manage media</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="dropzone dz-clickable" id="mediaIndexDropzone">
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card"> ̰
                <div class="card-body">
                    <div class="row" id="mediaIndexList">
                        @foreach($medias as $media)
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="{{ asset($media->url) }}" class="card-img-top" alt="Image of {{ $media->filename }}" style="width: 250px; height: 250px; object-fit: cover;">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>

@endsection

@push('scripts')
<script src="{{ asset('admin/assets/libs/dropzone/dropzone-min.js')}}"></script>

<!-- Form file upload init js -->
<script src="{{ asset('admin/assets/js/pages/form-file-upload.init.js')}}"></script>

<script>
    $(document).ready(function() {
        // Initialize Dropzone for the element with ID 'mediaIndexDropzone'
        var myDropzone = new Dropzone("#mediaIndexDropzone", {
            url: "{{ route('media') }}", // Your Laravel route for file upload
            maxFiles: 10, // Maximum number of files
            paramName: "image_url", // The name of the form data parameter to send the file as
            addRemoveLinks: true, // Allow users to remove files
            dictDefaultMessage: "Drop files here or click to upload.",
            // Optional: You can add other configurations, like file type restrictions
            acceptedFiles: "image/*", // Accept only image files (you can modify it)
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
            },
            // Additional form data can be sent with the file
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    // You can add additional form data here, like the name or other parameters
                    formData.append("name", "YourMediaName"); // Replace with actual name if needed
                });
                this.on("success", function(file, response) {
                    // Handle the response after the file is uploaded
                    console.log(response);
                });
                this.on("error", function(file, errorMessage) {
                    // Handle error
                    console.log(errorMessage);
                });
            }
        });
    });
</script>
@endpush