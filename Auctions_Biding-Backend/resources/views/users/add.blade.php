@extends('layouts.layout');
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Form Elements</li>
                </ol>
            </div>
            <h4 class="page-title">Form Elements</h4>
        </div>
    </div>
</div>

<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h4 class="header-title">Input Types</h4>
                <p class="text-muted mb-0">
                    Most common form control, text-based input fields. Includes support for all
                    HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>,
                    <code>datetime-local</code>, <code>date</code>, <code>month</code>,
                    <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>,
                    <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
            </div>
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-lg-12"> --}}
                        <form action="{{ route('admin.users.addUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">UserName</label>
                                        <input type="text" id="simpleinput" name="username"
                                            value="{{ old('username') }}" class="form-control">
                                        @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="email" class="form-control"
                                            placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Re-enter Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="rePassword" class="form-control"
                                                placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>

                                        </div>
                                        @error('rePassword')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-sm-6">
                                            <label class="form-label">Avatar</label>
                                            <input class="form-control" type="file" name="avatar">
                                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="example-select">
                                            <option value="0">Active</option>
                                            <option value="1">Lock</option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Address</label>
                                        <input type="text" id="simpleinput" name="address" class="form-control"
                                            value="{{ old('address') }}">
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 d-grid ">
                                        <button type="submit" class="btn btn-lg btn-success">Add new user</button>
                                    </div>
                                </div>
                            </div>




                        </form>
                        {{--
                    </div> <!-- end col --> --}}


                    {{--
                </div> --}}
                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection
@push('scripts')
<script src="{{ asset('assets/vendor/dropzone/min/dropzone.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/onefileupload.init.js') }}"></script>
@endpush