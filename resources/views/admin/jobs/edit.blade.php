@extends('admin.layouts.master')


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
                        <h4 class="card-title">Edit Job</h4>
                        <p class="card-title-desc">Update job details below</p>

                        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="jobtitle">Job Title</label>
                                        <input id="jobtitle" name="jobtitle" type="text" class="form-control" value="{{ $job->jobtitle }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="salary">Salary</label>
                                        <input id="salary" name="salary" type="text" class="form-control" value="{{ $job->salary }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="location">Location</label>
                                        <input id="location" name="location" type="text" class="form-control" value="{{ $job->location }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="qualification">Qualification</label>
                                        <input id="qualification" name="qualification" type="text" class="form-control" value="{{ $job->qualification }}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="control-label">Category</label>
                                        <select class="form-control select2" name="category">
                                            <option>Select</option>
                                            <option value="Backend Developer" {{ $job->category == 'Backend Developer' ? 'selected' : '' }}>Backend Developer</option>
                                            <option value="Frontend Developer" {{ $job->category == 'Frontend Developer' ? 'selected' : '' }}>Frontend Developer</option>
                                            <option value="Full Stack Developer" {{ $job->category == 'Full Stack Developer' ? 'selected' : '' }}>Full Stack Developer</option>
                                            <option value="Game Developer" {{ $job->category == 'Game Developer' ? 'selected' : '' }}>Game Developer</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label">Responsibilities</label>
                                        <select class="select2 form-control select2-multiple" name="responsibilities[]" multiple>
                                            @php
                                            $responsibilities = is_array($job->responsibilities) ? $job->responsibilities : explode(',', $job->responsibilities);
                                            @endphp
                                            <option value="Develop and implement project plans" {{ in_array('Develop and implement project plans', $responsibilities) ? 'selected' : '' }}>Develop and implement project plans</option>
                                            <option value="Collaborate with cross-functional teams" {{ in_array('Collaborate with cross-functional teams', $responsibilities) ? 'selected' : '' }}>Collaborate with cross-functional teams</option>
                                            <option value="Monitor and analyze performance metrics" {{ in_array('Monitor and analyze performance metrics', $responsibilities) ? 'selected' : '' }}>Monitor and analyze performance metrics</option>
                                            <option value="Ensure compliance with industry standards" {{ in_array('Ensure compliance with industry standards', $responsibilities) ? 'selected' : '' }}>Ensure compliance with industry standards</option>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="jobdesc">Job Description</label>
                                        <textarea class="form-control" id="jobdesc" rows="5" name="jobdesc">{{ $job->jobdesc }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <h4 class="card-title">Company Information</h4>
                            <p class="card-title-desc">Update company details below</p>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="companyname">Company Name</label>
                                        <input id="companyname" name="companyname" type="text" class="form-control" value="{{ $job->companyname }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_location">Company Location</label>
                                        <input id="company_location" name="company_location" type="text" class="form-control" value="{{ $job->company_location }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="website">Company Website</label>
                                        <input id="website" name="website" type="text" class="form-control" value="{{ $job->website }}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="companydescription">Company Description</label>
                                        <textarea class="form-control" id="companydescription" rows="5" name="companydescription">{{ $job->companydescription }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Job</button>
                                <a href="{{ route('jobs.index') }}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
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