@extends('admin.body.adminmaster')
@section('admin')
<style>
body {
    font-family: Arial, sans-serif;
    font-size: 14px;
    margin: 20px;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header img {
    max-height: 60px;
}

.header h5 {
    margin: 0;
    font-weight: bold;
}

.table {
    table-layout: fixed;
    width: 100%;
    max-height: 80vh;
    overflow-y: auto;
}

th,
td {
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

.bold {
    font-weight: bold;
}

.checkbox-label {
    display: flex;
    align-items: center;
}

.custom-checkbox {
    width: 17px;
    height: 17px;
}
</style>
</style>       
<div class="page-wrapper">
    <div class="container-fluid">
        <button id="downloadPdfBtn" style="margin-top: 20px;">Download as PDF</button>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


         <a href="{{route('downloadcostompdf')}}" class="button btn btn-primary">Download PDF</a>
         
     <div id="customDiv" >    
         
        <div class="card p-5">
            <div class="text-center">
                <h2>Company Details</h2>
                <h5>Garage / Automobile Verification (Field Visit Form)</h5>
            </div>
            <div class="row ml-4">
                <div class="col-sm-5">
                    <h5>IL Interaction Id : <span>dfghjk</span></h5>
                    <h5>Executive Name : <span>dfghj</span></h5>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <h5>Date : <span>26/11/2024</span></h5>
                    <h5>Time: 08:55 <span></span></h5>
                </div>
            </div>
            <table class="table table-sm">
                <tr>
                    <td class="bold" colspan="6">Client / Company Name:</td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td class="bold" colspan="6" style="height:60px;">Address:</td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Contact Person Name:</td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">Contact Number</span>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Contact Person Designation </td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Business Premises</td>
                    <td colspan="6">
                        <div class="d-flex align-items-center">
                            <div class="custom-control custom-checkbox ml-3">
                                <input type="checkbox" class="custom-control-input" id="checkbox1">
                                <label class="custom-control-label mt-1" for="checkbox1">Owned</label>
                            </div>
                            <div class="custom-control custom-checkbox ml-5">
                                <input type="checkbox" class="custom-control-input" id="checkbox2">
                                <label class="custom-control-label mt-1" for="checkbox2">Rented</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Tenure of their Business </td>
                    <td colspan="6">
                        <div class="d-flex align-items-center ml-3 ">
                            <p class=" bold">Since </p>
                            <p class="ml-3 ">15/22/2024</p>
                            <p class="ml-3 bold">To </p>
                            <p class="ml-3 ">15/22/2024</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Type </td>
                    <td colspan="6">
                        <div class="d-flex align-items-center">
                            <div class="custom-control custom-checkbox ml-3">
                                <input type="checkbox" class="custom-control-input" id="checkbox3">
                                <label class="custom-control-label mt-1" for="checkbox3">Office</label>
                            </div>
                            <div class="custom-control custom-checkbox ml-5">
                                <input type="checkbox" class="custom-control-input" id="checkbox4">
                                <label class="custom-control-label mt-1" for="checkbox4">Shop</label>
                            </div>
                            <div class="custom-control custom-checkbox ml-5">
                                <input type="checkbox" class="custom-control-input" id="checkbox5">
                                <label class="custom-control-label mt-1" for="checkbox5">Garage</label>
                            </div>
                            <div class="custom-control custom-checkbox ml-5">
                                <input type="checkbox" class="custom-control-input" id="checkbox6">
                                <label class="custom-control-label mt-1" for="checkbox6">Other</label>
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Neighbour Check (i)</td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">Name / Designation and Add:</span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Neighbour Check (ii)</td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">Name / Designation and Add:</span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Land Mark </td>
                    <td colspan="6"><span class="ml-3"></span></td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Security Confirmation </td>
                    <td colspan="6"><span class="ml-3"></span></td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Photograph</td>
                    <td colspan="6">
                        <div class="align-items-center ml-4">
                            <!-- Left margin 4 added here -->
                            <div class="d-flex flex-column">
                                <!-- Car Washing Area -->
                                <span class="d-flex align-items-center mb-2" style="font-weight: bold;">
                                    Car Washing Area
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        Yes <input type="checkbox" class=" custom-checkbox ml-1" name="vehicle1"
                                            value="Bike">
                                    </label>
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        No <input type="checkbox" class=" custom-checkbox ml-1" name="vehicle1"
                                            value="Bike">
                                    </label>
                                </span>
                                <!-- Car Repair Centre -->
                                <span class="d-flex align-items-center mb-2" style="font-weight: bold;">
                                    Car Repair Centre
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle2"
                                            value="Bike">
                                    </label>
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle2"
                                            value="Bike">
                                    </label>
                                </span>
                                <!-- Car Paint Booth -->
                                <span class="d-flex align-items-center mb-2" style="font-weight: bold;">
                                    Car Paint Booth&nbsp;
                                    <label class=" d-flex align-items-center ml-4">
                                        Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle3"
                                            value="Bike">
                                    </label>
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle3"
                                            value="Bike">
                                    </label>
                                </span>
                                <!-- Car Lift Machine -->
                                <span class="d-flex align-items-center mb-2" style="font-weight: bold;">
                                    Car Lift Machine&nbsp;&nbsp;
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4"
                                            value="Bike">
                                    </label>
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4"
                                            value="Bike">
                                    </label>
                                </span>

                                <!-- Separate Office -->
                                <span class="d-flex align-items-center mb-2" style="font-weight: bold;">
                                    Separate Office&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle5"
                                            value="Bike">
                                    </label>
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle5"
                                            value="Bike">
                                    </label>
                                </span>

                                <!-- Customer Lounge -->
                                <span class="d-flex align-items-center mb-2" style="font-weight: bold;">
                                    Customer Lounge
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle6"
                                            value="Bike">
                                    </label>
                                    <label class="ml-3 mb-0 d-flex align-items-center">
                                        No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle6"
                                            value="Bike">
                                    </label>
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Was the owner of the vendor called before visiting theaddress? </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2" style="font-weight: bold;">

                            <label class="ml-3 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Was the mobile number correct </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2" style="font-weight: bold;">

                            <label class="ml-3 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Document Verification Details </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2 ml-3" style="font-weight: bold;">
                            Compulsory Shop & Establishment Certificate or GST Certificate -
                            <label class="ml-2 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Name of the proprietor or Partners</td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">AAAAA</span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Who approached them from Lombard</td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">AAAAA</span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">In past, have you done business with the Lombard </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2" style="font-weight: bold;">

                            <label class="ml-3 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Is your company ever black listed with other company/ or establishments
                    </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2" style="font-weight: bold;">

                            <label class="ml-3 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Is any of your relative or friend working with Lombard </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2" style="font-weight: bold;">

                            <label class="ml-3 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Has and action been initiated by law enforcement against your company
                    </td>
                    <td colspan="6">
                        <span class="d-flex align-items-center mb-2" style="font-weight: bold;">

                            <label class="ml-3 mb-0 d-flex align-items-center">
                                Yes <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                            <label class="ml-3 mb-0 d-flex align-items-center">
                                No <input type="checkbox" class="custom-checkbox ml-1" name="vehicle4" value="Bike">
                            </label>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Stamp & Signature of Client / Company</td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">thnxxxx</span>
                    </td>
                </tr>
                <tr>
                    <td class="bold" colspan="6">Final Comment </td>
                    <td colspan="6"><span class="ml-3" style="font-weight: bold;">good</span>
                    </td>
                </tr>
            </table>
            <div class="row ml-4">
                <div class="col-sm-5">
                    <h5>P.S- all fields marked * are mandatory</h5>
                    <h5>IL Manager Name : <span></span>Ramu Sharma</paan>
                    </h5>
                    <h5>Seal & Signature : <span></span></h5>
                    <h5>Date:<span>26/11/2024</span></h5>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <h5>Surveyor’s Name : <span>Niranjan sharma</span></h5>
                    <h5>Signature </h5>
                    <h5>Date : <span>22/07/2024</span></h5>
                </div>
            </div>
        </div>
        
        
      </div>  
        
    </div>
</div>

<script>
document.getElementById("downloadPdfBtn").addEventListener("click", async function () {
    const { jsPDF } = window.jspdf;
    const customDiv = document.getElementById("customDiv");
    // Capture the div content as an image using html2canvas
    html2canvas(customDiv, { scale: 3.5 }).then((canvas) => {
        const imgData = canvas.toDataURL("image/jpeg", 0.5);  // 0.5 is for compression (lower value = more compression)
        // Create a jsPDF instance
        const pdf = new jsPDF("p", "mm", "a4");
        // Calculate image width and height for A4
        const imgWidth = 190; // A4 width in mm
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        // Add the image to PDF
        pdf.addImage(imgData, "JPEG", 10, 10, imgWidth, imgHeight);
        // Save the PDF
        pdf.save("custom_report.pdf");
    });
});
</script>
@endsection






















