@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Styles -->
        <style>
        body{
            color:#000000;
        }
            .responsive-table-container {
                width: 100%;
                overflow-x: auto;
            }
            .table th, .table td {
                vertical-align: middle;
                border: 1px solid #000;
                padding: 5px;
                line-height: 1;
            }
            .table th {
                color: black;
                font-weight: bold;
            }
            .header {
                background-color: #2e2e61;
                color: #fff;
                text-align: center;
            }
            .sub-header {
                background-color: #d3d3d3;
                text-align: center;
                font-weight: bold;
            }
            .container {
                max-height: 100vh;
                overflow: hidden;
            }
            b {
                color: black;
                font-weight: bold;
            }
            @media screen and (max-width: 768px) {
                .table th, .table td {
                    font-size: 10px;
                    padding: 6px;
                }
                .header {
                    font-size: 12px;
                    padding: 8px;
                }
            }
            
            
           #content {
                width: 190mm; /* Content width within 10mm side margins */
                max-width: 190mm;
                font-size: 16px; /* Larger font size for better readability */
                margin: 0 auto; /* Center the content */
                padding: 10px; /* Optional padding for visual appeal */
            }


            
        </style>

        <!-- Back and Download Buttons -->
        <div class="d-flex justify-content-end mr-3">
            <button class="btn btn-primary btn-sm mt-3 mr-2 mb-2" onclick="history.back()">Back</button>
            <button class="btn btn-primary btn-sm mt-3 mr-2 mb-2" onclick="downloadPDF()">
                <i class="fas fa-download"></i> Download
            </button>
        </div>

        <!-- Table Content -->
        <div class="responsive-table-container" id="content">
            
    @php
          
          
          
function convertImageToBase64($imageUrl) {
    $ch = curl_init($imageUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $imageData = curl_exec($ch); // Get image data
    curl_close($ch); // Close the cURL session

    // Check if we got valid image data
    if (!$imageData) {
        return 'Image not found or failed to fetch!';
    }
    $base64Image = base64_encode($imageData);
    return 'data:image/png;base64,' . $base64Image; // Return Base64 image with MIME type
}
@endphp

@php
$nogift = convertImageToBase64('https://admin.instalocate.io/images/nogif.png');
$nocash = convertImageToBase64('https://admin.instalocate.io/images/nocash.jpg');
$instaocate1 = convertImageToBase64('https://admin.instalocate.io/images/instalocate1.png');
$instaocate2 = convertImageToBase64('https://admin.instalocate.io/images/instalocate3.png');

     if($project_type==1||$project_type==3){
          $resp_sign = env('APP_ADMIN_URL').$details->respondent_sign;
          $v_sign = env('APP_ADMIN_URL').$details->v_signature;
          $resp_sign = convertImageToBase64($resp_sign);
          $v_sign = convertImageToBase64($v_sign);
     }elseif($project_type==2){
        $comp_sign = env('APP_ADMIN_URL').$details->sign_comp;
        $il_sign = env('APP_ADMIN_URL').$details->il_sign;
        $v_signature = env('APP_ADMIN_URL').$details->v_signature;
        
        $comp_sign = convertImageToBase64($comp_sign);
        $il_sign = convertImageToBase64($il_sign);
        $v_signature = convertImageToBase64($v_signature);
     }
    
@endphp
                  
            
            @if($selected_report->project_type == 1 && $selected_report->layout_type == 1)
            
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-12 text-center">
                        <div class="header p-1">
                            <img src="{{ $instaocate1 }}" alt="Logo" class="logo float-left" width="100px" height="70px" style="padding-left:5px;">
                            <h4>INTUITIVE INFO SERVICES PVT. LTD.</h4>
                            <p>BETTER HIRING | SMART SCREENING</p>
                        </div>
                    </div>
                 </div>
                 
                <table class="table table-bordered">
                    <tbody>
                        @php
                            $order = json_decode($selected_report->default_layout);
                        @endphp
                        @foreach($order as $value)
                            @php
                                $htmlContent = json_decode($report_design->$value);
                            @endphp
                            {!! Blade::render($htmlContent, ['details' => $details,'resp_sign'=>$resp_sign,'v_sign'=>$v_sign]) !!}
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
                        <img src="{{$nogift}}" style="width:100px;height:100px;">
                    </div>
                    <div class="col-sm-2">
                        <img src="{{$nocash}}" style="width:100px;height:100px;">
                    </div>
                 </div>
                
                
            @elseif($selected_report->project_type == 1 && $selected_report->layout_type == 2)
            
               @if($selected_report->custom_layout==null)
               <div class="row">
                   <div class="col-sm-12">
                    <p>You have selected custom layout for address verification report,your layout is not designed yet. Please contact to admin.</p>
                   </div>
               </div>
               @else
               @endif
             
            
            @elseif($selected_report->project_type == 2 && $selected_report->layout_type == 1)
            
                
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-12 text-center">
                            <img src="{{$instaocate2}}" alt="Logo" width="300px" height="70px">
                    </div>
                 </div>
                 <div class="row" style="margin-bottom:10px;">
                    <div class="col-12 text-center">
                            <p>Garage / Automobile Verification (Field Visit Form)</p>
                    </div>
                 </div>
                 
                 <div class="row d-flex justify-content-between align-item-center" style="margin-bottom:10px;">
                       <p style="margin-left:10px;margin-bottom:0 !important;"><strong>Case Id : </strong> &nbsp;&nbsp;{{$details->case_id}}</p>
                       <p style="margin-right:10px;margin-bottom:0 !important;"><strong>Date : </strong>&nbsp;&nbsp;
                       {{ date('Y-m-d', strtotime($details->created_at)) }}
                       </p> 
                 </div>
                 
                 {{--
                 <div class="row d-flex justify-content-between align-item-center" >
                      <p style="padding-left:10px;margin-bottom:0 !important;"><strong>Executive Name : </strong> &nbsp;&nbsp; Akash Kumar Prajapati</p>  
                       <p style="padding-right:10px;margin-bottom:0 !important;"><strong>Time : </strong>&nbsp;&nbsp; 10:05 AM</p> 
                 </div>
                    --}}
                    
                 <table class="table table-bordered">
                    <tbody>
                         <tr>
                            <th colspan="6" style="width: 33%;">Client / Company Name </th>
                            <td colspan="6" style="width: 67%;">{{$details->a_company_name}}</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Address</th>
                            <td colspan="6" style="width: 67%;">{{$details->address}}</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Business Premises</th>
                            <td colspan="6" style="width: 67%;">
                                <strong>Owned</strong> &nbsp;
                                ( {{$details->business_permises==1?'✔️':''}})
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Rented</strong>&nbsp;
                                ({{$details->business_permises !=1?'✔️':''}} )
                            </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Tenure of their Business</th>
                            <td colspan="6" style="width: 67%;">
                                <strong>since</strong> - &nbsp; {{ date('Y-m-d', strtotime($details->tenure_since)) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>to</strong> - &nbsp; {{ date('Y-m-d', strtotime($details->tenure_to)) }}
                            </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Type</th>
                            <td colspan="6" style="width: 67%;">
                                <strong>Office</strong> &nbsp;( {{$details->site_type==1?'✔️':''}} ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Shop</strong>&nbsp; ( {{$details->site_type==2?'✔️':''}}) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Garage</strong>&nbsp; ( {{$details->site_type==3?'✔️':''}}) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Other</strong>&nbsp; ( {{$details->site_type==4?'✔️':''}} ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Neighbour Check (i)</th>
                            <td colspan="6" style="width: 67%;">
                               <strong>Name / Designation and Add : &nbsp;</strong> {{$details->neighbour_check_1}}
                             </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Neighbour Check (ii) </th>
                            <td colspan="6" style="width: 67%;">
                               <strong>  Name / Designation and Add : &nbsp;</strong>{{$details->neighbour_check_2}}
                             </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Land Mark</th>
                            <td colspan="6" style="width: 67%;">{{$details->landmark??'N/A'}}</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Security Confirmation</th>
                            <td colspan="6" style="width: 67%;">
                               <strong>  If yes, then required security guard name : </strong> {{$details->security_confirmation??'N/A'}}
                            </td>
                         </tr>
                          <tr>
                            <th colspan="6" style="width: 33%;">Name of Signboard </th>
                            <td colspan="6" style="width: 67%;">{{$details->signboard_name??'N/A'}}</td>
                         </tr>
                          <tr>
                            <th colspan="6" style="width: 33%;">Photograph (Yes / No) </th>
                            <td colspan="6" style="width: 67%;">
                                <p style="margin-bottom:4px !important;"><strong>Car Washing Area :  </strong>&nbsp;&nbsp;&nbsp; Yes  ( {{$details->car_wash != null?'✔️':''}} ) &nbsp;&nbsp;&nbsp;No ({{$details->car_wash == null?'✔️':''}} )</p>
                                <p style="margin-bottom:4px !important;"><strong>Car Repair Centre : </strong>&nbsp;&nbsp;&nbsp; Yes ({{$details->car_repair != null?'✔️':''}} )  &nbsp;&nbsp;&nbsp;No ( {{$details->car_repair==null?'✔️':''}}) </p>&nbsp;&nbsp;&nbsp;
                                <p style="margin-bottom:4px !important;"><strong>Car Paint Booth :   </strong>&nbsp;&nbsp;&nbsp; Yes   ( {{$details->car_paint != null?'✔️':''}})&nbsp;&nbsp;&nbsp;No ({{$details->car_paint==null?'✔️':''}} )</p>
                                <p style="margin-bottom:4px !important;"><strong>Car Lift Machine :  </strong>&nbsp;&nbsp;&nbsp; Yes  ({{$details->car_lift != null?'✔️':''}} ) &nbsp;&nbsp;&nbsp;No ( {{$details->car_lift==null?'✔️':''}})</p>
                                <p style="margin-bottom:4px !important;"><strong>Separate Office :   </strong>&nbsp;&nbsp;&nbsp; Yes   ( {{$details->separate_office != null?'✔️':''}} )&nbsp;&nbsp;&nbsp;No ({{$details->separate_office==null?'✔️':''}} )</p>
                                <p style="margin-bottom:4px !important;"><strong>Customer Lounge :   </strong>&nbsp;&nbsp;&nbsp; Yes   ({{$details->customer_lounge != null?'✔️':''}} )&nbsp;&nbsp;&nbsp;No ({{$details->customer_lounge==null?'✔️':''}} )</p>
                            </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Was the owner of the vendor called before visiting the address? </th>
                            <td colspan="6" style="width: 67%;"> &nbsp; Yes ({{$details->is_owner_call_bef == 1?'✔️':''}}) &nbsp; No ({{$details->is_owner_call_bef != 1?'✔️':''}} )</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Was the mobile number correct?</th>
                            <td colspan="6" style="width: 67%;"> &nbsp; Yes ({{$details->is_mobile_correct == 1?'✔️':''}} ) &nbsp; No ({{$details->is_mobile_correct != 1?'✔️':''}} )</td>
                         </tr>
                         
                          <tr>
                            <th colspan="6" style="width: 33%;">Document Verification Details</th>
                            <td colspan="6" style="width: 67%;"><strong>Compulsory Shop & Establishment Certificate or GST Certificate - </strong>  &nbsp; Yes ({{$details->doc_verification_det == 1?'✔️':''}} ) &nbsp; No ({{$details->doc_verification_det != 1?'✔️':''}} )</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Name of the proprietor or Partners</th>
                            <td colspan="6" style="width: 67%;">{{$details->partners_name??'N/A'}}</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Who approached them from Lombard</th>
                            <td colspan="6" style="width: 67%;">{{$details->name_appr_lomb??'N/A'}}</td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">In past, have you done business with the Lombard </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ({{$details->business_with_lom == 1?'✔️':''}}) &nbsp; No ( {{$details->business_with_lom != 1?'✔️':''}} )</td>
                         </tr>
                         
                          <tr>
                            <th colspan="6" style="width: 33%;">Is your company ever black listed with other company/ or establishments </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( {{$details->is_blacklist == 1?'✔️':''}}) &nbsp; No ( {{$details->is_blacklist != 1?'✔️':''}} )</td>
                         </tr>
                        
                         <tr>
                            <th colspan="6" style="width: 33%;">Is any of your relative or friend working with Lombard</th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( {{$details->relative_lamboard == 1?'✔️':''}} ) &nbsp; No ( {{$details->relative_lamboard != 1?'✔️':''}} )</td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Has and action been initiated by law enforcement against your company </th>
                            <td colspan="6" style="width: 67%;">  &nbsp; Yes ( {{$details->law_inforcement == 1?'✔️':''}} ) &nbsp; No ( {{$details->law_inforcement != 1?'✔️':''}} )  If yes, Provide details: </td>
                         </tr>
                         <tr>
                            <th colspan="6" style="width: 33%;">Stamp & Signature of Client / Company </th>
                            <td colspan="6" style="width: 67%;">
                                <img src="{{$comp_sign}}" alt="signature" height="30px" width="100px">
                            </td>
                         </tr>
                         
                         <tr>
                            <th colspan="6" style="width: 33%;">Final Comment</th>
                            <td colspan="6" style="width: 67%;">{{$details->final_comment??'N/A'}}</td>
                         </tr>
                          
                    </tbody>
                </table>
                       
                     <div class="row">
                         <div class="col-sm-5" style="padding-left:2rem;"><strong>IL Manager Name : </strong> &nbsp;&nbsp; {{$details->il_manager_name}}</div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-5" style="padding-left:1rem;"><strong>Surveyor’s Name : </strong>&nbsp;&nbsp; {{$details->v_name}}</div>
                     </div>  
                     
                      <div class="row">
                         <div class="col-sm-5" style="padding-left:2rem;"><strong>Seal & Signature : </strong> &nbsp;&nbsp; 
                         <img src="{{$il_sign}}" alt="signature" height="30px" width="100px">
                         </div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-5" style="padding-left:1rem;"><strong>Signature : </strong>&nbsp;&nbsp; 
                         <img src="{{$v_signature}}" alt="signature" height="30px" width="100px">
                         </div>
                     </div>  
                     
                      <div class="row">
                         <div class="col-sm-5" style="padding-left:2rem;"><strong>Date : </strong> &nbsp;&nbsp; {{ date("Y-m-d", strtotime($details->created_at)) }}</div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-5" style="padding-left:1rem;"><strong>Date : </strong>&nbsp;&nbsp; {{ date('Y-m-d', strtotime($details->created_at)) }}</div>
                     </div> 
                 
                  
            @elseif($selected_report->project_type == 2 && $selected_report->layout_type == 2)
            
                 @if($selected_report->custom_layout==null)
                   <div class="row">
                       <div class="col-sm-12">
                        <p>You have selected custom layout for address verification report,your layout is not designed yet. Please contact to admin.</p>
                       </div>
                   </div>
                 @else
                @endif
            
             @elseif($selected_report->project_type == 3 && $selected_report->layout_type == 1)
             
             <div class="row">
                 <p>Rport layout designing wip.</p>
             </div>
             
             
             @elseif($selected_report->project_type == 3 && $selected_report->layout_type == 2)
             
                @if($selected_report->custom_layout==null)
                   <div class="row">
                       <div class="col-sm-12">
                        <p>You have selected custom layout for address verification report,your layout is not designed yet. Please contact to admin.</p>
                       </div>
                   </div>
                  @else
                @endif
             
            @else
                <p>No data available for the selected report.</p>
            @endif
        </div>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

       <script>
 async function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'mm', 'a4'); // Portrait, A4 size in mm

    const content = document.getElementById('content');
    if (!content) {
        console.error("Content not found!");
        return;
    }

    try {
        // Capture the content using html2canvas with reduced resolution
        const canvas = await html2canvas(content, {
            scale: 2, // Reduced resolution to reduce file size
        });

        // Convert canvas image to JPEG with reduced quality
        const imgData = canvas.toDataURL('image/jpeg',1.6); // Reduced quality (0.6 is 60% of the original quality)

        // Define A4 dimensions and margins
        const pageWidth = 210; // A4 width in mm
        const pageHeight = 297; // A4 height in mm
        const marginLeft = 20; // Left margin
        const marginTop = 5; // Reduced top margin
        const bottomGap = 10; // Added gap from the bottom
        const contentWidth = pageWidth - 2 * marginLeft; // Content width within margins
        const contentHeight = (canvas.height * contentWidth) / canvas.width; // Maintain aspect ratio

        // Calculate the scaling factor to fit the content within a single page
        const scaleX = contentWidth / canvas.width;
        const scaleY = (pageHeight - marginTop - bottomGap) / canvas.height;
        const scaleFactor = Math.min(scaleX, scaleY); // Use the smaller scaling factor to fit both width and height

        // Add the image to the PDF with the calculated scaling factor
        doc.addImage(imgData, 'JPEG', marginLeft, marginTop, canvas.width * scaleFactor, canvas.height * scaleFactor);

        // Save the PDF
        doc.save('report.pdf');
    } catch (error) {
        console.error("Error generating PDF:", error);
    }
}


</script>

    </div>
</div>
@endsection
