@extends('layouts.layout')
@section('content')
<h2>{{ $title }}</h2>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Fixed Header</h4>
                <p class="text-muted mb-0">
                    The FixedHeader will freeze in place the header and/or footer in a DataTable,
                    ensuring that title information will remain always visible.
                </p>
                <a href="{{ route('admin.users.addUsers') }}" type="button" class="btn btn-sm btn-primary">
                    Add new
                    user</a>

            </div>

            <div class="card-body">

                <table id="fixed-header-datatable"
                    class="table table-striped dt-responsive nowrap table-striped  w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_ad</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usersList as $item)
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control"
                                        placeholder="Enter your password" value="{{ $item->password }}">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                    class="img-fluid avatar-xs rounded">
                            </td>
                            {{-- <td>{{ $item->avatar }}</td> --}}
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>

                            <td>
                                <a type="button" class="btn btn-danger rounded-pill">Delete</a>
                                <a type="button" class="btn btn-warning rounded-pill">Edit</a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_ad</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
@endsection
@push('styles')
<x-data-tables-styles />
@endpush

@push('scripts')
<x-data-tables-scripts />
@endpush