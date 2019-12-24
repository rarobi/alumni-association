@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title mb-0">
                        Library Management <small class="text-muted">Member Distributed Books</small>
                    </h4>
                </div><!--col-->
            </div>
            <hr/>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm table-stripped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Member Name</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Expected Return Date</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Author</th>
                                <th>Quantity</th>
                                <th>Return Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($distributedBooks as $book)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $book->member_name }}</td>
                                <td>{{ $book->book_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($book->issue_date)->format('F d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($book->expected_return_date)->format('F d, Y') }}</td>
                                <td>{{ $book->category_name }}</td>
                                <td>{{ $book->publisher_name }}</td>
                                <td>{{ $book->writer_name }}</td>
                                <td>{{ $book->book_quantity }}</td>
                                <td>
                                    @if($book->return_status)
                                    <label class="badge badge-success">Returned</label>
                                    @else
                                    <label class="badge badge-danger">Not Returned</label>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        {{ $distributedBooks->links() }}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
