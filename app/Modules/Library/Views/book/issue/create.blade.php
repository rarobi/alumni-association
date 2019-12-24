@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
@section('content')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">Library Management <small class="text-muted">Issue Book</small></h4>
                    </div><!--col-->
                </div><!--row-->
                <hr>
                {{ html()->form('POST',route('library.book.add.cart'))->id('bookForm')->open() }}
                <div class="form-group">
                    <div class="input-group">
                        {!! html()->text('add_book')
                        ->class('form-control add_book')
                        ->placeholder('Enter Book Name / Double click')
                        ->attribute('maxlength', 191)
                        ->required()
                        ->autofocus()!!}
                        <span class="input-group-btn">
                                <button type="button" id="showBookList" class="btn btn-info" style="border-radius: 0"><i class="fa fa-search-plus" aria-hidden="true"></i> </button>
                        </span>
                        <input type="hidden" id="bookId" name="bookId" value=""/>
                    </div>
                    <ul class="append hidden" id="bookList"></ul>
                </div>
                {{ html()->form()->close() }}


                <div class="form-group">
                    <label>Select Books:</label>
                    <div class="table-responsive" id="purchaseOrderTable">
                        <table class="table table-bordered table-striped order-book-table">
                            <thead class="alert alert-info">
                            <tr>
                                <th>#</th>
                                <th>Book (Name-Code)</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Writer</th>
                                <th width="12%">Qty</th>
                                <th width="20%">Remarks</th>
                                <th width="10%"><i class="fa fa-trash" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $i = 0;
                            if (Session::get('borrow.books')) {
                                $reverse_books = array_reverse(Session::get('borrow.books'));
                            }
                            ?>
                            @if(Session::get('borrow.books'))

                                @foreach($reverse_books as $book)

                                    {{--requisition/general/cartItemEditDelete--}}
                                    {{ html()->form('POST',route('library.book.cart.editDelete'))->open() }}
                                    <tr>
                                        <input type="hidden" name="book_id" value="{{$book['id']}}">
                                        <input type="hidden" name="book_name" value="{{$book['name']}}">
                                        <input type="hidden" name="book_code" value="{{$book['code']}}">

                                        <td>{{++$i}}</td>
                                        <td style="text-align: left">{{ $book['name'] . " " . "(".$book['code'].")"  }}</td>
                                        <td style="text-align: left">{{ $book['category_name'] }}</td>
                                        <td style="text-align: left">{{ $book['publisher_name'] }}</td>
                                        <td style="text-align: left">{{ $book['writer_name'] }}</td>
                                        <td>
                                            <div class="input-group">
                                                <input class="form-control input-sm quantity text-right" type="number" maxlength="5" name="quantity" value="{{$book['quantity']}}" />
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <textarea class="form-control" rows="1" name="remarks">{{$book['remarks']}}</textarea>
                                            </div>
                                        </td>
                                        <td class="span2" style="text-align: center">
                                            <button title="Add" type="submit" class="hidden edit btn btn-primary btn-sm" name="edit_delete" value="edit"><i class="fa fa-plus-circle"></i></button>
                                            <button title="Remove" type="submit" class="btn btn-danger btn-sm" name="edit_delete" onclick="return confirm('Are you sure to remove book?');"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    {{ html()->form()->close() }}
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="text-align:center; color:#f10505;"><strong>There are no books in the cart</strong><td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ html()->form('POST',route('library.book.issue.store'))->open() }}
                <div class="form-group row">
                    {{ html()->label('Member')->class('col-md-2 form-control-label required') }}

                    <div class="col-md-10">
                        {{ html()->select('member_id', $members)
                            ->class('form-control')
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label('Return Date')->class('col-md-2 form-control-label required') }}

                    <div class="col-md-10">
                        {{ html()->text('return_date')
                            ->class('form-control return_date')
                            ->placeholder('YYYY-MM-DD')
                            ->attribute('maxlength', 191)
                            ->required()
                            ->attribute('autocomplete','off')
                            ->autofocus() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div>
                {{ html()->form()->close() }}
            </div><!--card-body-->
        </div><!--card-->
@endsection


@section('footer-script')
    <script type="text/javascript">
        $(".add_book").autocomplete({
            source: function (request, response) {
                $.ajax({
                    dataType: "json",
                    type: 'POST',
                    url: '{{url('library/book/auto-suggest')}}',
                    data: request,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        console.log(data);


                        response($.map(data, function (value) {
                            return {
                                label: value.name + "-(" + value.code + ")",
                                value: value.name + "-(" + value.code + ")",
                                hitem: value.id
                            };
                        }));
                    },
                    error: function (data) {
                        console.log("error");
                        //$('add_book').removeClass('ui-autocomplete-loading');
                    }
                });
            },
            autoFocus:true,
            matchContains: true,
            open: function () {
            },
            close: function () {
            },
            mouseover:function(){
                alert(10);
            },
            focus: function (event, ui) {
                $("#bookId").val(ui.item.hitem);
            },
            keydown:function(){

            },
            select: function (event, ui) {
                $("#bookId").val(ui.item.hitem);
                $("#bookForm").submit();
            },
            change:function(){
                //alert(10);
            }
        }).bind('dblclick', function () { $(this).autocomplete("search", "all"); });
        $('#showBookList').focus(function(event) {
//            event.preventDefault();
            $(".add_book").autocomplete('search' , 'all');
            $(".add_book").focus();
        });

        $('.return_date').datepicker({
            dateFormat:'yy-mm-dd',
            minDate:'+1d',
        });

    </script>
@endsection
