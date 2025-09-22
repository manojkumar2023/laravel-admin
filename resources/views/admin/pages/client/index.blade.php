@extends('layouts.app')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Client Management</h1>
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
            <span class="active">Client List</span>
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
                        <span class="caption-subject bold uppercase">Client List</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('admin.clients.create') }}" class="btn sbold green"> Add New Client
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
                                <th>Date</th>
                                <th>Client name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Designer</th>
                                <th>Budget</th>
                                <th>Status</th>
                                <th>Next Followup Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $items as $key=>$data )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{ optional($data->generate_date)->format('d M Y') }}</td>
                                    <td>{{$data->client_name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->mobile}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->designer_name}}</td>
                                <td>{{$data->budget}}</td>
                                <td>
                                    <span class="label label-sm label-success"> {{$data->status}} </span>
                                </td>
                                <td>{{ optional($data->next_follow_up_date)->format('d M Y') }}</td>
                                <td>
                                        <a href="{{ route('admin.clients.edit', $data->id) }}" class="btn btn-outline btn-circle green btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                        <a href="javascript:void(0)" class="btn btn-outline btn-circle dark btn-sm black delete-data open-delete-modal" data-action="{{ route('admin.clients.destroy', $data->id) }}" data-name="{{ $data->client_name }}">
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