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
                            <th colspan="4" style="width: 33%;">Client/Company Name</th>
                            <td colspan="8" style="width: 67%;">{{$details->a_company_name??'N/A'}}</td>
                        </tr>
                        <tr data-id="3">
                            <th colspan="4">Address</th>
                            <td colspan="8">{{$details->address??'N/A'}}</td>
                        </tr>
                        <tr data-id="4">
                            <th colspan="4">Contact Person Name</th>
                            <td colspan="8">{{$details->contact_person_name??'N/A'}}</td>
                        </tr>
                        <tr data-id="5">
                            <th colspan="4">Contact Person Designation</th>
                            <td colspan="8">{{$details->contact_person_desi??'N/A'}}</td>
                        </tr>
                        <tr data-id="6">
                            <th colspan="4">Contact Number</th>
                            <td colspan="8">{{$details->mobile??'N/A'}}</td>
                        </tr>
                  

                    
                        <tr data-id="7" style="background-color:#cec7c7;text-align:center;">
                            <th colspan="12" >VERIFICATION DETAILS</th>
                        </tr>
                    
                        <tr data-id="12">
                            <th colspan="4">Business Premises</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->business_permises==1?'✔️':'N/A'}}
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->business_permises==2?'✔️':'N/A'}}</td>
                        </tr>
                        
                        
                        <tr data-id="12">
                            <th colspan="4">Tenure Of Their Business</th>
                            <th colspan="2">Since</th>
                            <td colspan="2">{{$details->tenure_since??'N/A'}}</td>
                            <th colspan="2">To</th>
                            <td colspan="2">{{$details->tenure_to??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="12">
                            <th colspan="4">Type</th>
                            <th colspan="1">Office</th>
                            <td colspan="1">{{$details->site_type==1?'✔️️':'N/A'}}</td>
                            <th colspan="1">Shop</th>
                            <td colspan="1">{{$details->site_type==2?'✔️️':'N/A'}}</td>
                            <th colspan="1">Garage</th>
                            <td colspan="1">{{$details->site_type==3?'✔️️':'N/A'}}️️</td>
                            <th colspan="1">Other</th>
                            <td colspan="1">{{$details->site_type==4?'✔️️':'N/A'}}</td>
                        </tr>
                   
                        <tr data-id="6">
                            <th colspan="4">Neighbour check (1)</th>
                            <td colspan="8">{{$details->neighbour_check_1??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Neighbour check (2)</th>
                            <td colspan="8">{{$details->neighbour_check_2??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Landmark</th>
                            <td colspan="8">{{$details->landmark??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Security Confirmation</th>
                            <td colspan="8">{{$details->security_confirmation??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Name of Signboard</th>
                            <td colspan="8">{{$details->signboard_name??'N/A'}}</td>
                        </tr>
                   
                      <tr data-id="12">
                            <th colspan="4">Was the owner of the vendor called before visiting the ddress?</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->is_owner_call_bef==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->is_owner_call_bef!=1?'✔️️':'N/A'}}</td>
                        </tr>
                        
                        
                        <tr data-id="12">
                            <th colspan="4">Was the mobile number correct?</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->is_mobile_correct==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->is_mobile_correct!=1?'✔️️':'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="12">
                            <th colspan="4">Document verification details</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->doc_verification_det==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->doc_verification_det!=1?'✔️️':'N/A'}}</td>
                        </tr>
                   
                        <tr data-id="6">
                            <th colspan="4">Name of the Partners</th>
                            <td colspan="8">{{$details->partners_name??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Who approached them from lombard?</th>
                            <td colspan="8">{{$details->name_appr_lomb??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="12">
                            <th colspan="4">In past, have you done with business with lombard?</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->business_with_lom==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->business_with_lom!=1?'✔️️':'N/A'}}</td>
                        </tr>
                        
                        
                         <tr data-id="12">
                            <th colspan="4">In your company ever blacklisted with Others company or establishment?</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->is_blacklist==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->is_blacklist!=1?'✔️️':'N/A'}}</td>
                        </tr>
                        
                         <tr data-id="12">
                            <th colspan="4">Is any of your relative or friend working with lombard ?</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->relative_lamboard==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->relative_lamboard!=1?'✔️️':'N/A'}}</td>
                        </tr>
                        
                        
                         <tr data-id="12">
                            <th colspan="4">Has any action been initiated by law enforcement by against your company?</th>
                            <th colspan="2">Yes</th>
                            <td colspan="2">{{$details->law_inforcement==1?'✔️️':'N/A'}}</td>
                            <th colspan="2">No</th>
                            <td colspan="2">{{$details->law_inforcement!=1?'✔️️':'N/A'}}</td>
                        </tr>
                       
                       <tr data-id="6">
                            <th colspan="4">Stamp & Signature of Client/Company </th>
                            <td colspan="8">   
                               @if(!empty($details->sign_comp))
                                    <img src="{{env('APP_ADMIN_URL').$details->sign_comp}}" alt="Vendor Signature" style="max-width: 100px; height: auto;">
                                @else
                                    <span>No Signature Available</span>
                                @endif
                            </td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Final Comment</th>
                            <td colspan="8">{{$details->final_comment??'N/A'}}</td>
                        </tr>
                        
                        <tr data-id="6">
                            <th colspan="4">Il Manager Name</th>
                            <td colspan="8">{{$details->il_manager_name??'N/A'}}</td>
                        </tr>
                        
                         <tr data-id="6">
                            <th colspan="4">Seal & Signature</th>
                            <td colspan="8">
                                @if(!empty($details->sign_comp))
                                    <img src="{{env('APP_ADMIN_URL').$details->sign_comp}}" alt="Vendor Signature" style="max-width: 100px; height: auto;">
                                @else
                                    <span>No Signature Available</span>
                                @endif
                            </td>
                        </tr>
                        
                          <tr data-id="6">
                            <th colspan="4">Date</th>
                            <td colspan="8">N/A</td>
                        </tr>
                        
                         <tr data-id="6">
                            <th colspan="4">Surveyor's Name</th>
                            <td colspan="8">{{$details->v_name??'N/A'}}</td>
                        </tr>
                        
                         <tr data-id="6">
                            <th colspan="4">Signature</th>
                            <td colspan="8">
                                @if(!empty($details->signature))
                                    <img src="{{env('APP_ADMIN_URL').$details->signature}}" alt="Vendor Signature" style="max-width: 100px; height: auto;">
                                @else
                                    <span>No Signature Available</span>
                                @endif
                            </td>
                        </tr>
                        
                         <tr data-id="6">
                            <th colspan="4">Date</th>
                            <td colspan="8">N/A</td>
                        </tr>
                   
                    </tbody>
                </table>
            </div>
        </div>
           
            
         <div class="row el-element-overlay">
             
                  @if($details->car_wash)
                  <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <img src="{{env('APP_ADMIN_URL').$details->car_wash}}" alt="user" />
                                <div class="el-overlay">
                                    <ul class="list-style-none el-info">
                                        <li class="el-item">
                                            <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->car_wash}}">
                                                <i class="mdi mdi-magnify-plus"></i>
                                            </a>
                                        </li>
                                        <li class="el-item">
                                            <a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->car_wash])}}">
                                                <i class="mdi mdi-briefcase-download"></i>
                                               
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h4 class="m-b-1">Car Wash</h4> 
                                
                                @php 
                                    $house_address = json_decode($details->car_wash_address, true);
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
                 @endif
                    
                     @if($details->car_repair)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->car_repair}}" alt="Car Repair" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->car_repair}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item">
                                                <a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->car_repair])}}">
                                                  <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>   
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Car Repair</h4>
                                    @php 
                                       $gate_address = json_decode($details->car_repair_address, true);
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
                    @endif
                    
                     @if($details->car_paint)
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->car_paint}}" alt="Car Paint" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->car_paint}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->car_paint])}}">
                                              <i class="mdi mdi-briefcase-download"></i>
                                               </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Car Paint</h4> 
                                    @php 
                                       $door_address = json_decode($details->car_paint_address, true);
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
                    @endif
                    
                    
                     @if($details->car_lift)
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->car_lift}}" alt="Car Lift" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->car_lift}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->car_lift])}}">
                                               <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Car Lift</h4> 
                                     @php 
                                       $near_landmark_address = json_decode($details->car_lift_address, true);
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
                    @endif
                    
                     @if($details->separate_office)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->separate_office}}" alt="Separate Office" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->separate_office}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->separate_office])}}">
                                               <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Separate Office</h4> 
                                    @php 
                                       $id_proof_address = json_decode($details->separate_office_address, true);
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
                    @endif
                    
                     @if($details->customer_lounge)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{env('APP_ADMIN_URL').$details->customer_lounge}}" alt="Customer Lounge" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{env('APP_ADMIN_URL').$details->customer_lounge}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{route('download.file',['file'=>env('APP_ADMIN_URL').$details->customer_lounge])}}">
                                               <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                             </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-1">Customer Lounge</h4> 
                                    @php 
                                       $id_proof_address = json_decode($details->customer_lounge_address, true);
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
                    @endif
         </div>
           
        
    </div>



 <!---->

    </div>
    
    
</div>
</div>
<!--</div>-->
@endsection
