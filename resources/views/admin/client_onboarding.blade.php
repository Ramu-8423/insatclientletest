@extends('admin.body.adminmaster')
@section('admin')
<style>
.custom-heading {
    color: #5e60a9;
    font-size: 30px;
    text-align: left;
    margin: 20px 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);

}
</style>
<style>
      input {
            box-sizing: border-box;
            border: 1px solid #82eb82 !important;
        }
</style>

@php
 $data= json_decode($details->reg_tracking);
@endphp

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <!-- Nav tabs -->
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Registration" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down">Registration Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Agreement" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down">Agreement Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Report" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down">Report Layout</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Payment" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down">Payment Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Status" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down">Status</span>
                                </a>
                            </li>
                        </ul>
                        <button class="btn btn-primary" onclick="goBack()" style="margin-right: 25px;">Back</button>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">

                        <!-- registration tab-->

                        <div class="tab-pane active" id="Registration" role="tabpanel">
                            <div class="card-body">
                                <h2 class="card-title custom-heading">Registration Details</h2>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Reference Id
                                    </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>{{$details->reference_id}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Company Name
                                    </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label "><b>{{$details->company_name}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Concern
                                        Person Name </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>{{$details->person_name}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Concern
                                        Person Designation </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-6">
                                        <label for="fname"
                                            class="col-sm-8 text-left control-label col-form-label"><b>{{$details->person_designation}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Company
                                        Address </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>{{$details->company_address}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Email
                                    </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>{{$details->email}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Phone
                                        Number
                                    </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>{{$details->phone_number}}</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Project Type
                                    </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        @php
                                        $p_type = json_decode($details->project_type, true);
                                        @endphp

                                        @if(is_array($p_type))
                                        @foreach($p_type as $p_type_value)
                                        @if($p_type_value == 1)
                                        <label for="fname" class="control-label col-form-label"><b>Address Verification
                                                ,</b></label>
                                        @elseif($p_type_value == 2)
                                        <label for="fname" class="control-label col-form-label"><b>Site
                                                Investigation</b></label>
                                        @endif
                                        @endforeach
                                        @else
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>Invalid project
                                                type
                                                data.</p></label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                        style="padding-left:60px;">Payment Type
                                    </label>
                                    <div class="col-sm-1 text-center">:</div>
                                    <div class="col-sm-8">
                                        
                                        @if($details->payment_preference==1)
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>Prepaid</b></label>
                                        @elseif($details->payment_preference==2)
                                        <label for="fname"
                                            class="col-sm-3 text-left control-label col-form-label"><b>Postpaid</b></label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  p-20" id="Agreement" role="tabpanel">
                             <h1 class="custom-heading">Agreement Details</h1>
                             @if($data->agreement_status == 1)
                            <div class="container mt-1">
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                                    <th colspan="12">Basic Details</th>
                                                </tr>
                                                <tr data-id="2">
                                                    <th colspan="4" style="width: 33%;">Company Name</th>
                                                    <td colspan="8" style="width: 67%;">{{$details->a_company_name}}
                                                    </td>
                                                </tr>
                                                <tr data-id="3">
                                                    <th colspan="4">CIN Number</th>
                                                    <td colspan="8">{{$details->a_cin_number}}</td>
                                                </tr>
                                                <tr data-id="3">
                                                    <th colspan="4">Company Address</th>
                                                    <td colspan="8">{{$details->a_company_address}}</td>
                                                </tr>
                                                <tr data-id="3">
                                                    <th colspan="4">Authorized Signatory Name</th>
                                                    <td colspan="8">{{$details->a_signatory_name}}</td>
                                                </tr>
                                                <tr data-id="3">
                                                    <th colspan="4">Authorized Signatory Designation</th>
                                                    <td colspan="8">{{$details->a_signatory_desi}}</td>
                                                </tr>

                                                <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                                    <th colspan="12">Case Timeline In Day</th>
                                                </tr>
                                                <tr data-id="3">
                                                    <th colspan="4">Case Timeline</th>
                                                    <td colspan="8">{{$details->a_case_timeline}}</td>
                                                </tr>
                                                <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                                    <th colspan="12">Escalation Matrix upto 3 level</th>
                                                </tr>
                                                <tr data-id="3">
                                                    <th colspan="3">Name</th>
                                                    <th colspan="3">Contact Number</th>
                                                    <th colspan="3">Email</th>
                                                    <th colspan="3">Designation</th>
                                                </tr>
                                                @php
                                                $other_person = json_decode($details->a_other_person_info);
                                                @endphp
                                                <tr data-id="3">
                                                    <td colspan="3">{{$other_person[0]->person_name}}</td>
                                                    <td colspan="3">{{$other_person[0]->person_phone}}</td>
                                                    <td colspan="3">{{$other_person[0]->person_email}}</td>
                                                    <td colspan="3">{{$other_person[0]->person_designation}}</td>
                                                </tr>
                                                <tr data-id="3">
                                                    <td colspan="3">{{$other_person[1]->person_name}}</td>
                                                    <td colspan="3">{{$other_person[1]->person_phone}}</td>
                                                    <td colspan="3">{{$other_person[1]->person_email}}</td>
                                                    <td colspan="3">{{$other_person[1]->person_designation}}</td>
                                                </tr>
                                                <tr data-id="3">
                                                    <td colspan="3">{{$other_person[2]->person_name}}</td>
                                                    <td colspan="3">{{$other_person[2]->person_phone}}</td>
                                                    <td colspan="3">{{$other_person[2]->person_email}}</td>
                                                    <td colspan="3">{{$other_person[2]->person_designation}}</td>
                                                </tr>
                                                <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                                    <th colspan="12">Uploaded Documents</th>
                                                </tr>
                                                <tr data-id="3" class="">
                                                    <th colspan="4">Pan Card</th>
                                                    <th colspan="4">Gst Documents</th>
                                                    <th colspan="4">Approved Quotation Documents </th>
                                                </tr>
                                                <tr data-id="3">
                                                    <td colspan="4">
                                                        @if($details->a_pan_card!=null)
                                                        <a href="{{env('APP_URL').$details->a_pan_card}}"
                                                            target="_blank">View
                                                            Pancard</a>
                                                        @else
                                                        No Pan card available.
                                                        @endif
                                                    </td>
                                                    <td colspan="4">
                                                        @if($details->a_gst!=null)
                                                        <a href="{{env('APP_URL').$details->a_gst}}"
                                                            target="_blank">View GST
                                                            Certificate</a>
                                                        @else
                                                        No gst document available!
                                                        @endif
                                                    </td>
                                                    <td colspan="4">
                                                        @if($details->a_quotation_doc!=null)
                                                        <a href="{{env('APP_URL').$details->a_quotation_doc}}"
                                                            target="_blank">View
                                                            Qutotation Doc</a>
                                                        @else
                                                        Qutotation document not available
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                 <div class="card-body" style="display: flex; justify-content: end;">
                                    <form method="post" action="{{ route('updatestatus') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$details->id}}">
                                        <input type="hidden" name="agreement_status" value="agreement_status">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>
                             @else
                            <!--client Agreement form start-->
                             <div class="card-body">
                            <form action="{{route('client_agreement')}}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="remark_status" value="{{$details->remark_status}}">
                                <h4 class="card-title custom-heading">Agreement Details</h4>
                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Company
                                        Name :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="text"
                                            class="form-control" id="fname" name="company_name"
                                            placeholder="Enter company name.." value="{{$details->a_company_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">CIN
                                        Number :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="text"
                                            class="form-control" id="cono1" name="cin_number"
                                            placeholder="Enter CIN Number" value="{{$details->a_cin_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Company
                                        Address :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="text"
                                            class="form-control" id="fname" name="company_address"
                                            placeholder="Enter compnay address.."
                                            value="{{$details->a_company_address}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="lname"
                                        class="col-sm-3 text-left control-label col-form-label">Authorized Signatory
                                        Name :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="text"
                                            class="form-control" id="lname" name="signatory_name"
                                            placeholder="Enter authorized signatory name.."
                                            value="{{$details->a_signatory_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="email1"
                                        class="col-sm-3 text-left control-label col-form-label">Authorized Signatory
                                        Designation :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="text"
                                            class="form-control" id="email1" name="signatory_designation"
                                            placeholder=" Enter authorized signatory designation.."
                                            value="{{$details->a_signatory_desi}}">
                                    </div>
                                </div>
                                <h4 class="card-title" style=" text-decoration-line: underline;">Case Timeline In Day :
                                </h4>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Case
                                        Timeline :</label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control" id="cono1" name="case_timeline"
                                            placeholder="Enter Case Timeline.." value="{{$details->a_case_timeline}}">
                                    </div>
                                </div>
                                @php
                                $other_person = json_decode($details->a_other_person_info);
                                @endphp
                                <h4 class="card-title" style=" text-decoration-line: underline;">Escalation Matrix upto
                                    3 level</h4>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-1 text-right control-label col-form-label">1.</label>
                                    <div class="col-sm-3">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Person Name" name="person_name[]"
                                            value="{{$other_person[0]->person_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Contact Number" name="person_phone[]"
                                            value="{{$other_person[0]->person_phone}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="email"
                                            class="form-control" placeholder="Email" name="person_email[]"
                                            value="{{$other_person[0]->person_email}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Designation" name="person_designation[]"
                                            value="{{$other_person[0]->person_designation}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-1 text-right control-label col-form-label">2.</label>
                                    <div class="col-sm-3">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Person Name" name="person_name[]"
                                            value="{{$other_person[1]->person_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Contact Number" id="cono1" name="person_phone[]"
                                            value="{{$other_person[1]->person_phone}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="email"
                                            class="form-control" placeholder="Email" name="person_email[]"
                                            value="{{$other_person[1]->person_email}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Designation" name="person_designation[]"
                                            value="{{$other_person[1]->person_designation}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-1 text-right control-label col-form-label">3.</label>
                                    <div class="col-sm-3">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Person Name" name="person_name[]"
                                            value="{{$other_person[2]->person_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Contact Number" id="cono1" name="person_phone[]"
                                            value="{{$other_person[2]->person_phone}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="email"
                                            class="form-control" placeholder="Email" name="person_email[]"
                                            value="{{$other_person[2]->person_email}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input
                                            type="text"
                                            class="form-control" placeholder="Designation" name="person_designation[]"
                                            value="{{$other_person[2]->person_designation}}">
                                    </div>
                                </div>
                                <h4 class="card-title" style=" text-decoration-line: underline;">Upload Documents </h4>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">PAN Card
                                        :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="file"
                                            class="form-control" id="cono1" placeholder="" name="pan_card">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">GST
                                        Certificate :</label>
                                    <div class="col-sm-8">
                                        <input
                                            type="file"
                                            class="form-control" id="cono1" placeholder="" name="gst">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-1"></div>
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Approved
                                        Quotation Documents : </label>
                                    <div class="col-sm-8">
                                        <input
                                            type="file"
                                            class="form-control" id="cono1" placeholder="" name="quotation_doc">
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body" style="display:flex;justify-content:end;">
                                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                         @endif
                            <!--client report form start end-->
                        </div>

                        <!-- Agreement tab end-->
                        <div class="tab-pane p-20" id="Report" role="tabpanel">
                            <div>
                                <h3 class="custom-heading">Report Layout</h3>
                                <table class="table table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Sr.Num.</th>
                                            <th scope="col">Verification Type</th>
                                            <th scope="col"> Selected Layout</th>
                                            <th scope="col">View</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Approve/Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($report_details as $report)
                                        <tr style="color:black;">
                                            <td>{{$report->id}}</td>
                                            <td>
                                                @if($report->project_type == 1)
                                                Address Verification
                                                @elseif($report->project_type == 2)
                                                Site Investigation
                                                @else
                                                Digital Address Verification
                                                @endif
                                            </td>
                                            <td>
                                                @if($report->layout_type == 1)
                                                Default
                                                @else
                                                Custom
                                                @endif
                                            </td>
                                            <td class="text-center"><a
                                                    href="{{route('report', ['id' => $report->id , 'layout_type' => $report->layout_type, 'layout_status' => $report->layout_status ] )}}"><button
                                                        class="btn btn-secondary btn-sm">View</button></a></td>
                                            <td class="text-center">
                                                @if($report->layout_status == 1)
                                                <button class="btn btn-warning btn-sm">Pending</button>
                                                @elseif($report->layout_status == 2)
                                                <button class="btn btn-success btn-sm">Approved</button>
                                                @elseif($report->layout_status == 3)
                                                <button class="btn btn-danger btn-sm">Edit</button>
                                                @else
                                                <button class="btn btn-secondary btn-sm">Unknown</button>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if($report->layout_type == 2)
                                                <a
                                                    href="{{route('report', ['id' => $report->id ,'layout_status' => $report->layout_status , 'layout_type' => 1 ] )}}"><button
                                                        class="btn btn-primary btn-sm">Default Layout</button></a>
                                                @else
                                                <a
                                                    href="{{route('report', ['id' => $report->id ,'layout_status' => $report->layout_status , 'layout_type' => 2 ] )}}"><button
                                                        class="btn btn-primary btn-sm">Custom Layout</button></a>
                                                <!--<a  data-toggle="modal" data-target="#rejectModal_{{$report->id}}"><button class="btn btn-primary btn-sm">Custom Layout</button></a>-->
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    <div class="card-body" style="display: flex; justify-content: end;">
                                    <form method="post" action="{{ route('updatestatus') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$details->id}}">
                                        <input type="hidden" name="report" value="report">
                                        <button type="submit" class="btn btn-success btn-sm">save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane p-20" id="Payment" role="tabpanel">
                            <h1 class="custom-heading">Payment Details</h1>
                            @if($details->progress_status>=4)
                            <table class="table  table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.Num.</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Charge(per case)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Address Verification</td>
                                        <td>{{$details->address_charge}} ₹</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Site Investigation Charge</td>
                                        <td>{{$details->site_charge}} ₹</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Digital Verification</td>
                                        <td>{{$details->digital_charge}} ₹</td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <div class="row">
                                <div class=" col-lg-3"> </div>
                                <div
                                    class=" col-lg-6 custom-box d-flex flex-column justify-content-center align-items-center">
                                    <h4>Waiting for admin to update verification charges..</h4>
                                </div>
                                <div class=" col-lg-3"> </div>
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane p-20" id="Status" role="tabpanel">
                            @if($details->progress_status==4&&$details->remark_status==0)
                            <div class="row">
                                <div class=" col-lg-3"> </div>
                                <div
                                    class=" col-lg-6 custom-box d-flex flex-column justify-content-center align-items-center">
                                    <h1>Congratulations..</h1>
                                    <h3>You have successfully onboarded.</h3>
                                </div>
                                <div class=" col-lg-3"></div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal for verification report-->
<div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="approvalModalLabel">You cannot save the details. Please ensure the following are approved  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                     <p class="mb-0 h5 ">{!! str_replace(',', ',<br>', $msg) !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--modal for verification report-->
@endsection