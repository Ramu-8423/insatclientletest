@extends('admin.body.adminmaster')
@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
       
    <div class="d-flex">
          <div class="mr-auto p-2"> <h2>Preview</h2></div>
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
    <div class="col-md-3 clo-sm-6 col-lg-2">
        <div class="card text-center">
                    <h4>Metro Charge</h4>
                    <p><strong>1234</strong></p>
        </div>
    </div> 
    </div>
    
    
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Uploaded Case Count</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Project Type</strong></th>
                                        <th scope="col"><strong>Case Count</strong></th>
                                        <th scope="col"><strong>Date</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       <td scope="col">dsjgsahj</td>
                                        <td scope="col">shjbxnSA</td>
                                        <td scope="col">VSDNB</td>
                                        <td scope="col">SBN</td>
                                    </tr>
                                </tbody>
                            </table>

                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
@endsection
