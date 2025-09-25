@extends('layouts.app')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Client Estimate</h1>
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
            <span class="active">Client Estimate List</span>
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
                        <span class="caption-subject bold uppercase">Client Estimate List</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('clients.create') }}" class="btn sbold green"> Add New Estimate
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
                                <th>BI Executive</th>
                                <th>Client name</th>
                                <th>Estimate Date</th>
                                <th>Estimate Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $items as $key=>$data )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$data->bi_executive}}</td>
                                <td>{{$data->client_name}}</td>
                                <td>{{ optional($data->estimate_date)->format('d M Y') }}</td>
                                <td>{{ optional($data->expiry_date)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('estimate.show', $data->id) }}" class="btn btn-outline btn-circle green btn-sm purple">
                                        <i class="fa fa-eye"></i> View
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
    <!-- END PAGE BASE CONTENT -->
</div>
@endsection