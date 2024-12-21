@extends('admin.body.adminmaster')

@section('admin')
@php
 $data= json_decode($detail->reg_tracking);
@endphp

<style>
input {
    box-sizing: border-box;
    border: 1px solid #82eb82 !important;
}

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
<div class="page-wrapper">
    <div class="mr-3" style="display:flex;justify-content:end;">
        <a style="margin-left:10px;"><button class="btn btn-primary btn-sm mt-3 mr-2" onclick="history.back()">back</button></a>
    </div>
    <div class="container-fluid ">
        
        @if($details->project_type==1||$details->project_type==3)
        
            <div class="row" style="margin-bottom:10px;">
                <div class="col-12 text-center">
                    <div class="header p-1">
                        <img src="{{env('APP_ADMIN_URL')}}images/locate.jpeg" alt="Logo" class="logo float-left" width="70px" height="70px" style="padding-left:5px;border-radius:50%;">
                        <h4>INTUITIVE INFO SERVICES PVT. LTD.</h4>
                        <p>BETTER HIRING | SMART SCREENING</p>
                    </div>
                </div>
             </div>
        
        
        <table class="table table-bordered responcive">
            <tbody id="sortable-body">
                @php
                $ver = json_decode($details->default_layout);
                @endphp
                @foreach($ver as $value)
                @php
                $htmlContent = json_decode($column_layout->$value);
                @endphp
                {!! Blade::render($htmlContent, ['details' => $details]) !!}
                @endforeach
            </tbody>
        </table>
        
                <div class="row" style="margin-bottom:3px;">
                    <div class="col-12 text-center">
                        <div>
                            <p style="text-align:left;font-size:15px;">****** In case the field executive asks for money or other favors, request you do not entertain the same, contact us immediately on the number :+91 0120 4149741. You can also contact us via email: supportscs@iis-pl.com.</p>
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-8" style="text-align:left;font-size:15px;">
                        <p>यदि क्षेत्र के कार्यकारी किसी भी तरीके से पैसे या अन्य वस्तु के लिए आग्रह करता है तो आपसे निवेदन है की इस नंबर +91 120 4149741  पर तुरंत सूचना करे l आप हमें  ई -मेल के माध्यम से सम्पर्क कर सकते है : Email : supportcs@iis-pl.com</p>
                    </div>
                    <div class="col-sm-2">
                        <img src="{{env('APP_ADMIN_URL')}}images/nogift.jpeg" style="width:100px;height:100px;">
                    </div>
                    <div class="col-sm-2">
                        <img src="{{env('APP_ADMIN_URL')}}images/nocash.jpeg" style="width:100px;height:100px;">
                    </div>
                 </div>
        
        @else
        
             <div class="row" style="margin-bottom:10px;">
                    <div class="col-12 text-center">
                            <img src="{{asset('images/locate.jpeg')}}" alt="Logo" width="150px" height="70px">
                    </div>
                 </div>
                 <div class="row" style="margin-bottom:10px;">
                    <div class="col-12 text-center">
                            <p>Garage / Automobile Verification (Field Visit Form)</p>
                    </div>
                 </div>
                 
                 <div class="row d-flex justify-content-between align-item-center">
                       <p style="margin-left:10px;margin-bottom:0 !important;"><strong>IL Interaction Id : </strong> &nbsp;&nbsp; 1234567</p>
                       <p style="margin-right:10px;margin-bottom:0 !important;"><strong>Date : </strong>&nbsp;&nbsp; 16/02/2001</p> 
                 </div>
                 
                 <div class="row d-flex justify-content-between align-item-center" style="margin-bottom:10px;">
                      <p style="padding-left:10px;margin-bottom:0 !important;"><strong>Executive Name : </strong> &nbsp;&nbsp; Akash Kumar Prajapati</p>  
                       <p style="padding-right:10px;margin-bottom:0 !important;"><strong>Time : </strong>&nbsp;&nbsp; 10:05 AM</p> 
                 </div>

                 <table class="table table-bordered">
                    <tbody>
                         <tr>
                            <th colspan="6" style="width: 33%;">Client / Company Name </th>
                            <td colspan="6" style="width: 67%;">@if(isset($details->candidate_name)){{ $details->candidate_name }}@else N/A @endif</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Address</th>
                            <td colspan="6" style="width: 67%;">@if(isset($details->candidate_name)){{ $details->candidate_name }}@else N/A @endif</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Business Premises</th>
                            <td colspan="6" style="width: 67%;">
                                <strong>Owned</strong> &nbsp;( ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Rented</strong>&nbsp; ( )
                            </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Tenure of their Business</th>
                            <td colspan="6" style="width: 67%;">
                                <strong>since</strong> - &nbsp; 1997-09-09 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>to</strong> - &nbsp; 2009-10-10
                            </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Type</th>
                            <td colspan="6" style="width: 67%;">
                                <strong>Office</strong> &nbsp;( ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Shop</strong>&nbsp; ( ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Garage</strong>&nbsp; ( ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Other</strong>&nbsp; ( ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Neighbour Check (i)</th>
                            <td colspan="6" style="width: 67%;">
                               <strong>Name / Designation and Add : </strong> 
                             </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Neighbour Check (ii) </th>
                            <td colspan="6" style="width: 67%;">
                               <strong>  Name / Designation and Add :</strong>  
                             </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Land Mark</th>
                            <td colspan="6" style="width: 67%;"></td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Security Confirmation</th>
                            <td colspan="6" style="width: 67%;">
                               <strong>  If yes, then required security guard name : </strong> 
                            </td>
                         </tr>
                          <tr>
                            <th colspan="6" style="width: 33%;">Name of Signboard </th>
                            <td colspan="6" style="width: 67%;"></td>
                         </tr>
                          <tr>
                            <th colspan="6" style="width: 33%;">Photograph (Yes / No) </th>
                            <td colspan="6" style="width: 67%;">
                                <p style="margin-bottom:4px !important;"><strong>Car Washing Area :  </strong>&nbsp;&nbsp;&nbsp; Yes  ( ) &nbsp;&nbsp;&nbsp;No ( )</p>
                                <p style="margin-bottom:4px !important;"><strong>Car Repair Centre : </strong>&nbsp;&nbsp;&nbsp; Yes ( )  &nbsp;&nbsp;&nbsp;No ( ) </p>&nbsp;&nbsp;&nbsp;
                                <p style="margin-bottom:4px !important;"><strong>Car Paint Booth :   </strong>&nbsp;&nbsp;&nbsp; Yes   ( )&nbsp;&nbsp;&nbsp;No ( )</p>
                                <p style="margin-bottom:4px !important;"><strong>Car Lift Machine :  </strong>&nbsp;&nbsp;&nbsp; Yes  ( ) &nbsp;&nbsp;&nbsp;No ( )</p>
                                <p style="margin-bottom:4px !important;"><strong>Separate Office :   </strong>&nbsp;&nbsp;&nbsp; Yes   ( )&nbsp;&nbsp;&nbsp;No ( )</p>
                                <p style="margin-bottom:4px !important;"><strong>Customer Lounge :   </strong>&nbsp;&nbsp;&nbsp; Yes   ( )&nbsp;&nbsp;&nbsp;No ( )</p>
                            </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Was the owner of the vendor called before visiting the address? </th>
                            <td colspan="6" style="width: 67%;"> &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Was the mobile number correct?</th>
                            <td colspan="6" style="width: 67%;"> &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         
                          <tr>
                            <th colspan="6" style="width: 33%;">Document Verification Details</th>
                            <td colspan="6" style="width: 67%;"><strong>Compulsory Shop & Establishment Certificate or GST Certificate - </strong>  &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Name of the proprietor or Partners</th>
                            <td colspan="6" style="width: 67%;"></td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Who approached them from Lombard</th>
                            <td colspan="6" style="width: 67%;"></td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">In past, have you done business with the Lombard </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         
                          <tr>
                            <th colspan="6" style="width: 33%;">Is your company ever black listed with other company/ or establishments </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Is your company ever black listed with other company/ or establishments  </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Is any of your relative or friend working with Lombard</th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( ) &nbsp; No ( )</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Has and action been initiated by law enforcement against your company </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( ) &nbsp; No ( )  If yes, Provide details: </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Stamp & Signature of Client / Company </th>
                            <td colspan="6" style="width: 67%;">
                                <img src="{{asset('images/signature.png')}}" alt="signature" height="30px" width="100px">
                            </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Final Comment</th>
                            <td colspan="6" style="width: 67%;"></td>
                         </tr>
                          
                    </tbody>
                </table>
                       
                     <div class="row">
                         <div class="col-sm-5" style="padding-left:2rem;"><strong>IL Manager Name : </strong> &nbsp;&nbsp; xyz abcd</div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-5" style="padding-left:1rem;"><strong>Surveyor’s Name : </strong>&nbsp;&nbsp; xyz abcd</div>
                     </div>  
                     
                      <div class="row">
                         <div class="col-sm-5" style="padding-left:2rem;"><strong>Seal & Signature : </strong> &nbsp;&nbsp; 
                         <img src="{{asset('images/signature.png')}}" alt="signature" height="30px" width="100px">
                         </div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-5" style="padding-left:1rem;"><strong>Signature : </strong>&nbsp;&nbsp; 
                         <img src="{{asset('images/signature.png')}}" alt="signature" height="30px" width="100px">
                         </div>
                     </div>  
                     
                      <div class="row">
                         <div class="col-sm-5" style="padding-left:2rem;"><strong>Date : </strong> &nbsp;&nbsp; 16-02-2001</div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-5" style="padding-left:1rem;"><strong>Date : </strong>&nbsp;&nbsp; 16-02-2001</div>
                     </div>  
        @endif
    </div>
</div>
<div class="card-body" style="display:flex;justify-content:end;">
 @if($data->report_status == 0 || $data->report_status == 2)
    <a href="{{ route('approve.layout.status', ['client_id' => $details->client_id, 'layout_status' => $layout_status , 'layout_type' => 1, 'id' => $details->id]) }}" style="margin-left:10px;">
    <button class="btn btn-success btn-sm">Approve</button>
</a>
  @endif
</div>
   <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                            <script>
                            @if($data->report_status == 0 || $data->report_status == 2)
                                var client_id_js = @json($id);
                                 @endif
                                var sortable = new Sortable(document.getElementById('sortable-body'), {
                                    animation: 150,
                                    handle: 'tr', // Allow row dragging
                                    onEnd: function (evt) {
                                        var order = [];
                                        // Collect the order of rows after drag
                                        document.querySelectorAll('#sortable-body tr[data-id]').forEach((row) => {
                                            order.push(row.getAttribute('data-id'));
                                        });

                                        // Log the new order in the console
                                        console.log('New order:', order);

                                        // Send the new order to the server
                                        fetch('{{ route("client_details_order") }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                                            },
                                            body: JSON.stringify({
                                                order: order,
                                                id: client_id_js,
                                            }) // Send the new order as JSON
                                        }).then(response => {
                                            if (response.ok) {
                                                console.log(response.ok);
                                                console.log('Order updated successfully.');
                                            } else {
                                                console.log('Error updating the order.');
                                            }
                                        }).catch(error => {
                                            console.error('Error:', error);
                                        });
                                    }
                                });
                            </script>

@endsection