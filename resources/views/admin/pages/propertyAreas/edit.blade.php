@extends('layouts.app')

@section('content')

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Property Area Edit Data</h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Property Area Edit Stuff</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Edit Property Area</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- Back button -->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.property-areas.update', $item->id) }}" method="POST" id="form_sample_2" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> Your form validation is successful!
                            </div>
                            <div class="form-group @error('property_type_id') has-error @enderror">
                                <label class="control-label col-md-3">Property Type
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select name="property_type_id" class="form-control" required>
                                        <option value="">Select Property Type</option>
                                        @foreach($propertyTypes as $type)
                                            <option value="{{ $type->id }}" {{ $item->property_type_id == $type->id ? 'selected' : '' }}>{{ $type->property_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_type_id')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('property_area_name') has-error @enderror">
                                <label class="control-label col-md-3">Property Area Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="property_area_name" value="{{ $item->property_area_name }}" class="form-control" required />
                                    @error('property_area_name')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('status') has-error @enderror">
                                <label class="control-label col-md-3">Status
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select name="status" class="form-control" required>
                                        <option value="">Select...</option>
                                        <option value="707" {{ $item->status==707 ? 'selected' : '' }}>Active</option>
                                        <option value="505" {{ $item->status==505 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>
@endsection