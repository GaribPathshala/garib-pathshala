@extends('layouts.panel')

@section('title', 'User Management')
@section('nav-user-management', 'active')

@section('css-js')
<style>
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:last-child {
        width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>




@endsection

@section('content')

<div class="container-fluid">

<!-- User Remove Confirmation Modal Start-->
<div class="modal fade" id="RemoveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/admin/remove-user" method="post" id="userRemove" hidden>
                @csrf
                <input type="text" name="remove_email" value="{{session('remove_email')}}">
            </form>
        <p>Are you sure removing this user <strong>{{session('remove_email')}}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="submit" form="userRemove" class="btn btn-danger">Confirm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- User Remove Confirmation Modal End--> 






    

    <!-- User Create Large modal -->
    <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Create New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form method="POST" action="{{ route('user-management')}}" id="user-create-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label>Designation</label>
                                <input type="text" class="form-control @error('designation') {{ 'is-invalid' }} @enderror"" name="designation" value="{{ old('designation') }}" placeholder="Designation">
                                @error('designation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Enter Email Address">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label>Mobile Number</label>
                                <input type="number" class="form-control @error('mobile') {{ 'is-invalid' }} @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="10 Digit Mobile Number">
                                @error('mobile')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group col-md-2">
                                <label>Gender</label>
                                <select class="form-control @error('gender') {{ 'is-invalid' }} @enderror" name="gender">
                                    <option value="" disabled selected>Select</option>
                                    <option value="F">Female</option>
                                    <option value="M">Male</option>
                                    <option value="O">Other</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="submit" form="user-create-form" class="btn btn-primary">Create User</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- User Create Large modal End -->


    <h3 class="text-dark">User Management</h3>

<!--Alerts Start-->
@if(Session::has('EditSuccess'))
<div class="alert alert-success" role="alert">
    User edited successfully with email <strong>{{ session('EditSuccess') }}</strong>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    User created successfully with email <strong>{{ session('success') }}</strong>
</div>
@endif

@if(Session::has('user_removed'))
<div class="alert alert-success" role="alert">
    User removed successfully with email <strong>{{ session('user_removed') }}</strong>
</div>
@endif

@if(Session::has('self_remove'))
<div class="alert alert-danger" role="alert">
    You cannot remove yourself. <strong>{{ session('self_remove') }}</strong>
</div>
@endif

@if(Session::has('admin_remove'))
<div class="alert alert-danger" role="alert">
    You cannot remove any user with Admin role. <strong>{{ session('admin_remove') }}</strong>
</div>
@endif

@if(Session::has('OwnEditFail'))
<div class="alert alert-danger" role="alert">
    You cannot edit yourself. <strong>{{ session('OwnEditFail') }}</strong>
</div>
@endif

@if(Session::has('AdminEditFail'))
<div class="alert alert-danger" role="alert">
    You cannot edit any user with Admin role. <strong>{{ session('AdminEditFail') }}</strong>
</div>
@endif
<!--Alerts End-->

            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target=".bd-example-modal-lg">Create New User</button>
                </div>
            </div>


<!--user Table Start-->
    <table id="userTable" class="table table-striped table-bordered table-fluid">
        <thead class="bg-primary text-white">
        <tr>
            <th>Name</th>
            <th>Email ID</th>
            <th>Date Created</th>
            <th>Designation</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($userList as $userList)
        <tr>
            <td><a href="#"><img width="25px" height="25px" style="border-radius: 50%" src="{{'/storage/images/dp/'.$userList->dp}}" class="avatar" alt="Avatar">{{$userList->name}}</a></td>
            <td>{{ $userList->email }}</td>
            <td>{{ $userList->created_at }}</td>
            <td>{{ $userList->designation }}</td>
            @if ($userList->status == 'active')<td><span class="status text-success">&bull;</span>Active</td>@elseif($userList->status == 'suspended')<td><span class="status text-success">&bull;</span>Suspended</td>@else<td><span class="status">&bull;</span>Error</td>@endif
            <td>
                <a href='{{url("/admin/user-management/$userList->email/edit")}}' class="setting" title="Edit" data-toggle="tooltip"><i class="fa fa-cog"></i></a>
                <a href="/admin/remove-user/{{$userList->email}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date Created</th>
            <th>Designation</th>
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
        $('#userTable').DataTable();
    } );
</script>

@if (session::has('remove_email'))
<script type="text/javascript">
    $('#RemoveModal').modal('show')
</script>
@endif

@if (count($errors) > 0)
<script type="text/javascript">
    $('#modal').modal('show')
</script>
@endif

@endsection