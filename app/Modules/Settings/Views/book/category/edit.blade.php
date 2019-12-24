@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('PATCH', route('settings.book.category.update',$category->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Book Category <small class="text-muted"> Edit Category</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Name')->class('col-md-2 form-control-label required')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name',$category->name)
                                ->class('form-control')
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Select status')->class('col-md-2 form-control-label required')->for('name_bn') }}

                        <div class="col-md-10">
                            <select name="status" class="span6 typeahead form-control">
                                <option>Select one</option>
                                <option value="1" <?php echo ($category['status'] == 1)?'selected="true"':''; ?>>Active</option>
                                <option value="0" <?php echo ($category['status'] == 0)?'selected="true"':''; ?>>Inactive</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('settings.book.category.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
