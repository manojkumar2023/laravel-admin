@extends('layouts.app')

@section('content')

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Agent Create Data</h1>
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
            <span class="active">Agent Stuff</span>
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
                        <span class="caption-subject font-red sbold uppercase">Add Agent</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- Back button -->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.agent.store') }}" method="POST" id="form_sample_2" class="form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> Your form validation is successful!
                            </div>
                            <div class="form-group @error('first_name') has-error @enderror">
                                <label class="control-label col-md-3">First Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required />
                                    @error('first_name')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('last_name') has-error @enderror">
                                <label class="control-label col-md-3">Last Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" />
                                    @error('last_name')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('email') has-error @enderror">
                                <label class="control-label col-md-3">Email
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required />
                                    @error('email')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('mobile') has-error @enderror">
                                <label class="control-label col-md-3">Mobile Number
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" required maxlength="10" />
                                    @error('mobile')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Address&nbsp;&nbsp;</label>
                                <div class="col-md-4">
                                    <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group @error('status') has-error @enderror">
                                <label class="control-label col-md-3">Status
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select name="status" class="form-control" required>
                                        <option value="">Select...</option>
                                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
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