@extends('layouts.app')

@section('content')

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Client Edit Data</h1>
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
            <span class="active">Client Edit Stuff</span>
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
                        <span class="caption-subject font-red sbold uppercase">Edit Client</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- Back button -->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('clients.update', $item->id) }}" method="POST" id="form_sample_2" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> Your form validation is successful!
                            </div>
                            <div class="form-group @error('generate_date') has-error @enderror"">
                                <label class="control-label col-md-3">Generate Date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                        <input type="text" name="generate_date" value="{{ optional($item->generate_date)->format('d-m-Y') }}" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    @error('generate_date')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('client_name') has-error @enderror">
                                <label class="control-label col-md-3">Client Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="client_name" value="{{ $item->client_name }}" class="form-control" required />
                                    @error('client_name')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('email') has-error @enderror">
                                <label class="control-label col-md-3">Email
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="email" name="email" value="{{ $item->email }}" class="form-control" required />
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
                                    <input type="number" name="mobile" value="{{ $item->mobile }}" class="form-control" required maxlength="10" />
                                    @error('mobile')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Remarks&nbsp;&nbsp;</label>
                                <div class="col-md-4">
                                    <textarea name="remarks" class="form-control">{{ $item->remarks }}</textarea>
                                </div>
                            </div>
                            <div class="form-group @error('budget') has-error @enderror">
                                <label class="control-label col-md-3">Budget
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="budget" value="{{ $item->budget }}" class="form-control" />
                                    @error('budget')
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
                                        <option value="Cold Calling" {{ $item->status=='Cold Calling' ? 'selected' : '' }}>Cold Calling</option>
                                        <option value="Semi" {{ $item->status=='Semi' ? 'selected' : '' }}>Semi</option>
                                        <option value="Potential" {{ $item->status=='Potential' ? 'selected' : '' }}>Potential</option>
                                        <option value="High Potential" {{ $item->status=='High Potential' ? 'selected' : '' }}>High Potential</option>
                                        <option value="Junk" {{ $item->status=='Junk' ? 'selected' : '' }}>Junk</option>
                                        <option value="Lost" {{ $item->status=='Lost' ? 'selected' : '' }}>Lost</option>
                                        <option value="Booked" {{ $item->status=='Booked' ? 'selected' : '' }}>Booked</option>
                                    </select>
                                    @error('status')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('designer_name') has-error @enderror">
                                <label class="control-label col-md-3">Designer's Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="designer_name" value="{{ $item->designer_name }}" class="form-control" />
                                    @error('designer_name')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Address&nbsp;&nbsp;</label>
                                <div class="col-md-4">
                                    <textarea name="address" class="form-control">{{ $item->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group @error('next_follow_up_date') has-error @enderror"">
                                <label class="control-label col-md-3">Next follow up date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                        <input type="text" name="next_follow_up_date" value="{{ optional($item->next_follow_up_date)->format('d-m-Y') }}" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    @error('next_follow_up_date')
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