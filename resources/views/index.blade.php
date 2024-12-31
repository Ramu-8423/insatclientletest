@extends('admin.body.adminmaster')


@section('admin')   



<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                   
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="fa fa-globe m-b-5 font-16"></i></h1>
                        <h5 class=" text-white m-b-0 m-t-5">{{$totals->total_case}}</h5>
                        <h6 class="text-white">All Cases</h6>
                    </div>
                </div>
            </div>
            
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="fa fa-user m-b-5 font-16"></i></h1>
                        <h5 class="text-white m-b-0 m-t-5">{{ $totals->pending_case + $pendings_count }}</h5>
                        <h6 class="text-white">Pending Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="fa fa-plus m-b-5 font-16"></i></h1>
                        <h5 class="text-white m-b-0 m-t-5">{{$totals->insuff_case}}</h5>
                        <h6 class="text-white">Insuff Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                   
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="fa fa-tag m-b-5 font-16"></i></h1>
                        <h5 class=" text-white m-b-0 m-t-5">{{$totals->rejected_case}}</h5>
                        <h6 class="text-white">Rejected Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                   
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="fa fa-table m-b-5 font-16"></i></h1>
                        <h5 class=" text-white m-b-0 m-t-5">{{$totals->re_open_case}}</h5>
                        <h6 class="text-white">Reopen Cases</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="fa fa-cart-plus m-b-5 font-16"></i></h1>
                        <h5 class="text-white m-b-0 m-t-5">{{$totals->completed_case}}</h5>
                        <h6 class="text-white">Completed Cases</h6>
                    </div>
                </div>
            </div>
        </div>
        
        

<style>
    .active-link {
        border-bottom: 2px solid gray; /* Color of the underline */
        padding-bottom: 5px; /* Space between text and line */
        color: #007bff; /* Color of the active text */
        font-weight: bold; /* Optional: to ensure the text remains bold */
    }
    .btn-link {
        color: #007bff; /* Default color for the links */
    }
    .btn-link:hover {
        color: #0056b3; /* Color on hover */
    }
</style>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled row g-3">
                    <!-- First Row -->
                    <li class="col-6 col-md-2-4 col-lg-2">
                        <a href="{{ route('dashboard', 0) }}" class="btn btn-link fw-bold-4 {{ $status_id == 0 ? 'active-link' : '' }}">
                            All Cases <b style="color:{{ $status_id == 0 ? '#a400ff;font-size:1rem;' : '#4c5d45' }}">({{$totals->total_case}})</b>
                        </a>
                    </li>
                    
                    <li class="col-6 col-md-2-4 col-lg-2">
                        <a href="{{ route('dashboard', 1) }}" class="btn btn-link fw-bold-4 {{ $status_id == 1 ? 'active-link' : '' }}">
                            Pending Cases <b style="color:{{ $status_id == 1 ? '#a400ff;font-size:1rem;' : '#4c5d45' }}">({{$totals->pending_case + $pendings_count}})</b>
                        </a>
                    </li>
                    <li class="col-6 col-md-2-4 col-lg-2">
                        <a href="{{ route('dashboard', 2) }}" class="btn btn-link fw-bold-4 {{ $status_id == 2 ? 'active-link' : '' }}">
                            Insuff Cases <b style="color:{{ $status_id == 2 ? '#a400ff;font-size:1rem;' : '#4c5d45' }}">({{$totals->insuff_case}})</b>
                        </a>
                    </li>
                    <li class="col-6 col-md-2-4 col-lg-2">
                        <a href="{{ route('dashboard', 18) }}" class="btn btn-link fw-bold-4 {{ $status_id == 18 ? 'active-link' : '' }}">
                            Rejected Cases <b style="color:{{ $status_id == 18 ? '#a400ff;font-size:1rem;' : '#4c5d45' }}">({{$totals->rejected_case}})</b>
                        </a>
                    </li>
                    <li class="col-6 col-md-2-4 col-lg-2">
                        <a href="{{ route('dashboard', 5) }}" class="btn btn-link fw-bold-4 {{ $status_id == 5 ? 'active-link' : '' }}">
                            Reopen Cases <b style="color:{{ $status_id == 5 ? '#a400ff;font-size:1rem;' : '#4c5d45' }}">({{$totals->re_open_case}})</b>
                        </a>
                    </li>

                    <!-- Second Row -->
                    <li class="col-6 col-md-2-4 col-lg-2">
                        <a href="{{ route('dashboard', 8) }}" class="btn btn-link fw-bold-4 {{ $status_id == 8 ? 'active-link' : '' }}">
                            Completed Cases <b style="color:{{ $status_id == 8 ? '#a400ff;font-size:1rem;' : '#4c5d45' }}">({{$totals->completed_case}})</b>
                        </a>
                    </li>
                    
                   
                </ul>
            </div>
        </div>
    </div>
</div>

        
        
        <!-- ============================================================== -->
        <!-- New Container for Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="full graph_head">
            					<div class="row justify-content-between" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px;">
            						<form id="filterForm" class="col-auto" method="post" action=" {{route('dashboard',$status_id)}}">
            						    
            							@csrf
            							<div class="row align-items-center">
            								<div class="col-auto">
            									<h4 style="color: #333;">Filter Record - </h4>
            								</div>
            				
            				
            					           <div class="col-auto">
            				<input type="hidden"  class="form-control" id="candidate_name" name="status_id" style="background-color: #fff; color: #333;" value="{{$status_id}}">
            								</div>
            								
            								<div class="col-auto">
            									<input type="text"  step="any" class="form-control" id="candidate_name" name="candidate_name" style="background-color: #fff; color: #333;" placeholder="Enter Candidate Name">
            								</div>
            								
            								<div class="col-auto">
            									<input type="varchar"  class="form-control" id="email_id" name="email_id" style="background-color: #fff; color: #333;" placeholder="Enter Email ID">
            								</div>
            								
            								<div class="col-auto">
            									<input type="number"  step="any" class="form-control" id="mobile" name="mobile" style="background-color: #fff; color: #333;" placeholder="Enter Mobile Number">
            								</div>
            
            								<div class="col-auto">
            									<button type="submit" name="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">Submit</button>
            								</div>
            							</div>
            						</form>
            						<div class="col-auto">
            						<form method="post" action="{{ route('reset_filters_users')}}">
            								@csrf
            								<button type="submit" name="submit" class="btn btn-secondary">Reset Filters</button>
            							</form>
            						</div>
            					</div>
            
            				</div>
                        <div class="table-responsive">
                          <table class="table table-hover" style="white-space: nowrap;">
                              <thead>
                                 <tr>
                                    <th scope="col"><strong>Case ID</strong></th>
                                    <th scope="col"><strong>Employee ID</strong></th>
                                    <th scope="col"><strong>Location</strong></th>
                                    <th scope="col"><strong>Project Type</strong></th>
                                    <th scope="col"><strong>Pincode</strong></th>
                                     <th scope="col"><strong>Case Status</strong></th>
                                    <th scope="col"><strong>Candidate Name</strong></th>
                                    <th scope="col"><strong>Mobile</strong></th>
                                    <th scope="col"><strong>Email</strong></th>
                                    <th scope="col"><strong>Father Name</strong></th>
                                    <th scope="col"><strong>Mother Name</strong></th>
                                    <th scope="col"><strong>Address Type</strong></th>
                                    <th scope="col"><strong>Address</strong></th>
                                    <th scope="col"><strong>City</strong></th>
                                    <th scope="col"><strong>State</strong></th>
                                    <th scope="col"><strong>Period Of Stay From</strong></th>
                                    <th scope="col"><strong>Period Of Stay To</strong></th>
                                    <th scope="col"><strong>Contact Person Name</strong></th>
                                    <th scope="col"><strong>Person Designation</strong></th>
                                    <th scope="col"><strong>Site Vendor Name</strong></th>
                                    <th scope="col"><strong>GST Number</strong></th>
                                    <th scope="col"><strong>PAN Card Number</strong></th>
                                    
                                    <th scope="col"><strong>Case Rcv. Date</strong></th>
                                    <th scope="col"><strong>Case End Date</strong></th>
                                    <th scope="col"><strong>Allocation Date</strong></th>
                                 
                                    <th scope="col"><strong>Case Closer Date</strong></th>
                                    <th scope="col"><strong>Case Completed Date</strong></th>
                                    
                                    <th scope="col"><strong>Insuff Date</strong></th>
                                    <th scope="col"><strong>Rejected Date</strong></th>
                                    <th scope="col"><strong>Reopen Date</strong></th>
                                    
                                    <th scope="col"><strong>Action</strong></th>
                                    @if($status_id==8)
                                    <th scope="col"><strong>Report</strong></th>
                                    @endif
                                </tr>
                             </thead>
                          <tbody>
                            @foreach($cases as $case)
                            <tr>
                                <td>{{ $case->case_id }}</td>
                                <td>{{ $case->employee_id??'N/A'; }}</td>
                                <td>{{ $case->location??'N/A'; }}</td>
                                <td>{{ $case->project_type ==1?'Address Verification':'Site Investigation'}}</td>
                                <td>{{ $case->pincode??'N/A'; }}</td>
                                <td>
                             @if($case->approved_status == 0 || $case->approved_status == 2)
                                     {{ 'Pending' }}
                             @elseif($case->case_status==1)
                                    {{ 'Allocated' }}
                             @elseif($case->case_status==2)
                                    {{ 'Insuff' }}
                             @elseif($case->case_status==3)
                                    {{ 'Hold' }}
                             @elseif($case->case_status==4)
                                    {{ 'Rejected By Vendor' }}
                             @elseif($case->case_status==5)
                                    {{ 'Re-Open' }}
                             @elseif($case->case_status==6)
                                    {{ 'Overdue' }}
                             @elseif($case->case_status==7)
                                    {{ 'In Review' }}
                             @elseif($case->case_status==8)
                                    {{ 'Completed' }}
                             @elseif($case->case_status==9)
                                    {{ 'Accepted' }}
                             @elseif($case->case_status==11)
                                    {{ 'Runner State' }}
                             @elseif($case->case_status==12)
                                    {{ 'On the way' }}
                             @elseif($case->case_status==13)
                                    {{ 'Rport Submitted by Vendor' }}
                             @elseif($case->case_status==14)
                                    {{ 'Closed' }}
                             @elseif($case->case_status==15)
                                  Rejected By admin
                              @elseif($case->case_status==16)
                                 Allocated
                              @elseif($case->case_status==17)
                                  Insuff Cleared
                            @elseif($case->case_status==18)
                               Rejected By Client
                             @elseif($case->case_status==19)
                              Re-open by client
                            @else
                               'Unknown Status'
                             @endif
                                
                                </td>
                                <td>{{ $case->candidate_name??'N/A'}}</td>
                                <td>{{ $case->mobile??'N/A'}}</td>
                                <td>{{ $case->email??'N/A'}}</td>
                                <td>{{ $case->father_name??'N/A'}}</td>
                                <td>{{ $case->mother_name??'N/A'}}</td>
                                <td>{{ $case->address_type??'N/A'}}</td>
                                <td>{{ $case->address??'N/A'}}</td>
                                <td>{{ $case->city??'N/A'}}</td>
                                <td>{{ $case->state??'N/A'}}</td>
                                <td>{{ $case->period_of_stay_from??'N/A'}}</td>
                                <td>{{ $case->period_of_stay_to??'N/A'}}</td>
                                <td>{{ $case->contact_person_name??'N/A'}}</td>
                                <td>{{ $case->contact_person_desi??'N/A'}}</td>
                                <td>{{ $case->site_vendor_name??'N/A'}}</td>
                                <td>{{ $case->gst_number??'N/A'}}</td>
                                <td>{{ $case->pan_card_num??'N/A'}}</td>
                                
                                <td>{{ $case->case_rcv_date??'N/A'}}</td>
                                <td>{{ $case->end_date??'N/A'}}</td>
                                <td>{{ $case->allocation_date??'N/A'}}</td>
                                <td>{{ $case->case_closer_date??'N/A'}}</td>
                                <td>{{ $case->case_completed_date??'N/A'}}</td>
                                <td>{{ $case->insuff_date??'N/A'}}</td>
                                <td>{{ $case->rejected_date??'N/A'}}</td>
                                <td>{{ $case->reopen_date??'N/A'}}</td>
                                
                                <td>
                                    <a href="{{route('casetracking',$case->case_id)}}">
                                        <button class="btn btn-primary btn-sm">view</button>
                                    </a>
                                </td>
                                
                                @if($status_id==8)
                                <td>
                                    <a href="{{route('download_report',
                                    ['client_id'=>$case->client_id,'project_type'=>$case->project_type,'case_id'=>$case->case_id])}}">
                                        <button class="btn btn-success btn-sm">view</button>
                                    </a>
                                </td>
                                @endif
                                
                            </tr>
                            @endforeach
                            
                            @if($status_id==1)
                              @foreach($pendings as $pending)
                              
                             <tr>
                                <td>{{ $pending->case_id }}</td>
                                <td>{{ $pending->employee_id??'N/A'; }}</td>
                                <td>{{ $pending->location??'N/A'; }}</td>
                                <td>{{ $pending->project_type ==1?'Address Verification':'Site Investigation'}}</td>
                                <td>{{ $pending->pincode??'N/A'; }}</td>
                                <td>Not Allocated</td>
                                <td>{{ $pending->candidate_name??'N/A'}}</td>
                                <td>{{ $pending->mobile??'N/A'}}</td>
                                <td>{{ $pending->email??'N/A'}}</td>
                                <td>{{ $pending->father_name??'N/A'}}</td>
                                <td>{{ $pending->mother_name??'N/A'}}</td>
                                <td>{{ $pending->address_type??'N/A'}}</td>
                                <td>{{ $pending->address??'N/A'}}</td>
                                <td>{{ $pending->city??'N/A'}}</td>
                                <td>{{ $pending->state??'N/A'}}</td>
                                <td>{{ $pending->period_of_stay_from??'N/A'}}</td>
                                <td>{{ $pending->period_of_stay_to??'N/A'}}</td>
                                <td>{{ $pending->contact_person_name??'N/A'}}</td>
                                <td>{{ $pending->contact_person_desi??'N/A'}}</td>
                                <td>{{ $pending->site_vendor_name??'N/A'}}</td>
                                <td>{{ $pending->gst_number??'N/A'}}</td>
                                <td>{{ $pending->pan_card_num??'N/A'}}</td>
                                
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                
                                <td>N/A</td>
                                
                                @if($status_id==8)
                                <td> N/A</td>
                                @endif
                            </tr>
                            
                              @endforeach
                            @endif

                        </tbody>
                    </table>



                            
                            
                                        
                                        <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $cases->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cases->url(1) }}" aria-label="First">
                            <span aria-hidden="true">&laquo;&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item {{ $cases->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cases->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
            
                    @php
                        $half_total_links = floor(9 / 2);
                        $from = $cases->currentPage() - $half_total_links;
                        $to = $cases->currentPage() + $half_total_links;
            
                        if ($cases->currentPage() < $half_total_links) {
                            $to += $half_total_links - $cases->currentPage();
                        }
            
                        if ($cases->lastPage() - $cases->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($cases->lastPage() - $cases->currentPage()) - 1;
                        }
                    @endphp
            
                    @for ($i = $from; $i <= $to; $i++)
                        @if ($i > 0 && $i <= $cases->lastPage())
                            <li class="page-item {{ $cases->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $cases->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
            
                    <li class="page-item {{ $cases->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $cases->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <li class="page-item {{ $cases->currentPage() == $cases->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cases->url($cases->lastPage()) }}" aria-label="Last">
                            <span aria-hidden="true">&raquo;&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
    <!-- footer -->

    <!-- <footer class="footer text-center">-->
    <!--    All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.-->
    <!--</footer> -->
    
</div>
</div>


@endsection
