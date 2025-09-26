@extends('layouts.app')

@section('content')

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Finishes Create</h1>
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
            <span class="active">Finishes Stuff</span>
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
                        <span class="caption-subject font-red sbold uppercase">Add Finishes</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- Back button -->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.finishes.store') }}" method="POST" id="form_sample_2" class="form-horizontal">
                        @csrf
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
                                    <select id="property_type_id" name="property_type_id" class="form-control" required>
                                        <option value="">Select Property Type</option>
                                        @foreach($propertyTypes as $type)
                                            <option value="{{ $type->id }}" {{ old('property_type_id') == $type->id ? 'selected' : '' }}>{{ $type->property_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_type_id')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('property_area_id') has-error @enderror">
                                <label class="control-label col-md-3">Property Area
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select id="property_area_id" name="property_area_id" class="form-control" required>
                                        <option value="">Select Property Area</option>
                                        @foreach($propertyAreas as $area)
                                            <option value="{{ $area->id }}" {{ old('property_area_id') == $area->id ? 'selected' : '' }}>{{ $area->property_area_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_area_id')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('property_module_id') has-error @enderror">
                                <label class="control-label col-md-3">Property Module
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select id="property_module_id" name="property_module_id" class="form-control" required>
                                        <option value="">Select Property Module</option>
                                        @foreach($propertyModules as $module)
                                            <option value="{{ $module->id }}" {{ old('property_module_id') == $module->id ? 'selected' : '' }}>{{ $module->property_module_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_module_id')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('material_id') has-error @enderror">
                                <label class="control-label col-md-3">Material
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select id="material_id" name="material_id" class="form-control" required>
                                        <option value="">Select Material</option>
                                        @foreach($materials as $material)
                                            <option value="{{ $material->id }}" {{ old('material_id') == $material->id ? 'selected' : '' }}>{{ $material->material_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('material_id')
                                        <span class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('finish_name') has-error @enderror">
                                <label class="control-label col-md-3">Finish Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="finish_name" value="{{ old('finish_name') }}" class="form-control" required />
                                    @error('finish_name')
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
                                        <option value="707" {{ old('status')=='707' ? 'selected' : '' }}>Active</option>
                                        <option value="505" {{ old('status')=='505' ? 'selected' : '' }}>Inactive</option>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.getElementById('property_type_id');
    const areaSelect = document.getElementById('property_area_id');
    const moduleSelect = document.getElementById('property_module_id');
    const materialSelect = document.getElementById('material_id');

    if (!typeSelect || !areaSelect || !moduleSelect || !materialSelect) return;

    typeSelect.addEventListener('change', function () {
        const typeId = this.value;
        // remember previous selections
        const prevArea = areaSelect.value;
        const prevModule = moduleSelect.value;
        const prevMaterial = materialSelect.value;

        // Clear existing options
        areaSelect.innerHTML = '<option value="">Select Property Area</option>';
        moduleSelect.innerHTML = '<option value="">Select Property Module</option>';
        materialSelect.innerHTML = '<option value="">Select Material</option>';

        if (!typeId) return;

        const url = `{{ url('/admin/property-areas/by-type') }}/${typeId}`;

        console.debug('Fetching property areas for type:', url);
        fetch(url, { headers: { 'Accept': 'application/json' }, credentials: 'same-origin' })
            .then(resp => { if (!resp.ok) throw new Error('HTTP ' + resp.status); return resp.json(); })
            .then(data => {
                console.debug('Property areas response for type', typeId, data);
                data.forEach(area => {
                    const opt = document.createElement('option');
                    opt.value = area.id;
                    opt.textContent = area.property_area_name;
                    areaSelect.appendChild(opt);
                });
                // If previous area still exists in new list, re-select it and trigger change
                setTimeout(() => {
                    const areaOpts = Array.from(areaSelect.options).filter(o => o.value);
                    const foundPrev = areaOpts.find(o => o.value === prevArea);
                    if (foundPrev) {
                        foundPrev.selected = true;
                        areaSelect.dispatchEvent(new Event('change'));
                    } else if (areaOpts.length === 1) {
                        // auto-select single area
                        areaOpts[0].selected = true;
                        areaSelect.dispatchEvent(new Event('change'));
                    }
                }, 0);
            })
            .catch(err => console.error('Failed to load property areas', err));
    });

    // When area changes, load modules for that area
    areaSelect.addEventListener('change', function () {
        const areaId = this.value;
        moduleSelect.innerHTML = '<option value="">Select Property Module</option>';
        if (!areaId) return;
        const url = `{{ url('/admin/property-modules/by-area') }}/${areaId}`;
        fetch(url, { headers: { 'Accept': 'application/json' }, credentials: 'same-origin' })
            .then(resp => { if (!resp.ok) throw new Error('HTTP ' + resp.status); return resp.json(); })
            .then(data => {
                data.forEach(mod => {
                    const opt = document.createElement('option');
                    opt.value = mod.id;
                    opt.textContent = mod.property_module_name;
                    moduleSelect.appendChild(opt);
                });
                // If only one module is available, auto-select it to satisfy required attribute
                setTimeout(() => {
                    const opts = Array.from(moduleSelect.options).filter(o => o.value);
                    if (opts.length === 1) {
                        opts[0].selected = true;
                        // trigger change so materials for this module are loaded
                        moduleSelect.dispatchEvent(new Event('change'));
                    }
                }, 0);
            })
            .catch(err => console.error('Failed to load property modules', err));
    });

    // Load materials when module changes
    moduleSelect.addEventListener('change', function () {
        const moduleId = this.value;
        const materialSelect = document.getElementById('material_id');
        materialSelect.innerHTML = '<option value="">Select Material</option>';
        if (!moduleId) return;
        const url = `{{ url('/admin/materials/by-module') }}/${moduleId}`;
        fetch(url, { headers: { 'Accept': 'application/json' }, credentials: 'same-origin' })
            .then(resp => {
                if (!resp.ok) throw new Error('HTTP ' + resp.status);
                return resp.json();
            })
            .then(data => {
                data.forEach(mat => {
                    const opt = document.createElement('option');
                    opt.value = mat.id;
                    opt.textContent = mat.material_name;
                    materialSelect.appendChild(opt);
                });
                // If only one material is available, auto-select it to satisfy required attribute
                setTimeout(() => {
                    const opts = Array.from(materialSelect.options).filter(o => o.value);
                    if (opts.length === 1) {
                        opts[0].selected = true;
                    }
                }, 0);
            })
            .catch(err => console.error('Failed to load materials', err));
    });

    // Prevent accidental blocked submit: ensure required selects have values
    const form = document.getElementById('form_sample_2');
    if (form) {
        form.addEventListener('submit', function (e) {
            const requiredSelects = ['property_type_id', 'property_area_id', 'property_module_id', 'material_id'];
            for (const name of requiredSelects) {
                const el = document.getElementById(name);
                if (!el) continue;
                if (!el.value) {
                    e.preventDefault();
                    el.focus();
                    alert('Please select ' + el.previousElementSibling.textContent.trim());
                    return false;
                }
            }
            return true;
        });
    }
});
</script>
@endpush