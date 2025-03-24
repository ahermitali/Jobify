<script src="{{ asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>


<script>$(document).ready(function() {
    $('.select2-multiple').select2();
});
</script>

<!-- Include CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".ckeditor-classic").forEach(textarea => {
            ClassicEditor.create(textarea)
                .then(editor => {
                    editor.ui.view.editable.element.style.minHeight = "150px"; // Adjust height
                })
                .catch(error => {
                    console.error("Error initializing CKEditor:", error);
                });
        });
    });
</script>


<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Select the alert
        let alertBox = document.querySelector(".alert-dismissible");
        if (alertBox) {
            // Set timeout to hide the alert after 3 seconds (3000ms)
            setTimeout(function() {
                alertBox.classList.remove("show");
                alertBox.classList.add("fade");
                alertBox.style.display = "none"; // Hide the alert
            }, 50000);
        }
    });
</script>