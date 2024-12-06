<!--{{-- resources/views/user/userlist.blade.php --}}-->

@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        
  <style>
    .table {
        width: 100%;
        overflow-y: auto; /* Enable scrolling inside the table */
    }
    .table th, .table td {
        vertical-align: middle;
        border: 1px solid #000;
        padding: 5px; /* Reduce padding */
        line-height: 1.2; /* Adjust line height */
    }
    .table th{
        color:black;
        font-weight:bold;
    }
    
    .header {
        background-color: #2e2e61;
        color: #fff;
        text-align: center;
        padding: 10px; /* Reduce padding */
    }
    .sub-header {
        background-color: #d3d3d3;
        text-align: center;
        font-weight: bold;
    }
    .logo {
        width: 50px;
    }

    b{
        color:black;
        font-weight:bold;
    }
    
</style>


    <div class="container mt-5">
        <div class="row d-flex justify-content-end align-items-center">
            <button class="btn btn-primary btn-sm" onclick="goBack()">back</button>
        </div>
       
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-bordered">
                    <tbody id="sortable-body">
                        <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                            <th colspan="12">BASIC DETAILS</th>
                        </tr>
                   
                    
                        <tr data-id="2">
                            <th colspan="4" style="width: 33%;">Name of the Candidate</th>
                            <td colspan="8" style="width: 67%;">{{$details->candidate_name}}</td>
                        </tr>
                        <tr data-id="3">
                            <th colspan="4">Address of the Candidate</th>
                            <td colspan="8">{{$details->address}}</td>
                        </tr>
                        <tr data-id="4">
                            <th colspan="4">Father's Name</th>
                            <td colspan="8">{{$details->father_name}}</td>
                        </tr>
                        <tr data-id="5">
                            <th colspan="4">Period of Stay</th>
                            <th colspan="2">From</th>
                            <td colspan="2">{{$details->period_of_stay_from}}</td>
                            <th colspan="2">To</th>
                            <td colspan="2">{{$details->period_of_stay_to}}</td>
                        </tr>
                        <tr data-id="6">
                            <th colspan="4">Telephone No.</th>
                            <td colspan="8">{{$details->mobile}}</td>
                        </tr>
                  

                    
                        <tr data-id="7" style="background-color:#cec7c7;text-align:center;">
                            <th colspan="12" >VERIFICATION DETAILS</th>
                        </tr>
                   
                  
                        <tr data-id="8">
                            <th colspan="4">Name of the Respondent</th>
                            <td colspan="8">{{$details->respondent_name}}</td>
                        </tr>
                        <tr data-id="9">
                            <th colspan="4">Relationship with Candidate</th>
                            <td colspan="8">{{$details->rel_with_candi}}</td>
                        </tr>
                        <tr data-id="10">
                            <th colspan="4">Landmark</th>
                            <td colspan="8">{{$details->landmark}}</td>
                        </tr>
                        <tr data-id="11">
                            <th colspan="4">Date of Visit</th>
                            <td colspan="8">{{$details->visited_date}}</td>
                        </tr>
                        <tr data-id="12">
                            <th colspan="4">Residence Status</th>
                            <th colspan="1">Owned</th>
                            <td colspan="1">{{$details->residence_status==1?'✔️' : 'N/A'}}</td>
                            <th colspan="1">Rented</th>
                            <td colspan="2">{{$details->residence_status==2?'✔️' : 'N/A'}}</td>
                            <th colspan="1">Others</th>
                            <td colspan="2">{{$details->residence_status==3?'✔️' : 'N/A'}}</td>
                        </tr>
                        <tr data-id="13">
                            <th colspan="4">Residence Type</th>
                            <th colspan="1">Present</th>
                            <td colspan="1">{{$details->residence_type==1?'✔️' : 'N/A'}}</td>
                            <th colspan="1">Permanent</th>
                            <td colspan="2">{{$details->residence_type==2?'✔️' : 'N/A'}}</td>
                            <th colspan="1">Previous</th>
                            <td colspan="2">{{$details->residence_type==3?'✔️' : 'N/A'}}</td>
                        </tr>
                        <tr data-id="14">
                            <th colspan="4">Period of Stay</th>
                            <th colspan="1">From</th>
                            <td colspan="4">{{$details->stay_period_form}}</td>
                            <th colspan="1">To</th>
                            <td colspan="2">{{$details->stay_period_to}}</td>
                        </tr>
                        <tr data-id="15">
                            <th colspan="4">Signature of Respondent</th>
                            <td colspan="8">
                                @if(!empty($details->respondent_sign))
                                    <img src="{{env('APP_ADMIN_URL').$details->respondent_sign}}" alt="Respondent Signature" style="max-width: 100px; height: auto;">
                                @else
                                    <span>No Signature Available</span>
                                @endif
                            </td>
                        </tr>
                        <tr data-id="16">
                            <th colspan="4">Field Agent Remarks</th>
                            <td colspan="8">{{$details->complete_remark}}</td>
                        </tr>
                        <tr data-id="17">
                            <th colspan="4">Field Agent Name</th>
                            <td colspan="3">{{$details->v_field_agent_name}}</td>
                            <th colspan="2">Field Agent Signature</th>
                            <td colspan="3">
                                 @if(!empty($details->v_signature))
                                    <img src="{{env('APP_ADMIN_URL').$details->v_signature}}" alt="Vendor Signature" style="max-width: 100px; height: auto;">
                                @else
                                    <span>No Signature Available</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
         <div class="row el-element-overlay">
                  <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <img src="{{env('APP_ADMIN_URL').$details->house}}" alt="user" />
                                <div class="el-overlay">
                                    <ul class="list-style-none el-info">
                                        <li class="el-item">
                                            <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->house}}">
                                                <i class="mdi mdi-magnify-plus"></i>
                                            </a>
                                        </li>
                                        <li class="el-item">
                                            <a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->house])}}">
                                                <i class="mdi mdi-briefcase-download"></i>
                                               
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h4 class="m-b-1">House</h4> 
                                
                                @php 
                                    $house_address = json_decode($details->house_address, true);
                                @endphp
                                
                                @if($house_address)
                                <p><strong>Latitude:</strong> {{ $house_address['latitude'] }}</p>
                                <p><strong>Longitude:</strong> {{ $house_address['longitude'] }}</p>
                                <p><strong>Address:</strong> {{ $house_address['address'] }}</p>
                                <p><strong>Date:</strong> {{ $house_address['date'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->gate}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->gate}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item">
                                                <a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->gate])}}">
                                                  <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>   
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Gate</h4>
                                    @php 
                                       $gate_address = json_decode($details->gate_address, true);
                                    @endphp
                                @if($gate_address)
                                <p><strong>Latitude:</strong> {{ $gate_address['latitude'] }}</p>
                                <p><strong>Longitude:</strong> {{ $gate_address['longitude'] }}</p>
                                <p><strong>Address:</strong> {{ $gate_address['address'] }}</p>
                                <p><strong>Date:</strong> {{ $gate_address['date'] }}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->door}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->door}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->door])}}">
                                              <i class="mdi mdi-briefcase-download"></i>
                                               </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Door</h4> 
                                    @php 
                                       $door_address = json_decode($details->door_address, true);
                                    @endphp
                                    
                                    @if($door_address)
                                <p><strong>Latitude:</strong> {{ $door_address['latitude'] }}</p>
                                <p><strong>Longitude:</strong> {{ $door_address['longitude'] }}</p>
                                <p><strong>Address:</strong> {{ $door_address['address'] }}</p>
                                <p><strong>Date:</strong> {{ $door_address['date'] }}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->near_landmark}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->near_landmark}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->near_landmark])}}">
                                               <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Near Landmark</h4> 
                                     @php 
                                       $near_landmark_address = json_decode($details->near_landmark_address, true);
                                    @endphp
                                
                                @if($near_landmark_address)
                                    <p><strong>Latitude:</strong> {{ $near_landmark_address['latitude'] }}</p>
                                    <p><strong>Longitude:</strong> {{ $near_landmark_address['longitude'] }}</p>
                                    <p><strong>Address:</strong> {{ $near_landmark_address['address'] }}</p>
                                    <p><strong>Date:</strong> {{ $near_landmark_address['date'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->id_proof}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->id_proof}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->id_proof])}}">
                                               <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">ID Proof</h4> 
                                    @php 
                                       $id_proof_address = json_decode($details->id_proof_address, true);
                                    @endphp
                                
                                @if($id_proof_address)
                                    <p><strong>Latitude:</strong> {{ $id_proof_address['latitude'] }}</p>
                                    <p><strong>Longitude:</strong> {{ $id_proof_address['longitude'] }}</p>
                                    <p><strong>Address:</strong> {{ $id_proof_address['address'] }}</p>
                                    <p><strong>Date:</strong> {{ $id_proof_address['date'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
         </div>
        
        
    </div>



 <!---->

    </div>
    
    
</div>
</div>
<!--</div>-->
@endsection
