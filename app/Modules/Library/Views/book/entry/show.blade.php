@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title mb-0">
                        Library Management
                        <small class="text-muted">Book Details</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <td>{{ $book->name }}</td>
                            </tr>

                            <tr>
                                <th>Category</th>
                                <td>{{ $book->category_name }}</td>
                            </tr>

                            <tr>
                                <th>Writer</th>
                                <td>{{ $book->writer_name }}</td>
                            </tr>

                            <tr>
                                <th>Code</th>
                                <td>{{ $book->code }}</td>
                            </tr>

                            <tr>
                                <th>Summery</th>
                                <td>{{ $book->summary }}</td>
                            </tr>

                            <tr>
                                <th>Quantity</th>
                                <td>{{ $book->stock_quantity }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($book->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Cover Photo</th>
                                <td>
                                    <img src="{{ url('/uploads/books/'.$book->photo) }}" height="150" width="130" style="border-radius: 10px;" alt="">
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
                    <a href="{{ route('library.book.entry.index') }}" class="btn btn-sm btn-danger float-left">Close</a>
                </div>
            </div>
        </div><!--card-body-->
    </div>
@endsection
