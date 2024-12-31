@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        
        <!---->
        
        <div class="row d-flex justify-content-between align-item-center">
        <h3>Case Tracking Page</h3>
        <button class="btn btn-primary btn-sm" onclick="goBack()">Back</button>
 </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ session('success') }}</strong>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ session('error') }}</strong>
        </div>
        @endif
        
        
        
        <style>
    .table {
        table-layout: fixed;
        width: 100%;
        max-height: 80vh;
        /* Set a max height for the table */
        overflow-y: auto;
        /* Enable scrolling inside the table */
    }

    .table th,
    .table td {
        vertical-align: middle;
        border: 1px solid #000;
        padding: 5px;
        /* Reduce padding */
        line-height: 1.2;
        /* Adjust line height */
    }

    .table th {
        color: black;
        font-weight: bold;
    }

    .header {
        background-color: #2e2e61;
        color: #fff;
        text-align: center;
        padding: 10px;
        /* Reduce padding */
    }

    .sub-header {
        background-color: #d3d3d3;
        text-align: center;
        font-weight: bold;
    }

    .logo {
        width: 50px;
    }

    .container {
        max-height: 100vh;
        /* Ensure container height fits screen */
        overflow: hidden;
        /* Prevent page scrolling */
    }

    th>b {
        color: black;
        font-weight: bold;
    }

    .custom-heading {
        color: #5e60a9;
        font-size: 30px;
        text-align: left;
        margin: 20px 0;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .custom-box {
        width: 100%;
        height: 50vh;
        box-shadow: 5px 7px 18px #162c23;
        text-shadow: 2px 2px 4px rgb(204 147 147 / 60%);
    }
</style>
        
        
         <div id="accordian-4">
                            <div class="card m-t-30">
                                <a class="card-header link" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-90" aria-expanded="true" aria-controls="Toggle-90">
                                    <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span><b style="font-size:1rem">Case Details</b></span>
                                </a>
                                <div id="Toggle-90" class="collapse show multi-collapse">
                                    <div class="card-body widget-content">
                                         <table class="table table-bordered responcive">
                                                    <tbody id="sortable-body">
                                                        <tr data-id="1"
                                                            style="background-color:#cec7c7;text-align:center;">
                                                            <th colspan="12">CASE DETAILS</th>
                                                        </tr>
                                                        <tr data-id="2">
                                                            <th colspan="2" style="width: 33%;">Case Id</th>
                                                            <td colspan="4" style="width: 67%;"> {{$data->case_id}}</td>
                                                            <th colspan="2" style="width: 33%;">Project Type</th>
                                                            <td colspan="4" style="width: 67%;">
                                                                {{$data->project_type==1?'Address Verification':($data->project_type==2?'Site Investigation':'Digital Address Verification')}}
                                                            </td>
                                                        </tr>

                                                        <tr data-id="3">
                                                            <th colspan="2">Candidate Name</th>
                                                            <td colspan="4"> {{$data->candidate_name??'N/A'}} </td>
                                                            <th colspan="2">Employee Id</th>
                                                            <td colspan="4"> {{$data->employee_id??'N/A'}} </td>
                                                        </tr>


                                                        <tr data-id="3">
                                                            <th colspan="2">Father Name</th>
                                                            <td colspan="4"> {{$data->father_name??'N/A'}} </td>
                                                            <th colspan="2">Mother Name</th>
                                                            <td colspan="4">{{$data->mother_name??'N/A'}} </td>
                                                        </tr>

                                                        <tr data-id="3">
                                                            <th colspan="2">Mobile</th>
                                                            <td colspan="4"> {{$data->mobile??'N/A'}} </td>
                                                            <th colspan="2">Email</th>
                                                            <td colspan="4">{{$data->email??'N/A'}} </td>
                                                        </tr>


                                                        <tr data-id="6">
                                                            <th colspan="2">GST Number</th>
                                                            <td colspan="4">{{$data->gst_number??'N/A'}} </td>
                                                            <th colspan="2">PAN Number</th>
                                                            <td colspan="4">{{$data->pan_card_num??'N/A'}} </td>
                                                        </tr>

                                                        <tr data-id="6">
                                                            <th colspan="2">Contact Person Name</th>
                                                            <td colspan="4">{{$data->contact_person_name??'N/A'}}</td>
                                                            <th colspan="2">Designation</th>
                                                            <td colspan="4"> {{$data->contact_person_desi??'N/A'}} </td>
                                                        </tr>


                                                        <tr data-id="4">
                                                            <th colspan="2">Period Of Stay From</th>
                                                            <td colspan="4"> {{$data->period_of_stay_from??'N/A'}} </td>
                                                            <th colspan="2">Period Of Stay To</th>
                                                            <td colspan="4">{{$data->period_of_stay_to??'N/A'}} </td>
                                                        </tr>
                                                        <tr data-id="5">
                                                            <th colspan="2">Location Type</th>
                                                            <td colspan="4">{{$data->address_type??'N/A'}}</td>
                                                            <th colspan="2">Pincode</th>
                                                            <td colspan="4"> {{$data->pincode??'N/A'}} </td>
                                                        </tr>

                                                        <tr data-id="6">
                                                            <th colspan="2">City</th>
                                                            <td colspan="4"> {{$data->city??'N/A'}} </td>
                                                            <th colspan="2">State</th>
                                                            <td colspan="4"> {{$data->state??'N/A'}} </td>
                                                        </tr>

                                                        <tr data-id="6">
                                                            <th colspan="2">Address</th>
                                                            <td colspan="10"> {{$data->address??'N/A'}} </td>
                                                        </tr>

                                                        <tr data-id="1"
                                                            style="background-color:#cec7c7;text-align:center;">
                                                            <th colspan="12">CLIENT DETAILS</th>
                                                        </tr>
                                                        <tr data-id="6">
                                                            <th colspan="2">Client Id</th>
                                                            <td colspan="4"> {{$data->reference_id??'N/A'}} </td>
                                                            <th colspan="2">Company Name</th>
                                                            <td colspan="4">{{$data->a_company_name??'N/A'}} </td>
                                                        </tr>
                                                        <tr data-id="6">
                                                            <th colspan="2">Contact Number</th>
                                                            <td colspan="4"> {{$data->clientphone_number??'N/A'}} </td>
                                                            <th colspan="2">Email</th>
                                                            <td colspan="4"> {{$data->clientemail??'N/A'}} </td>
                                                        </tr>
                                                         <tr data-id="6">
                                                            <th colspan="2">Payment Type</th>
                                                            <td colspan="10"> {{$data->payment_preference==1?'Prepaid':'Postpaid'}} </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                    </div>
                                </div>
                                
                                
                                @php
                                  $track_status = json_decode($data->track_status,true);
                                @endphp
                                
                                @if($track_status)
                                
                                @foreach($track_status as $item)
                                
                                  @if($item['status']==2||$item['status']==8)
                                <a class="card-header link border-top" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-{{$loop->iteration}}" aria-expanded="false" aria-controls="Toggle-{{$loop->iteration}}">
                                    <i class="seticon fa fa-times" aria-hidden="true"></i>
                                    <span><b style="font-size:1rem;">
                                        @endif
                                        
                                        @if($item['status']==2)
                                             Insuff Case
                                        @elseif($item['status']==8)
                                            Completed
                                        @endif
                                        
                              {{--          @if($item['status']==1)
                                         Allocated
                                        @elseif($item['status']==2)
                                           Insuff Case
                                        @elseif($item['status']==4)
                                         Rejected By Vendor
                                        @elseif($item['status']==5)
                                         Case Reopend
                                        @elseif($item['status']==6)
                                         Overdue Case
                                        @elseif($item['status']==7)
                                          In Review
                                        @elseif($item['status']==8)
                                          Completed
                                        @elseif($item['status']==9)
                                         Case Accepted By Vendor
                                        @elseif($item['status']==11)
                                         Runner State
                                        @elseif($item['status']==12)
                                         On The Way
                                        @elseif($item['status']==15)
                                         Rejected By Admin
                                        @elseif($item['status']==16)
                                          No Action By Vendor
                                        @elseif($item['status']==17)
                                           Insuff Cleared
                                        @elseif($item['status']==18)
                                          Rejected By client
                                        @elseif($item['status']==19)
                                          Case re-opened by client
                                        @elseif($item['status']==20)
                                         Case Re-Assigned
                                         @else
                                         Unknown Status
                                        @endif                --}}
                                        
                                        
                                        
                                    </b></span>
                                </a>
                                
                                @if($item['status']==2||$item['status']==8)
                                
                                <div id="Toggle-{{$loop->iteration}}" class="multi-collapse collapse" style="">
                                    <div class="card-body widget-content">
                                        <table class="table table-bordered responcive">
                                             <tbody>
                                                 
                                         @if($item['status']==2)
                                                <tr>
                                                    <th colspan="2">Date</th>
                                                    <td colspan="10">{{$item['insuff_date'] }}</td>
                                                </tr> 
                                                 <tr>
                                                    <th colspan="2">Remark</th>
                                                    <td colspan="8">{{$item['insuff_remark'] }}  </td>
                                                    <td colspan="2" class="text-center">
                                                       <button data-toggle="modal" data-target="#insuff_remark" class="btn m-t-20 btn-info btn-block waves-effect waves-light"  {{$data->insuff_status==0?'disabled':''}} >Clear</button> 
                                                    </td>
                                                </tr> 
                                            @elseif($item['status']==8)
                                                <tr>
                                                    <th colspan="2">Date</th>
                                                    <td colspan="2">{{$item['date'] }}</td>
                                                    <td colspan="2">
                                                       <a href="
                                                                @if($data->project_type == 1)
                                                                    {{ route('addressreportpdf',$item['report_id']) }}
                                                                @elseif($data->project_type == 2)
                                                                    {{ route('sitereportpdf', $item['report_id']) }}
                                                                @else
                                                                    #
                                                                @endif
                                                            ">
                                                        <button class="btn btn-info btn-block waves-effect waves-light">View</button>
                                                    </a>
                                                    </td>
                                                    <td colspan="3">
                                                        <button data-toggle="modal" data-target="#reject-modal" class="btn btn-danger btn-block waves-effect waves-light" 
                                                        {{$data->rejected_status==0&&$data->reopen_status==0?'':'disabled'}}
                                                        >Reject</button>
                                                    </td>
                                                    <td colspan="3">
                                                        <button data-toggle="modal" data-target="#complete-modal" class="btn btn-success btn-block waves-effect waves-light" 
                                                        {{$data->rejected_status==0&&$data->reopen_status==0?'':'disabled'}}
                                                        >Re Open</button>
                                                    </td>
                                                </tr> 
                                            @endif
                                                 
    
                                               
                                      {{--           @if($item['status']==1)
                                                <tr>
                                                    <th colspan="2">Vendor Id</th>
                                                    <td colspan="4"> {{ $item['v_unique_id'] }}</td>
                                                    <th colspan="2">Assign Date</th>
                                                    <td colspan="4">{{ $item['assign_date'] }}</td>
                                                </tr> 
                                                
                                                @elseif($item['status']==2)
                                                
                                                <tr>
                                                    <th colspan="2">Date</th>
                                                    <td colspan="10">{{$item['insuff_date'] }}</td>
                                                </tr> 
                                                 <tr>
                                                    <th colspan="2">Remark</th>
                                                    <td colspan="8">{{$item['insuff_remark'] }}  </td>
                                                    <td colspan="2" class="text-center">
                                                       <button data-toggle="modal" data-target="#insuff_remark" class="btn m-t-20 btn-info btn-block waves-effect waves-light"  {{$data->insuff_status==0?'disabled':''}} >Clear</button> 
                                                    </td>
                                                </tr> 
                                                
                                                
                                                @elseif($item['status']==4)
                                                
                                                 <tr>
                                                    <th colspan="2">Date rejected by vendor</th>
                                                    <td colspan="10"></td>
                                                </tr> 
                                                
                                              
                                                
                                                @elseif($item['status']==5)
                                                
                                                 <tr>
                                                    <th colspan="2">Re Open Date</th>
                                                    <td colspan="10">{{$item['date']}}</td>
                                                </tr> 
                                                 <tr>
                                                    <th colspan="2">Remark</th>
                                                    <td colspan="10">{{$item['reopen_remark']}}</td>
                                                </tr> 
                                                
                                                
                                            
                                                
                                                @elseif($item['status']==6)
                                                
                                                <tr>
                                                    <th colspan="2">Assign date</th>
                                                    <td colspan="4"></td>
                                                    <th colspan="2">Current Date</th>
                                                    <td colspan="4"></td>
                                                </tr> 
                                               
                                               
                                              
                                               
                                               @elseif($item['status']==7)
                                               
                                               <tr>
                                                    <th colspan="3">Submit Date</th>
                                                    <td colspan="3">{{$item['date']}}</td>
                                                    <td colspan="6">
                                                        <a href="
                                                                @if($data->project_type == 1)
                                                                    {{ route('addressreportpdf',$item['report_id']) }}
                                                                @elseif($data->project_type == 2)
                                                                    {{ route('sitereportpdf', $item['report_id']) }}
                                                                @else
                                                                    #
                                                                @endif
                                                            ">
                                                            <button class="btn btn-info btn-block waves-effect waves-light">View</button>
                                                        </a>

                                                    </td>  --}}
                                                    
                                                    {{--
                                                    <td colspan="3">
                                                        <button data-toggle="modal" data-target="#reject-modal" class="btn btn-danger btn-block waves-effect waves-light" {{$data->case_status==7?'':'disabled'}}>Reject</button>
                                                    </td>
                                                    <td colspan="3">
                                                        <button data-toggle="modal" data-target="#complete-modal" class="btn btn-success btn-block waves-effect waves-light" {{$data->case_status==7?'':'disabled'}}>Mark as Completed</button>
                                                    </td>
                                                    --}}
                                                    
                                                    {{--
                                                    
                                                </tr> 
                                               
                                               
                                                @elseif($item['status']==8)
                                               
                                                <tr>
                                                    <th colspan="2">Date</th>
                                                    <td colspan="2">{{$item['date'] }}</td>
                                                    <td colspan="2">
                                                       <a href="
                                                                @if($data->project_type == 1)
                                                                    {{ route('addressreportpdf',$item['report_id']) }}
                                                                @elseif($data->project_type == 2)
                                                                    {{ route('sitereportpdf', $item['report_id']) }}
                                                                @else
                                                                    #
                                                                @endif
                                                            ">
                                                        <button class="btn btn-info btn-block waves-effect waves-light">View</button>
                                                    </a>
                                                    </td>
                                                    <td colspan="3">
                                                        <button data-toggle="modal" data-target="#reject-modal" class="btn btn-danger btn-block waves-effect waves-light" 
                                                        {{$data->rejected_status==0&&$data->reopen_status==0?'':'disabled'}}
                                                        >Reject</button>
                                                    </td>
                                                    <td colspan="3">
                                                        <button data-toggle="modal" data-target="#complete-modal" class="btn btn-success btn-block waves-effect waves-light" 
                                                        {{$data->rejected_status==0&&$data->reopen_status==0?'':'disabled'}}
                                                        >Re Open</button>
                                                    </td>
                                                </tr> 
                                                
                                                
                                              
                                                
                                                 @elseif($item['status']==9)
                                                
                                                <tr>
                                                    <th colspan="2">Accepted Date</th>
                                                    <td colspan="10">{{$item['date']}}</td>
                                                </tr> 
                                                
                                                 @elseif($item['status']==11)
                                                
                                                 <tr>
                                                    <th colspan="2"> Date</th>
                                                    <td colspan="10">{{$item['date']}}</td>
                                                </tr> 
                                                
                                                 @elseif($item['status']==12)
                                                
                                                
                                                 <tr>
                                                    <th colspan="2"> Date</th>
                                                    <td colspan="10">{{$item['date']}}</td>
                                                </tr> 
                                                
                                                
                                                
                                                 @elseif($item['status']==15)
                                                
                                                
                                                 <tr>
                                                    <th colspan="2">Rejected Date</th>
                                                    <td colspan="10">{{$item['date']}}</td>
                                                </tr> 
                                                 <tr>
                                                    <th colspan="2">Remark</th>
                                                    <td colspan="10">{{$item['remark']}}</td>
                                                </tr> 
                                                
                                              
                                                
                                                 @elseif($item['status']==16)
                                                
                                                <tr>
                                                    <th colspan="2">Allocation Date</th>
                                                    <td colspan="4"></td>
                                                    <th colspan="2">Current Date</th>
                                                    <td colspan="4"></td>
                                                </tr> 
                                                
                                                 @elseif($item['status']==17)
                                                 <tr>
                                                    <th colspan="2">Date</th>
                                                    <td colspan="4">{{$item['date']}}</td>
                                                    <th colspan="2">Remark</th>
                                                    <td colspan="4">{{$item['clear_remark']}}</td>
                                                </tr> 
                                                
                                                 @elseif($item['status']==18)
                                                 
                                                 <tr>
                                                    <th colspan="2">Date</th>
                                                    <td colspan="4">{{$item['date']}}</td>
                                                    <th colspan="2">Remark</th>
                                                    <td colspan="4">{{$item['reject_remark']}}</td>
                                                 </tr> 
                                                 
                                                 @elseif($item['status']==19)
                                                     <tr>
                                                        <th colspan="2">Date</th>
                                                        <td colspan="4">{{$item['date']}}</td>
                                                        <th colspan="2">Remark</th>
                                                        <td colspan="4">{{$item['reopen_remark']}}</td>
                                                    </tr> 
                                                 @elseif($item['status']==20)
                                                     <tr>
                                                        <th colspan="2">Date</th>
                                                        <td colspan="4">{{$item['date']}}</td>
                                                        <th colspan="2">Vendor Id</th>
                                                        <td colspan="4">{{$item['v_id']}}</td>
                                                    </tr> 
                                                @else
                                                <tr>
                                                    <td colspan="12">Unknown status</td>
                                                </tr> 
                                                @endif          --}}
                                                
                                                
                                                
                                            </tbody>
                                         </table>               
    
                                    </div>
                                </div>

                                @endif
                                @endforeach
                                @else
                                <table class="table table-bordered responcive">
                                             <tbody>
                                               <tr  style="background-color:#cec7c7;text-align:center;">
                                                    <th colspan="12">CASE Not Allocated Yet.</th>
                                             </tr>
                                </tbody>
                                </table>
                                
                                @endif
                                
                                
                                  <!--inssuff modal -->
                                 
                <div class="modal fade none-border" id="insuff_remark">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Insuff</strong> Clear remark</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form method="post" action="{{route('clear_insuff')}}">
                                @csrf
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Remark</label>
                                            <input type="hidden" name="case_id" value="{{$data->case_id}}">
                                            <input type="hidden" name="v_id" value="{{$data->v_id}}">
                                            <textarea  class="form-control form-white" name="insuff_remark" rows="4" cols="50" required></textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                              
                              
                              
                                
                                <!--inssuff modal end -->
                                
                                <!--complete modal-->
                 <div class="modal fade none-border" id="complete-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Re-Open the case - </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form method="post" action="{{route('reopen_case_client')}}" display="none">
                                @csrf
                                
                            <div class="modal-body">
                               <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Remark</label>
                                    <input type="hidden" name="case_id" value="{{$data->case_id}}">
                                    <input type="hidden" name="v_id" value="{{$data->v_id}}">
                                    <textarea  class="form-control form-white" name="reopen_remark" rows="4" cols="50" required></textarea>
                                  </div>
                                </div>
                            </div>
                            
                                    
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                                <!--complete modal end-->
                                
                                <!--reject modal-->
                 <div class="modal fade none-border" id="reject-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Reject</strong> this case</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form method="post" action="{{route('reject_case_client')}}">
                                @csrf
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Remark</label>
                                            <input type="hidden" name="case_id" value="{{$data->case_id}}">
                                            <input type="hidden" name="v_id" value="{{$data->v_id}}">
                                           <textarea  class="form-control form-white" name="reject_remark" rows="4" cols="50" required></textarea>

                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Reject</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                                
                                
                                <!--reject modal end-->
                                
                                
                                
                 </div>
            </div>
            
            
            
            
            <!---->
            
        </div>
</div>
@endsection


