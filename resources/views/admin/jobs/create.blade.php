@extends('admin.layouts.master')

@push('styles')
<!-- <style>
    #location {
        max-width: 100%;
    }

    #location option {
        max-height: 100px;
        overflow-y: auto;
    }
</style> -->
@endpush
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Job</h4>

                    <div class="page-title-right">

                    </div>

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

                        <h4 class="card-title">Basic Information</h4>
                        <p class="card-title-desc">Fill all information below</p>

                        <form action="{{ route('jobs.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="jobtitle">Job Title</label>
                                        <input id="jobtitle" name="jobtitle" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="salary">Salary</label>
                                        <input id="salary" name="salary" type="text" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="country">Select Country</label>
                                        <select id="country" name="country" class="select2 form-select">
                                            <option value="">Select a Country</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="location">Location</label>
                                        <select id="location" name="location" class="select2 form-select">
                                            <option value="">Select a Location</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="qualification_id" class="form-label">Qualification</label>
                                        <select name="qualification[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                            <option value="">Select Qualification</option>
                                            @foreach($qualifications as $qualification)
                                            <option value="{{ $qualification->name }}">{{ $qualification->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">
                                        <label class="control-label">Category</label>
                                        <select class="form-control select2" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label">Responsibilities</label>
                                        <select class="select2 form-control select2-multiple" name="responsibilities[]" multiple="multiple" data-placeholder="Choose ...">
                                            <option value="Develop and implement project plans">Develop and implement project plans</option>
                                            <option value="Collaborate with cross-functional teams">Collaborate with cross-functional teams</option>
                                            <option value="Monitor and analyze performance metrics">Monitor and analyze performance metrics</option>
                                            <option value="Ensure compliance with industry standards">Ensure compliance with industry standards</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobdesc">Job Description</label>
                                        <textarea name="jobdesc" type="text" class="form-control ckeditor-classic" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="card-title">Company Information</h4>
                            <p class="card-title-desc">Fill all information below</p>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="companyname">Company Name</label>
                                        <input id="companyname" name="companyname" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_location">Company Location</label>
                                        <select id="company_location" name="company_location" class="select2 form-control">
                                            <option value="">Select a City</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="website">Company Website</label>
                                        <input id="website" name="website" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="companydescription">Company Description</label>
                                        <textarea name="companydescription" type="text" class="form-control ckeditor-classic" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
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
    $(document).ready(function() {
        // Function to fetch countries from the API
        function fetchCountries() {
            $.ajax({
                url: "/jobify/public/api/get-countries", // Laravel route to get countries
                type: 'GET',
                success: function(response) {
                    $('#country').empty().append('<option value="">Select a Country</option>');

                    console.log(response);
                    if (response.length > 0) {
                        $.each(response, function(index, country) {
                            $('#country').append(`<option value="${country}">${country}</option>`);
                        });
                    } else {
                        $('#country').append('<option value="">No countries found</option>');
                    }
                },
                error: function() {
                    alert('Error fetching countries');
                }
            });
        }

        // Function to fetch and populate cities based on country
        function fetchCities(country) {
            if (country) {
                $.ajax({
                    url: "/jobify/public/api/get-cities/" + country,
                    type: 'GET',
                    success: function(response) {
                        $('#location, #company_location').empty().append('<option value="">Select a City</option>');

                        if (response.length > 0) {
                            $.each(response, function(index, city) {
                                $('#location, #company_location').append(`<option value="${city}">${city}</option>`);
                            });
                        } else {
                            $('#location, #company_location').append('<option value="">No cities found</option>');
                        }


                        $('#location, #company_location').select2();
                    },
                    error: function() {
                        alert('Error fetching cities');
                    }
                });
            } else {
                $('#location, #company_location').empty().append('<option value="">Select a City</option>');
            }
        }



        // Fetch countries on page load
        fetchCountries();

        // On country change, fetch cities
        $('#country').change(function() {
            let country = $(this).val();
            fetchCities(country);
        });

        // Fetch cities for the initially selected country (if any)
        let initialCountry = $('#country').val();
        if (initialCountry) {
            fetchCities(initialCountry);
        }

        // Initialize Select2 for cities dropdowns
        $('#location, #company_location, #country').select2({
            placeholder: "Select a City",
            width: '100%',
            dropdownAutoWidth: true
        });
    });
</script>
@endpush