@extends('admin.body.adminmaster')
@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
       
    <div class="d-flex">
          <div class="mr-auto p-2"> <h2>Preview, <strong style="color:blue;">
              @if($project_type==1)
              Address Verification
              @elseif($project_type==3)
              Digital Address Verification
              @else
              Site Investigation
              @endif
             </strong></h2></div>
    </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif

    
    
                <div class="row">
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold">{{$metro_charge}}</h3>
                                    <span class="text-muted">
                                        @if($project_type==3)
                                         Digital Charge
                                        @else
                                         Metro City Charge
                                        @endif
                                    </span>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold">{{$metro_upload_count}}</h3>
                                    <span class="text-muted">
                                         @if($project_type==3)
                                         Digital Case
                                        @else
                                          Metro City Case
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold">{{$non_metro_charge}}</h3>
                                    <span class="text-muted">Non Metro Charge</span>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold">{{$non_metro_upload_count}}</h3>
                                    <span class="text-muted">Non Metro Case</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6 border-left text-center p-t-10">
                                   <h3 class="mb-0 ">{{$wallet}}</h3>
                                    <span class="text-muted">Wallet</span>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <h3 class="mb-0 ">{{$total_charge}}</h3>
                                    <span class="text-muted">Total Charge</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-3 border-left text-center p-t-10">
                                </div>
                                <div class="col-md-9 border-left text-center p-t-10 d-flex justify-content-center align-items-center">
                                   <button class="btn btn-primary btn-sm" onclick="goBack()" style="margin-right:10px;">Back</button>
                                   <form action="{{ route('client_case_insert') }}" method="POST">
                                       @csrf
                                        <input type="hidden" name="metro_rows" value="{{ json_encode($metro_rows) }}">
                                        <input type="hidden" name="non_metro_rows" value="{{ json_encode($non_metro_rows) }}">
                                        <input type="hidden" name="metro_upload_count" value="{{ $metro_upload_count }}">
                                        <input type="hidden" name="non_metro_upload_count" value="{{ $non_metro_upload_count }}">
                                        <input type="hidden" name="metro_charge" value="{{ $metro_charge }}">
                                        <input type="hidden" name="non_metro_charge" value="{{ $non_metro_charge }}">
                                        <input type="hidden" name="new_wallet" value="{{ $new_wallet }}">
                                        <input type="hidden" name="wallet" value="{{ $wallet }}">
                                        <input type="hidden" name="project_type" value="{{ $project_type }}">
                                        <input type="hidden" name="client_type" value="{{ $client_type }}">
                                        <input type="hidden" name="client_id" value="{{ $client_id }}">
                                        <input type="hidden" name="total_charge" value="{{ $total_charge }}">
                                        
                                   <button type="submit" class="btn btn-info btn-sm" onclick="goBack()">Submit</button>
                                   </form>
                                </div>
                            </div>
                    </div>
                </div>
    
    
    @if($project_type==1||$project_type==3)
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><strong>
                             @if($project_type==3)
                              Digital Address Verification Cases
                             @else
                                Metro City Cases 
                             @endif
                            
                            </strong></h3>
                        <div class="table-responsive">
                            <table  id="zero_config" class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Location</strong></th>
                                        <th scope="col"><strong>Pincode</strong></th>
                                        <th scope="col"><strong>Employee Id</strong></th>
                                        <th scope="col"><strong>Candidate Name</strong></th>
                                        <th scope="col"><strong>Mobile Number</strong></th>
                                        <th scope="col"><strong>Email Id</strong></th>
                                        <th scope="col"><strong>Father Name</strong></th>
                                        <th scope="col"><strong>Mother Name</strong></th>
                                        <th scope="col"><strong>Address Type</strong></th>
                                        <th scope="col"><strong>Address</strong></th>
                                        <th scope="col"><strong>City</strong></th>
                                        <th scope="col"><strong>State</strong></th>
                                        <th scope="col"><strong>Period Of Stay From</strong></th>
                                        <th scope="col"><strong>Period Of Stay To</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($metro_rows as $value)
                                    <tr>
                                       <td scope="col">{{$loop->iteration}}</td>
                                        <td scope="col">{{$value[0]}}</td>
                                        <td scope="col">{{$value[11]}}</td>
                                        <td scope="col">{{$value[1]}}</td>
                                        <td scope="col">{{$value[2]}}</td>
                                        <td scope="col">{{$value[3]}}</td>
                                        <td scope="col">{{$value[4]}}</td>
                                        <td scope="col">{{$value[5]}}</td>
                                        <td scope="col">{{$value[6]}}</td>
                                        <td scope="col">{{$value[7]}}</td>
                                        <td scope="col">{{$value[8]}}</td>
                                        <td scope="col">{{$value[9]}}</td>
                                        <td scope="col">{{$value[10]}}</td>
                                        <td scope="col">{{$value[12]}}</td>
                                        <td scope="col">{{$value[13]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><strong>Non Metro City Cases</strong></h3>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-striped" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                         <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Location</strong></th>
                                        <th scope="col"><strong>Pincode</strong></th>
                                        <th scope="col"><strong>Employee Id</strong></th>
                                        <th scope="col"><strong>Candidate Name</strong></th>
                                        <th scope="col"><strong>Mobile Number</strong></th>
                                        <th scope="col"><strong>Email Id</strong></th>
                                        <th scope="col"><strong>Father Name</strong></th>
                                        <th scope="col"><strong>Mother Name</strong></th>
                                        <th scope="col"><strong>Address Type</strong></th>
                                        <th scope="col"><strong>Address</strong></th>
                                        <th scope="col"><strong>City</strong></th>
                                        <th scope="col"><strong>State</strong></th>
                                        <th scope="col"><strong>Period Of Stay From</strong></th>
                                        <th scope="col"><strong>Period Of Stay To</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($non_metro_rows as $value)
                                    <tr>
                                       <td scope="col">{{$loop->iteration}}</td>
                                        <td scope="col">{{$value[0]}}</td>
                                        <td scope="col">{{$value[11]}}</td>
                                        <td scope="col">{{$value[1]}}</td>
                                        <td scope="col">{{$value[2]}}</td>
                                        <td scope="col">{{$value[3]}}</td>
                                        <td scope="col">{{$value[4]}}</td>
                                        <td scope="col">{{$value[5]}}</td>
                                        <td scope="col">{{$value[6]}}</td>
                                        <td scope="col">{{$value[7]}}</td>
                                        <td scope="col">{{$value[8]}}</td>
                                        <td scope="col">{{$value[9]}}</td>
                                        <td scope="col">{{$value[10]}}</td>
                                        <td scope="col">{{$value[12]}}</td>
                                        <td scope="col">{{$value[13]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @else
        
         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><strong>Metro City Cases</strong></h3>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Location</strong></th>
                                        <th scope="col"><strong>Pincode</strong></th>
                                        <th scope="col"><strong>Employee Id</strong></th>
                                        <th scope="col"><strong>Vendor Name</strong></th>
                                        <th scope="col"><strong>Mobile Number</strong></th>
                                        <th scope="col"><strong>Email Address</strong></th>
                                        <th scope="col"><strong>Address Type</strong></th>
                                        <th scope="col"><strong>Address</strong></th>
                                        <th scope="col"><strong>City</strong></th>
                                        <th scope="col"><strong>State</strong></th>
                                        <th scope="col"><strong>Period Of Stay From</strong></th>
                                        <th scope="col"><strong>Period Of Stay To</strong></th>
                                        <th scope="col"><strong>GST Number</strong></th>
                                        <th scope="col"><strong>PAN Number</strong></th>
                                        <th scope="col"><strong>Contact Person Name</strong></th>
                                        <th scope="col"><strong>Designation</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($metro_rows as $value)
                                    <tr>
                                       <td scope="col">{{$loop->iteration}}</td>
                                        <td scope="col">{{$value[0]}}</td>
                                        <td scope="col">{{$value[9]}}</td>
                                        <td scope="col">{{$value[1]}}</td>
                                        <td scope="col">{{$value[2]}}</td>
                                        <td scope="col">{{$value[3]}}</td>
                                        <td scope="col">{{$value[4]}}</td>
                                        <td scope="col">{{$value[5]}}</td>
                                        <td scope="col">{{$value[6]}}</td>
                                        <td scope="col">{{$value[7]}}</td>
                                        <td scope="col">{{$value[8]}}</td>
                                        <td scope="col">{{$value[10]}}</td>
                                        <td scope="col">{{$value[11]}}</td>
                                        <td scope="col">{{$value[12]}}</td>
                                        <td scope="col">{{$value[13]}}</td>
                                        <td scope="col">{{$value[14]}}</td>
                                        <td scope="col">{{$value[15]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><strong>Non Metro City Cases</strong></h3>
                        <div class="table-responsive">
                            <table  id="example" class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Location</strong></th>
                                        <th scope="col"><strong>Pincode</strong></th>
                                        <th scope="col"><strong>Employee Id</strong></th>
                                        <th scope="col"><strong>Vendor Name</strong></th>
                                        <th scope="col"><strong>Mobile Number</strong></th>
                                        <th scope="col"><strong>Email Address</strong></th>
                                        <th scope="col"><strong>Address Type</strong></th>
                                        <th scope="col"><strong>Address</strong></th>
                                        <th scope="col"><strong>City</strong></th>
                                        <th scope="col"><strong>State</strong></th>
                                        <th scope="col"><strong>Period Of Stay From</strong></th>
                                        <th scope="col"><strong>Period Of Stay To</strong></th>
                                        <th scope="col"><strong>GST Number</strong></th>
                                        <th scope="col"><strong>PAN Number</strong></th>
                                        <th scope="col"><strong>Contact Person Name</strong></th>
                                        <th scope="col"><strong>Designation</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($non_metro_rows as $value)
                                    <tr>
                                      <td scope="col">{{$loop->iteration}}</td>
                                        <td scope="col">{{$value[0]}}</td>
                                        <td scope="col">{{$value[9]}}</td>
                                        <td scope="col">{{$value[1]}}</td>
                                        <td scope="col">{{$value[2]}}</td>
                                        <td scope="col">{{$value[3]}}</td>
                                        <td scope="col">{{$value[4]}}</td>
                                        <td scope="col">{{$value[5]}}</td>
                                        <td scope="col">{{$value[6]}}</td>
                                        <td scope="col">{{$value[7]}}</td>
                                        <td scope="col">{{$value[8]}}</td>
                                        <td scope="col">{{$value[10]}}</td>
                                        <td scope="col">{{$value[11]}}</td>
                                        <td scope="col">{{$value[12]}}</td>
                                        <td scope="col">{{$value[13]}}</td>
                                        <td scope="col">{{$value[14]}}</td>
                                        <td scope="col">{{$value[15]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        @endif
        
        <!---->
        
        
    </div>
</div>
@endsection
