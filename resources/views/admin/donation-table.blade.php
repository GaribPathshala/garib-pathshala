@extends('layouts.panel')

@section('nav-donations', 'active')
@section('title','Donations')

@section('css-js')
<style>
    .setting{
        font-size: 20px;
        color: rgb(66, 66, 66);
    }
    .delete{
        font-size: 20px;
        color: rgb(0, 88, 170);
    }
    .Pending{
        color: rgb(255, 196, 0);
    }
    .TXN_PENDING{
        color: rgb(255, 196, 0);
    }
    .TXN_SUCCESS{
        color: rgb(0, 175, 73);
    }
    .TXN_FAILURE{
        color: rgb(236, 16, 16);
    }
    #DonationTable td a{
        text-decoration: none;
    }
</style>
@endsection


@section('content')

<div class="container-fluid"> <!--Container-Fluid Start-->

<!--Heading--> <div class="d-sm-flex justify-content-between align-items-center mb-4"><h3 class="text-dark mb-0">Donations</h3></div>


<!-- Donation Details Modal Start -->
@foreach ($donations as $donation)
<div class="modal fade {{$donation->donation_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
        <div class="modal-header">
            <h5 class="modal-title">Details for Donation ID <span class="badge badge-secondary">{{$donation->donation_id}}</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disabledTextInput">Donor Name</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->donor_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disabledTextInput">Amount</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->amount}}" disabled>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disabledTextInput">Email ID</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->email_id}}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disabledTextInput">Mobile Number</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->mobile_number}}" disabled>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disabledTextInput">Txn Date</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->txn_date}}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disabledTextInput">Status</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->txn_status}}" disabled>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="disabledTextInput">Bank Name</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->bank_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="disabledTextInput">Bank Txn ID</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->bank_txn_id}}" disabled>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="disabledTextInput">PG</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->pg}}" disabled>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group">
                            <label for="disabledTextInput">PG Txn ID</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="{{$donation->txn_id}}" disabled>
                        </div>
                    </div>
                </div>


            </form>
          </div>
          <div class="modal-footer">
              @if ($donation->txn_status == 'TXN_SUCCESS')
                <a href="{{ config('app.url', '') }}/donate/download/certificate/{{$donation->donation_id}}/{{$donation->download_key}}" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i> Certificate</a>
                <a href="{{ config('app.url', '') }}/donate/download/acknowledgement/{{$donation->donation_id}}/{{$donation->download_key}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Acknowledgement</a>
              @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>


    </div>
  </div>
</div>
@endforeach
<!-- Donation Details Modal End -->


<!-- Donation Details Modal Start -->
@foreach ($donations as $donation)
@if ($donation->txn_status == 'TXN_SUCCESS')
<div class="modal fade mail-{{$donation->donation_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
        <div class="modal-header">
            <h5 class="modal-title">Send Email For Donation <span class="badge badge-secondary">{{$donation->donation_id}}</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
        <form action="{{route('donations.send-mail')}}" method="post" id="send-mail-{{$donation->donation_id}}">
                @csrf
                <div><p>Hi <strong>{{$donation->donor_name}},</strong></p>
                    <p>This mail is regarding your donation <strong>{{$donation->donation_id}}</strong> on<br>Garib Pathshala Welfare Foundation</p>
                </div>
                <input type="hidden" name="donor_name" value="{{$donation->donor_name}}">
                <input type="hidden" name="donation_id" value="{{$donation->donation_id}}">
                <input type="hidden" name="email" value="{{$donation->email_id}}">
                <input type="hidden" name="mobile" value="{{$donation->mobile_number}}">
                <textarea id="summernote-{{$donation->donation_id}}" name="MailBody" style="width: 100%; height: 200px;"></textarea>

                <div><p><br><br><strong>Regards,</strong><br></p>
                    <p>
                    {{Auth()->User()->name}}<br>
                    Donations Manager<br>
                    Garib Pathshala Welfare Foundation<br>
                    121/5E/1F Satin Sen Sarani, Kolkata<br>
                    West Bengal, 700054, IN<br>
                    Telephone: <a href="tel:+918902984277">+91 8902 984 277</a> | <a href="mailto:contact@garibpathshala.in">contact@garibpathshala.in</a> 
                    </p>
                </div>
            </form>
        </div>

          <div class="modal-footer">
                <button class="btn btn-primary" type="submit" form="send-mail-{{$donation->donation_id}}"><i class="fa fa-share" aria-hidden="true"></i> Send Mail</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

    </div>
  </div>
</div>

@endif
@endforeach

<!-- Donation Details Modal End -->




<!--Buttons Row-->
<div class="row">

<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-left-primary py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Total Donations</span></div>
                    <div class="text-dark font-weight-bold h5 mb-0"><span>₹{{$total}}</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-left-success py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Earnings (annual)</span></div>
                    <div class="text-dark font-weight-bold h5 mb-0"><span>$215,000</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-left-info py-2">
        <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Tasks</span></div>
                        <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>50%</span></div>
            </div>
                <div class="col">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
            </div>
        </div>
    </div>
</div>

</div> <!--Buttons Row End-->


@if (Session::has('DonationMailSent'))
<div class="alert alert-success" role="alert">
    Email sent successfully to <strong>{{ session('DonationMailSent')}}</strong>!
    </div>
@endif




<!--user Table Start-->
<table id="DonationTable" class="table table-striped table-bordered table-fluid">
    <thead class="bg-primary text-white">
    <tr>
        <th>#</th>
        <th>Donation ID</th>
        <th>Donor Name</th>
        <th>Email ID</th>
        <th>Mobile Number</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($donations as $donation)
    <tr>
        <td>{{$donation->id}}</td>
        <td>{{$donation->donation_id}}</td>
        <td>{{$donation->donor_name}}</td>
        <td><a href="#" data-toggle="modal" data-target=".mail-{{$donation->donation_id}}">{{$donation->email_id}}</a></td>
        <td>{{$donation->mobile_number}}</td>
        <td>{{$donation->amount.' '.$donation->currency}}</td>
        <td class="{{$donation->txn_status}}"><strong>{{$donation->txn_status}}</strong></td>
        <td>
            <a href="#" class="delete" title="View" data-toggle="modal" data-target=".{{$donation->donation_id}}"><i class="fa fa-eye"></i></a>&nbsp;
            @if ($donation->txn_status == 'TXN_SUCCESS')
            <a href="#" class="setting" title="View" data-toggle="modal" data-target=".mail-{{$donation->donation_id}}"><i class="fa fa-envelope"></i></a>
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Donation ID</th>
        <th>Donor Name</th>
        <th>Email ID</th>
        <th>Mobile Number</th>
        <th>Amount</th>
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
        $('#DonationTable').DataTable();
    } );
</script>

@if (isset($donation))
<script>
    $(document).ready(function() {
    $('#summernote-{{$donation->donation_id}}').summernote({
        minHeight: 220,             // set minimum height of editor
        maxHeight: 500,             // set maximum height of editor
        focus: true     
      });
    });
    </script>
@endif

@endsection