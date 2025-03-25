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
                            <button type="submit" id="selectImage" class="btn btn-primary">Select Image</button>
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