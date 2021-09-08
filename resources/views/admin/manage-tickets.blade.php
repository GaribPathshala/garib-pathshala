@extends('layouts.panel')

@section('nav-tickets', 'active')
@section('title','Manage Ticket')

@section('css-js')
<style>
    .ticket-table{
        margin-bottom: 25px;
    }
    .ticket-table td{
        min-width: 200px;
        font-size: 20px;
    }
</style>
@endsection


@section('content')

<div class="container-fluid"> <!--Container-Fluid Start-->
  
  <!-- Modal -->
  <div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Approval Confirmation</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure approving this application?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="/admin/ticket/id/{{$ticket->ticket_id}}/approve" class="btn btn-success">Yes, Approve</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal End -->

  <!-- Modal -->
  <div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Rejection Confirmation</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure rejecting this application?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="/admin/ticket/id/{{$ticket->ticket_id}}/reject" class="btn btn-danger">Yes, Reject</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal End -->

<div class="container">

  <h3 style="color: black;"></h3>
    
  <div class="row">
    <div class="col-md-8">
      <h3  title="Port Forwarding Related" class="entry-title" style="color: black;">
        <i  class="fas fa-ticket-alt"></i> Manage Ticket <strong>#{{$ticket->ticket_id}}</strong>
      </h3>
    </div>

@if ($ticket->status != 'Resolved')
<div class="col-md-4">
  <a style="float: right;" class="btn btn-success" href="/admin/tickets/id/{{$ticket->ticket_id}}/change-status/resolved">Resolved <i class="fa fa-check" aria-hidden="true"></i></a>
</div>
@endif    
    
</div>
  



  <div   class="row">
    <div  class="col-md-6" style="min-height: 100px;">
      <table  class="table">
        <tbody >
          <tr >
          <td >
            <b >Status :</b>
          </td> 

        <td  style=" color:  @if ($ticket->status == 'Open') #4e73df; @elseif($ticket->status == 'Hold') #fcc203; @elseif($ticket->status == 'Resolved') green; @endif "> {{$ticket->status}} </td>
        </tr> 
        
        <tr >
          <td >
            <b >Email ID :</b>
          </td> 
        
        <td > {{$ticket->email}} </td>
      </tr> 
      <tr >
        <td >
          <b >Created Date :</b>
        </td> 
        <td  title="Created Date">{{$ticket->created_at}}</td>
      </tr>
    </tbody>
  </table> 
  
  <div  class="clearfix"></div>
</div> 
<div  class="col-md-6" style="min-height: 100px;">
  <table  class="table">
    <tbody >
      <tr >
        <td >
          <b >Name :</b>
        </td> 

        <td  title="Service related Query"> {{$ticket->name}} </td>
      </tr> 
      <tr >
        <td >
          <b >Mobile No. :</b>
        </td> <td > {{$ticket->mobile}}</td>    
      </tr> 

      <tr >
        <td >
          <b >Last response :</b>
        </td> <td > {{$ticket->updated_at}}</td>
      </tr>
    </tbody>
  </table> 
</div> 
</div>


<form action="{{route('AdminTicketReply')}}" method="post">
  @csrf
  <textarea id="summernote-{{$ticket->ticket_id}}" name="message" style="width: 100%; height: 200px;"></textarea>
  <button type="submit" class="btn btn-success float-right">Add Reply</button>
</form>



<div class="ticket-message">

</div>






</div>




</div> <!--Container-Fluid End-->
@endsection


@section('bottom-js')

<script>
  $(document).ready(function() {
  $('#summernote-{{$ticket->ticket_id}}').summernote({
      minHeight: 220,             // set minimum height of editor
      maxHeight: 500,             // set maximum height of editor
      focus: true     
    });
  });
</script>

@endsection