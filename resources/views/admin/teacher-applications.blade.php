@extends('layouts.panel')

@section('nav-teacher-applications', 'active')
@section('title','Teacher Applications')

@section('css-js')
<style>
    #DataTable td a{
    text-decoration: none;
    }
</style>
@endsection


@section('content')

<div class="container-fluid"> <!--Container-Fluid Start-->



<!--user Table Start-->
<table id="DataTable" class="table table-striped table-bordered table-fluid">
    <thead class="bg-primary text-white">
    <tr>
        <th>#</th>
        <th>Application ID</th>
        <th>Full Name</th>
        <th>Email ID</th>
        <th>Mobile Number</th>
        <th>Applied On</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach ($applications as $application)
<tr>
    <td>{{$application->id}}</td>
    <td>{{$application->application_id}}</td>
    <td>{{$application->name}}</td>
    <td>{{$application->email}}</td>
    <td>{{$application->mobile}}</td>
    <td>{{$application->created_at}}</td>
    <td style="font-weight: bold; color:  @if ($application->status == 'Under Review') #fcc203; @elseif($application->status == 'Rejected') red; @elseif($application->status == 'Approved') green; @endif ">
        {{$application->status}}
    </td>
    <td>
        <a href="/admin/teacher-applications/id/{{$application->application_id}}">Manage <i class="fa fa-cog" style="color: #106eea" aria-hidden="true"></i></a>
    </td>
</tr>
@endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Application ID</th>
        <th>Full Name</th>
        <th>Email ID</th>
        <th>Mobile Number</th>
        <th>Applied On</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </tfoot>
</table>
<!--user Table End-->



</div> <!--Container-Fluid End-->
@endsection


@section('bottom-js')
<script>
    $(document).ready(function() {
        $('#DataTable').DataTable();
    } );
</script>
@endsection