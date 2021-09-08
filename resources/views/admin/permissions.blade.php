@extends('layouts.panel')

@section('nav-manage-permissions', 'active')
@section('title','Permissions')


@section('css-js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
@endsection

    

@section('content')

<div class="container-fluid"> <!--Container-Fluid Start-->

    <h3 class="text-dark">Permissions</h3>


<!--user Table Start-->
<table id="userTable" class="table table-striped table-bordered table-fluid">
    <thead class="bg-primary text-white">
    <tr>
        <th>Permission Name</th>
        <th>Date Created</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permissions)
        <tr>
        <td>{{$permissions->name}}</td>
            <td>{{$permissions->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Permission</th>
        <th>Date Created</th>
    </tr>
    </tfoot>
</table>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    } );
</script>
<!--user Table End-->








</div>
        
@endsection
