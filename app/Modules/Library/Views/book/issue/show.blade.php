@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title mb-0 float-left">Library Management <small class="text-muted">Issue Book Details</small></h4>
                    <a href="{{ route('library.book.issue.index') }}" class="btn btn-primary btn-sm float-right" style="font-family: sans-serif;">Back</a>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm table-stripped">
                            <thead>
                            <tr>
                                <td colspan="8">
                                    <strong>Issue Date : </strong>{{ Carbon\Carbon::parse($bookIssue->issue_date)->format('F d, Y') }} /
                                    <strong>Return Status : </strong> @if($bookIssue->is_returned) <label class="badge badge-success">Returned</label> @else <label class="badge badge-danger">Not Returned</label> @endif /
                                    <strong>Date to Return : </strong> {{ $bookIssue->date_for_return }} /
                                    <strong>Return Date : </strong> {{ ($bookIssue->returned_date != NULL) ? Carbon\Carbon::parse($bookIssue->returned_date)->format('F d, Y') : 'N/A' }} /
                                    <strong>Recipient : </strong> <a target="_blank" href="{{ url('/member/'.$bookIssue->member_id) }}" class="btn-link">{{ $bookIssue->member_name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Book Price</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Quantity</th>
                                <th>Return Status</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($bookIssueDetails as $book)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $book->book_name }}</td>
                                    <td>{{ $book->book_price }}</td>
                                    <td>{{ $book->book_category }}</td>
                                    <td>{{ $book->book_publisher }}</td>
                                    <td>{{ $book->book_quantity }}</td>
                                    <td>
                                        @if($book->return_status)
                                            <label class="badge badge-success">Returned</label>
                                        @else
                                            <label class="badge badge-danger">Not Returned</label>
                                        @endif
                                    </td>
                                    <td>{{ !empty($book->remarks)?$book->remarks:'-' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div>
    </div><!--card-->
@endsection
