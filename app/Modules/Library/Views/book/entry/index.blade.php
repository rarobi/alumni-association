@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Library Management <small class="text-muted">Available Books</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @if($logged_in_user->isAdmin())
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('library.book.entry.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                    @endif
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Category</th>
                                <th>Writer</th>
                                <th>Stock Quantity</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->code }}</td>
                                    <td>{{ $book->category_name }}</td>
                                    <td>{{ $book->writer_name }}</td>
                                    <td>{{ $book->stock_quantity }}</td>
                                    <td>
                                        <a href="{{ route('library.book.entry.show',$book->id) }}" class="btn btn-sm btn-info" title="View"><i class="fa fa-list"></i></a>
                                        @if($logged_in_user->isAdmin())
                                        <a href="{{ route('library.book.entry.edit',$book->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                        <form  action="{{ route('library.book.entry.destroy',$book->id) }}" method="post">
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-sm btn-danger discard-team" title="Discard"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endif
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
