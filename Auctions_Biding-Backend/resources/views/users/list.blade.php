@extends('layouts.layout')
@section('content')
{{-- <h2>{{ $title }}</h2> --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Fixed Header</h4>
                    @if (session('success'))
                    <p class="alert alert-primary">
                        {{ session('success') }}
                    </p>
                    @endif

                    <a href="{{ route('admin.users.addUser') }}" type="button" class="btn btn-sm btn-primary">
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

                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($usersList as $item)
                            <tr>
                                {{-- {{ dd($item) }} --}}
                                <td>
                                    <i class="ri-arrow-down-circle-line"></i>
                                    {{ $item->username }}
                                </td>
                                <td>
                                    <a type="button" class="btn btn-danger rounded-pill">Change Password</a>
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <img src="{{ asset($destinationPath.$item->avatar) }}" alt=""
                                        class="img-fluid avatar-xs rounded">
                                </td>
                                {{-- <td>{{ $item->avatar }}</td> --}}
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->showStatus() }}</td>


                                <td>
                                    <a type="button" class="btn btn-danger rounded-pill"
                                        href="{{ route('admin.users.lock',$item->id) }}">
                                        @if ($item->status=='0')
                                        {{ 'Lock' }}
                                        @else

                                        {{ 'Active' }}
                                        @endif
                                    </a>
                                    <a type="button" class="btn btn-warning rounded-pill"
                                        href="{{ route('admin.users.editUser',$item->id) }}">Edit</a>
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

                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div>

@endsection
@push('styles')
<x-data-tables-styles />
@endpush

@push('scripts')
<x-data-tables-scripts />
@endpush