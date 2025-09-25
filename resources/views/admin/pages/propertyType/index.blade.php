@extends('layouts.app')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Property Type</h1>
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
            <span class="active">Property Type List</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Property Type List</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('admin.property-types.create') }}" class="btn sbold green"> Add New Property Type

                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" width="100%" id="sample_1">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Property Type Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $items as $key=>$data )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$data->property_type_name}}</td>
                                <td>{{$data->slug}}</td>
                                <td>
                                    <span class="label label-sm label-success"> {{ $data->status == 707 ? 'Active' : 'Inactive' }} </span>
                                </td>
                                <td>
                                        <a href="{{ route('admin.property-types.edit', $data->id) }}" class="btn btn-outline btn-circle green btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                        <a href="javascript:void(0)" class="btn btn-outline btn-circle dark btn-sm black delete-data open-delete-modal" data-action="{{ route('admin.property-types.destroy', $data->id) }}" data-name="{{ $data->property_type_name }}">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <div id="deleteClientModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <form id="deleteClientForm" method="POST" action="">
            @csrf
            @method('DELETE')

            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="deleteClientName"></strong>?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, delete</button>
            </div>
        </form>
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
@endsection
@push('scripts')
<script>
    $(function () {
        $('.delete-data').on('click', function (e) {
            e.preventDefault();
            var action = $(this).data('action');
            var name = $(this).data('name') || 'this client';

            // set the form action to the fully rendered destroy route for the selected client
            $('#deleteClientForm').attr('action', action);
            $('#deleteClientName').text(name);
            $('#deleteClientModal').modal('show');
        });
    });
</script>
@endpush