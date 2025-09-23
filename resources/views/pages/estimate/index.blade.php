@extends('layouts.app')

@section('content')
<div class="page-content">
    <!-- HEADER -->
    <!-- <div class="row margin-bottom-30">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body" style="display:flex;align-items:center;gap:20px;">
                    <div style="flex:0 0 160px;">
                        <img src="https://rangdebasanti.com/newsample1/wp-content/uploads/2025/04/logo-white.jpg" alt="Bhavana Interiors Logo" style="max-width:140px;" />
                    </div>
                    <div style="flex:1;">
                        <h2 class="font-dark" style="margin:0 0 6px 0;">BHAVANA INTERIORS & DECORATORS</h2>
                        <div class="text-muted">No.96/5, 1st Floor, Dhruv Palace, Navya Nagar, Jakkur, Bangalore - 560064</div>
                        <div class="text-muted" style="margin-top:6px;">Website: www.bhavanainteriordecorators.com | Email ID: info@bhavanainteriordecorators.com | Phone: 9902571049</div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- ESTIMATE FORM CARD -->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form action="{{ route('clients.store') }}" method="POST" id="form_sample_2" class="horizontal-form">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group @error('bi_executive') has-error @enderror">
                                        <label class="control-label">BI Executive
                                            <span class="required"> * </span>
                                        </label>
                                        <!-- <div class="col-md-4"> -->
                                            <input type="text" name="bi_executive" value="{{ old('bi_executive') }}" class="form-control" required />
                                            @error('bi_executive')
                                                <span class="help-block"> {{ $message }} </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @error('client_name') has-error @enderror">
                                        <label class="control-label">Client Name
                                            <!-- <span class="required"> * </span> -->
                                        </label>
                                        <!-- <div class="col-md-4"> -->
                                            <input type="text" name="client_name" value="{{ old('client_name') }}" class="form-control" required />
                                            @error('client_name')
                                                <span class="help-block"> {{ $message }} </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @error('property_type') has-error @enderror">
                                        <label class="control-label">Property Type
                                            <span class="required"> * </span>
                                        </label>
                                        <!-- <div class="col-md-4"> -->
                                            <select name="property_type" class="form-control" required>
                                                <option value="">Select Property Type</option>
                                                <option value="Apartment" {{ old('property_type')=='Apartment' ? 'selected' : '' }}>Apartment</option>
                                                <option value="Independent House" {{ old('property_type')=='Independent House' ? 'selected' : '' }}>Independent House</option>
                                                <option value="Office" {{ old('property_type')=='Office' ? 'selected' : '' }}>Office</option>
                                            </select>
                                            @error('property_type')
                                                <span class="help-block"> {{ $message }} </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group @error('estimate_date') has-error @enderror"">
                                        <label class="control-label">Estimate Date
                                            <span class="required"> * </span>
                                        </label>
                                        <!-- <div class="col-md-6"> -->
                                            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                <input type="text" name="estimate_date" value="{{ old('estimate_date') }}" class="form-control" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            @error('estimate_date')
                                                <span class="help-block"> {{ $message }} </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @error('expiry_date') has-error @enderror"">
                                        <label class="control-label">Estimate Expiry Date
                                            <span class="required"> * </span>
                                        </label>
                                        <!-- <div class="col-md-6"> -->
                                            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                <input type="text" name="expiry_date" value="{{ old('expiry_date') }}" class="form-control" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            @error('expiry_date')
                                                <span class="help-block"> {{ $message }} </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BLUE GREETING CARD -->
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="background:#e9f6fb;border-radius:6px;padding:24px;border:1px solid #dbeff5;">
                <div style="font-size:14px;color:#333;line-height:1.6;">
                    <p><strong>Greetings from Bhavana Interiors & Decorators,</strong></p>
                    <p>Thank you for considering Bhavana Interiors & Decorators for your project! We specialize in customized interior solutions using premium, ISI-grade materials and in-house production for unmatched quality. Our expert team delivers tailored designs—from modular kitchens to wardrobes & more—ensuring durability, aesthetics, and precision.</p>
                    <p>Below is a detailed estimate reflecting your requirements. Every product is crafted under strict quality control, offering seamless finishes and timeless elegance.</p>
                    <p>Let's bring your vision to life with perfection. For any modifications or queries, feel free to reach out.</p>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection