@extends('layouts.panel')

@section('nav-tickets', 'active')
@section('title','Tickets')

@section('css-js')
<style>
    #DataTable a{
        text-decoration: none;
    }
</style>
@endsection


@section('content')

<div class="container-fluid"> <!--Container-Fluid Start-->



<!--ticket Table Start-->
<table id="DataTable" class="table table-striped table-bordered table-fluid">
    <thead class="bg-primary text-white">
    <tr>
        <th>#</th>
        <th>Ticket ID</th>
        <th>Full Name</th>
        <th>Email ID</th>
        <th>Mobile Number</th>
        <th>Raised On</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach ($tickets as $ticket)
<tr>
    <td>{{$ticket->id}}</td>
    <td>{{$ticket->ticket_id}}</td>
    <td>{{$ticket->name}}</td>
    <td>{{$ticket->email}}</td>
    <td>{{$ticket->mobile}}</td>
    <td>{{$ticket->created_at}}</td>
    <td style="font-weight: bold; color:  @if ($ticket->status == 'Open') #4e73df; @elseif($ticket->status == 'Hold') #fcc203; @elseif($ticket->status == 'Resolved') green; @endif ">
        {{$ticket->status}}
    </td>
    <td>
        <a href="/admin/tickets/id/{{$ticket->ticket_id}}">Manage <i class="fa fa-cog" style="color: #106eea" aria-hidden="true"></i></a>
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
<!--ticket Table End-->



</div> <!--Container-Fluid End-->
@endsection


@section('bottom-js')
<script>
    $(document).ready(function() {
        $('#DataTable').DataTable();
    } );
</script>
@endsection