@extends('admin.body.adminmaster')
@section('admin')
<style>
.responsive-image {
    width: 100%;
    height: 500px;
    object-fit: contain; /* Ensures the image is fully visible */
    display: block;
    margin: 0 auto;
}
@php
 $data= json_decode($details->reg_tracking);
@endphp
</style>
<div class="page-wrapper">
    <div class="container-fluid">
         @if (session('success'))
        <div class="alert alert-success alert-block mt-3">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-block mt-3">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{ session('error') }}</strong>
        </div>
        @endif
        <div class="card-body" style="display:flex;justify-content:end;">
             @if($data->report_status == 0 || $data->report_status == 2)
            <a data-toggle="modal" data-target="#rejectModal_{{$report->id}}">
                @if($report->custom_layout == null)
                <button class="btn btn-primary btn-sm ml-2">Upload Custom Layout</button>
                @else
                <button class="btn btn-warning btn-sm ml-2">Update Custom Layout</button>
                @endif
            </a>
            @if($report->file)
            <a href="{{ route('approve.layout.status', ['client_id' => $details->id, 'layout_status' => $report->layout_status, 'layout_type' => 2 , 'id' => $report->id]) }}"
                style="margin-left:10px;"><button class="btn btn-success btn-sm ml-2">Approve</button></a>
            @endif
           @endif
            <a style="margin-left:10px;"><button class="btn btn-primary btn-sm ml-2"
                    onclick="history.back()">back</button></a>
                   
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div style="display: flex; justify-content: center; align-items: center; height: 500px;">
       @if($report->file)
        @if(pathinfo($report->file, PATHINFO_EXTENSION) == 'pdf')
            <iframe src="{{ $report->file }}" width="100%" height="100%" style="border: none;"
                class="responsive-image"></iframe>
        @else
            <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                <a href="{{ $report->file }}" target="_blank">
                    <img src="{{ $report->file }}" alt="Image" class="responsive-image">
                </a>
            </div>
        @endif
    @else
      <h2>Upload file</h2>
   <i class="m-r-10 mdi mdi-content-copy h1 ml-2"></i>
      
        
        
    @endif
</div>
            </div>
        </div>
        @php
        $report_layout_name =
        $report->project_type == 1 ? 'Custom Address Layout' :
        ($report->project_type == 2 ? 'Custom Site Investigation Layout' :
        ($report->project_type == 3 ? 'Custom Digital Address Verification Layout' :
        'Default Layout'));
        @endphp
        <!-- Modal for custom layout image upload -->
        <div class="modal fade" id="rejectModal_{{$report->id}}" tabindex="-1"
            aria-labelledby="rejectModalLabel_{{$report->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width:600px; width:90%; margin: auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="mt-2">
                            {{ $report_layout_name }}</h5>
                        <button type="button" class="btn-close ml-auto btn-sm" data-dismiss="modal" aria-label="Close"
                            style="background-color: #5e60a9; color: white; padding: 6px 12px; border-radius: 5px; cursor: pointer;">
                            Close
                        </button>
                    </div>
                    <div class="card">
                        <form class="form-horizontal" action="{{route('Customfile')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row justify-content-center">
                                </div>
                                <div class="form-group row">
                                    <!-- Hidden fields to store unique values for each report -->
                                    <input type="hidden" name="id" value="{{$report->id}}">
                                    <input type="hidden" name="layout_type" value="{{$report->layout_type}}">
                                    <input type="hidden" name="project_type" value="{{$report->project_type}}">
                                    <input type="hidden" name="client_id" value="{{$report->client_id}}">
                                    <input type="hidden" name="layout_status" value="{{$report->layout_status}}">
                                    <label for="customfile" class="col-sm-2 text-right control-label col-form-label">
                                        File</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="customfile" class="form-control" id="customfile"
                                            placeholder="Choose file here">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body text-center">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #5e60a9; color: white;">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    </div>
</div>
@endsection