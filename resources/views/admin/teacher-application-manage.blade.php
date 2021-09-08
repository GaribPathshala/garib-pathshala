@extends('layouts.panel')

@section('nav-teacher-applications', 'active')
@section('title','Manage Teacher Application')

@section('css-js')
<style>
    .application-table{
        margin-bottom: 25px;
    }
    .application-table td{
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
          <a href="/admin/teacher-applications/id/{{$application->application_id}}/approve" class="btn btn-success">Yes, Approve</a>
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
          <a href="/admin/teacher-applications/id/{{$application->application_id}}/reject" class="btn btn-danger">Yes, Reject</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal End -->

<div class="container">
    <table class="application-table">
        <tr>
            <td>
                Application ID:
            </td>
            <td>
                <b>{{$application->application_id}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Full Name:
            </td>
            <td>
                <b>{{$application->name}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Email ID:
            </td>
            <td>
                <b>{{$application->email}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Mobile Number:
            </td>
            <td>
                <b>{{$application->mobile}}</b>
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <b>{{$application->city}}</b>
            </td>
        </tr>
        <tr>
            <td>
                District:
            </td>
            <td>
                <b>{{$application->district}}</b>
            </td>
        </tr>
        <tr>
            <td>
                State:
            </td>
            <td>
                <b>{{$application->state}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Postal Code:
            </td>
            <td>
                <b>{{$application->postal_code}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Qualification:
            </td>
            <td>
                <b>{{$application->qualification}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Experience:
            </td>
            <td>
                <b>{{$application->experience}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <b>{{$application->status}}</b>
            </td>
        </tr>
        <tr>
            <td>
                Applied On:
            </td>
            <td>
                <b>{{$application->created_at}}</b>
            </td>
        </tr>
    </table>
    
@if ($application->status == 'Under Review')
    <a style="min-width: 200px;" class="btn btn-success" data-toggle="modal" data-target="#ApproveModal">Approve <i class="fa fa-check" aria-hidden="true"></i></a>
    <a style="min-width: 200px;" href="" class="btn btn-danger" data-toggle="modal" data-target="#RejectModal">Reject <i class="fa fa-times" aria-hidden="true"></i></a>
@endif
    <a style="min-width: 200px;" href="/admin/teacher-applications/id/{{$application->application_id}}/pdf" class="btn btn-info">PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

<ul style="margin-top: 30px;">
    <li>We store all logs of your actions.</li>
    <li>After taking any action the applicant will be automatically notified via email.</li>
    <li>You can't take any action on the applications that are already Rejected or Approved.</li>
    <li>While rejecting do considering mentioning a valid reason and if you don't provide reason, the applicant will get the reason as "Not mentioned".</li>
</ul>

</div>




</div> <!--Container-Fluid End-->
@endsection


@section('bottom-js')



@endsection