@extends('layouts.panel')

@section('title', 'Create User')
@section('nav-user-management', 'active')

@section('css-js')







@endsection

@section('content')
<div class="container-fluid"> <!--Container Fluid Start-->





<h3 class="text-dark">Edit User</h3>
<h5 class="text-dark text-center"><i style="color: rgb(255, 196, 0)" class="fa fa-circle"></i> You're currently editing <img width="40px" height="40px" style="border-radius: 50%;" src="{{asset("storage/images/dp/$user->dp")}}"> <strong>{{$user->name}}</strong></h5>

<div class="container form-container p-5" style="background-color: rgb(225, 227, 240); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<div class="row mt-3 mb-3">
    <div class="col-6 text-center">
        Date Created <strong>{{$user->created_at ?? '--'}}</strong>
    </div>

    <div class="col-6 text-center">
        Last Updated <strong>{{$user->updated_at}}</strong>
    </div>
</div>

<form method="POST" action='{{ url("admin/user-management/$user->email/edit/submit")}}' id="user-create-form">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$user->id}}">
<div class="form-row">
    <div class="form-group col-md-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Full Name</div>
            </div>
            <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" value="{{ old('name') ?? $user->name}}" placeholder="Full Name">
        </div>    
    </div>    

    <div class="form-group col-md-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Gender</div>
            </div>
                    <select id="inputState" class="form-control" name="gender">
                        @if ($user->gender == 'female')
                            <option selected value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                        @elseif($user->gender == 'male')
                            <option selected value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        @elseif($user->gender == 'other')
                            <option selected value="other">Other</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        @endif
                        
                    </select>
        </div>    
    </div>    

    <div class="form-group col-md-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Designation</div>
            </div>
            <input type="text" class="form-control @error('designation') {{ 'is-invalid' }} @enderror" name="designation" value="{{ old('designation') ?? $user->designation }}" placeholder="Designation">
        </div>   
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Email ID</div>
            </div>
            <input type="text" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" value="{{ old('email') ?? $user->email }}" placeholder="Email ID">
        </div>    
    </div>    

    <div class="form-group col-md-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Mobile Number</div>
            </div>
            <input type="text" class="form-control @error('mobile') {{ 'is-invalid' }} @enderror" name="mobile" value="{{ old('mobile') ?? $user->mobile }}" placeholder="Mobile Number">
        </div>   
    </div>
</div>

<h5>Permissions</h5>

@foreach ($permissions as $permission)
<div class="form-check">
    <input class="form-check-input" style="cursor: pointer;" type="checkbox" id="{{ $permission->name }}" name="NewPermissions[]" value="{{ $permission->name }}"   
    @foreach ($userPermissions as $userPermission)
    @if ($userPermission->name == $permission->name)
        checked
    @endif
@endforeach>
    <label class="form-check-label" style="cursor: pointer;" for="{{ $permission->name }}">
        {{ $permission->name }}
    </label>
</div>
@endforeach





<div class="container-fluid text-right">
    <a href="/admin/remove-user/{{$user->email}}" class="btn btn-danger">Delete User</a>
    <button type="submit" class="btn btn-success">Save Changes</button>
</div>

</form>
</div>



</div> <!--Container Fluid End-->



@endsection

@section('bottom-js')

@endsection
