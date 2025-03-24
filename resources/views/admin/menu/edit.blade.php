@push('styles')
<style>
    /* Style for the nestable list */
    .dd-list {
        list-style: none;
        padding-left: 0;
    }

    /* Ensure list items are aligned properly */
    .dd-item {
        position: relative;
        display: flex;
        align-items: center;
        border: none;
        background: transparent;
        margin: 5px 0;
        border-radius: 5px;
        flex-wrap: wrap;
        /* Ensures child list goes to a new line */
    }

    /* Expand/Collapse buttons should be inline */
    .dd-item>button[data-action] {
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 5px;
        margin-right: 8px;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Icons inside the buttons */
    .dd-item button[data-action] i {
        color: #333;
        font-size: 14px;
    }

    /* Styling for the drag handle */
    .dd-handle {
        flex-grow: 1;

        background: #e9ecef;
        padding: 5px 10px;

        border-radius: 3px;
        cursor: grab;
    }



    /* Ensure the nested list starts on a new line */
    .dd-item>.dd-list {
        margin-left: 60px;
        /* Indent child list */
        width: 100%;
        /* Forces new line */
    }

    /* Hide the plus button initially for expanded items */
    .dd-item>button[data-action="expand"] {
        display: none;
    }

    /* Show/hide buttons dynamically */
    .dd-item.collapsed>button[data-action="expand"] {
        display: inline-block;
    }

    .dd-item.collapsed>button[data-action="collapse"] {
        display: none;
    }
</style>




@endpush

@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Menu</h2>

    <div class="row">
        <!-- Left Sidebar: Pages, Categories, Custom Links -->
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">Add Menu Items</div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="menuTabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#pages">Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#custom-link">Custom Link</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3">
                        <!-- Pages Tab -->
                        <div class="tab-pane fade show active" id="pages">
                            <form id="addPageMenuForm">
                                <ul class="list-group">
                                    @foreach($pages as $page)
                                    <li class="list-group-item">
                                        <input type="checkbox" class="page-checkbox" data-title="{{ $page->title }}" data-url="{{ url($page->slug) }}">
                                        {{ $page->title }}
                                    </li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn btn-primary mt-2 add-selected">Add to Menu</button>
                            </form>
                        </div>

                        <!-- Custom Link Tab -->
                        <div class="tab-pane fade" id="custom-link">
                            <form id="addCustomLinkForm">
                                <div class="mb-2">
                                    <label>URL:</label>
                                    <input type="text" class="form-control" id="customUrl">
                                </div>
                                <div class="mb-2">
                                    <label>Link Text:</label>
                                    <input type="text" class="form-control" id="customTitle">
                                </div>
                                <button type="button" class="btn btn-primary add-custom-link">Add to Menu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar: Drag & Drop Menu -->
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">Menu Structure</div>
                <div class="card-body">
                    <div class="dd" id="menu-list">
                        <ol class="dd-list outer">
                        </ol>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                    <button id="saveMenu" class="btn btn-success">Save Menu</button>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<!-- Include SortableJS for Drag & Drop -->
<!-- Nestable.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>




<script>
    $(document).ready(function() {
        let menuCounter = 6; // Keeps track of new item IDs

        // Function to update data-id based on hierarchy level

        function updateDataIds() {
            console.log("Updating data IDs...");

            function assignIds($list) {
                let idCounter = 1; // Reset counter for each list level

                $list.children('.dd-item').each(function() {
                    $(this).attr('data-id', idCounter); // Assign sequential ID for this level
                    idCounter++; // Increment for next sibling at the same level

                    let $subList = $(this).children('.dd-list');
                    if ($subList.length) {
                        assignIds($subList); // Recursively process submenus
                    }
                });
            }

            assignIds($('#menu-list > .dd-list'));
        }

        // Function to add a new menu item
        function addMenuItem(title, parentID = null) {
            console.log("Mittali");
            let newItem = `
                <li class="dd-item" data-id="${menuCounter}">
                    <div class="dd-handle">${title}</div>
                </li>`;

            if (parentID) {
                let parentItem = $(`#menu-list .dd-item[data-id="${parentID}"]`);
                if (parentItem.find("ol.dd-list").length === 0) {
                    parentItem.append('<ol class="dd-list"></ol>'); // Create sublist if not exists
                }
                parentItem.children("ol.dd-list").append(newItem);
            } else {
                $("#menu-list > .dd-list").append(newItem);
            }

            menuCounter++; // Increment ID for next item
            $('#menu-list').nestable('serialize'); // Refresh Nestable
            updateDataIds(); // Reassign IDs
            customizeNestableButtons();
        }

        // Add selected pages to the menu
        $(".add-selected").click(function() {
            $(".page-checkbox:checked").each(function() {
                let title = $(this).data("title");
                //let id = Date.now(); // Unique ID
                addMenuItem(title);
                $(this).prop("checked", false);
            });
        });

        // Initialize Nestable
        $('#menu-list').nestable({
            maxDepth: 3
        }).on('change', function() {
            console.log("updateData");
            updateDataIds();
            console.log("here");
            console.log($('#menu-list').nestable('serialize')); // Debugging
            customizeNestableButtons();
        });

        // Add new menu item on button click
        $("#addMenuItem").click(function() {
            let title = $("#menuTitle").val();
            if (title.trim()) {
                addMenuItem(title);
                $("#menuTitle").val(""); // Clear input
            }
        });

        // Save menu structure (for backend)
        // Save menu structure to the database
        $("#saveMenu").click(function() {
            let menuData = [];

            // Loop through each menu item inside the nestable list
            $("#menu-list .dd-item").each(function() {
                let menuItem = {
                    id: $(this).data("id"), // Assuming each item has a unique data-id
                    title: $(this).find(".dd-handle").text().trim(), // Extract the title text
                    parent_id: $(this).parent().closest(".dd-item").data("id") || null, // Get parent ID if available
                    order: $(this).index(), // Order based on current position
                    menu_id: 1 ,// Static menu ID (change as needed)
                    type: $(this).data("type") || "custom", // Ensure type is present, default to "custom"
                    item_id: $(this).data("item-id") || null, // Optional related item ID
                    url: $(this).data("url") || null // Optional URL
                };
                menuData.push(menuItem);
            });

            let csrfToken = $("#csrf_token").val(); // Get CSRF token

            if (menuData.length === 0) {
                alert("Menu is empty. Please add items before saving.");
                return;
            }

            $.ajax({
                url: "{{ route('menu.store') }}", // Laravel named route
                type: "POST",
                data: {
                    menuData: JSON.stringify(menuData),
                    _token: csrfToken // CSRF token added here
                },
                success: function(response) {
                    alert("Menu saved successfully!");
                },
                error: function(xhr) {
                    alert("Error saving menu: " + xhr.responseText);
                }
            });
        });

        // Initial data-id update
        updateDataIds();

        // **Function to Replace Collapse/Expand Text with Icons**
        function customizeNestableButtons() {
            console.log("expandssssssss");
            $("button[data-action='collapse'], button[data-action='expand']").each(function() {
                console.log("expand");
                let action = $(this).attr("data-action");
                if (action === "collapse") {
                    $(this).html('<i class="fa fa-minus"></i>'); // "-" button
                } else if (action === "expand") {
                    $(this).html('<i class="fa fa-plus"></i>'); // "+" button
                }
            });
        }

        // Initial customization after Nestable is ready
        setTimeout(() => {
            customizeNestableButtons();
        }, 500);
    });
</script>


@endpush