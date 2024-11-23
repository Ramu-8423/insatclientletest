@extends('admin.body.adminmaster')

@section('admin')

<style>
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
    th,td {
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
    </style>
</style>
<div class="page-wrapper">
    <div class="container-fluid">
      <div class="card p-5">
          <div class="text-center">
              <h2>Company Details</h2>
              <h5>Garage / Automobile Verification (Field Visit Form)</h5>
          </div>
          <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                  <h5>IL Interaction Id :</h5>
                  <h5>Executive Name :</h5>
              </div>
              <div class="col-sm-3"></div>
              <div class="col-sm-3">
                  <h5>Date :</h5>
                  <h5>Time:</h5>
              </div>
          </div>
           <table class="table table-sm">
        <tr>
            <td class="bold" colspan="2">Client / Company Name:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td class="bold" style="height:60px;">Address:</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td class="bold">Contact Person Name:</td>
            <td  class="bold" colspan="3">Contact Number:</td>
        </tr>
        <tr>
            <td class="bold">Contact Person Designation </td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td class="bold">Business Premises</td>
            <td  colspan="3">
   <div class="d-flex align-items-center">
    <div class="custom-control custom-checkbox ml-3">
        <input type="checkbox" class="custom-control-input" id="checkbox1">
        <label class="custom-control-label mt-1" for="checkbox1">Owned</label>
    </div>
    <div class="custom-control custom-checkbox ml-3">
        <input type="checkbox" class="custom-control-input" id="checkbox2">
        <label class="custom-control-label mt-1" for="checkbox2">Rented</label>
    </div>
</div>


        </td>
        </tr>
         <tr>
            <td class="bold">Tenure of their Business </td>
            <td colspan="3">
                 <div class="d-flex align-items-center ml-3 ">
                <p class=" bold">Since </p><p class="ml-3 ">15/22/2024</p>
                <p class="ml-3 bold">To  </p><p class="ml-3 ">15/22/2024</p>
                </div>
            </td>
        </tr>
        <tr>
            <td class="bold">Type </td>
            <td colspan="3">
                <div class="d-flex align-items-center">
    <div class="custom-control custom-checkbox ml-3">
        <input type="checkbox" class="custom-control-input" id="checkbox3">
        <label class="custom-control-label mt-1" for="checkbox3">Office</label>
    </div>
    <div class="custom-control custom-checkbox ml-3">
        <input type="checkbox" class="custom-control-input" id="checkbox4">
        <label class="custom-control-label mt-1" for="checkbox4">Shop</label>
    </div>
    <div class="custom-control custom-checkbox ml-3">
        <input type="checkbox" class="custom-control-input" id="checkbox5">
        <label class="custom-control-label mt-1" for="checkbox5">Garage</label>
    </div>
    <div class="custom-control custom-checkbox ml-3">
        <input type="checkbox" class="custom-control-input" id="checkbox6">
        <label class="custom-control-label mt-1" for="checkbox6">Other</label>
    </div>
</div>

            </td>
        </tr>
        <tr>
            <td class="bold">Neighbour Check (i)</td>
            <td colspan="3"><span class="ml-3">Name / Designation and Add:</span></td>
        </tr>
         <tr>
            <td class="bold">Neighbour Check (ii)</td>
             <td colspan="3"><span class="ml-3">Name / Designation and Add:</span></td>
        </tr>
        
        <tr>
            <td class="bold">Land Mark </td>
            <td colspan="3"><span class="ml-3"></span></td>
        </tr>
         <tr>
            <td class="bold">Security Confirmation  </td>
            <td colspan="3"><span class="ml-3"></span></td>
        </tr>
        <tr>
            <td class="bold">Photograph:</td>
               <td colspan="3">
                <div class=" align-items-center">
   <div class="d-flex flex-column">
    <!-- Car Washing Area -->
    <div class="custom-control custom-checkbox mb-2">
        <label class="custom-control-label" for="checkbox1">Car Washing Area:</label>
        <input type="checkbox" class="custom-control-input" id="checkbox1" value="yes">
        <label class="custom-control-label" for="checkbox1">Yes</label>
        <input type="checkbox" class="custom-control-input" id="checkbox2" value="no">
        <label class="custom-control-label" for="checkbox2">No</label>
    </div>

    <!-- Car Repair Centre -->
    <div class="custom-control custom-checkbox mb-2">
        <label class="custom-control-label" for="checkbox3">Car Repair Centre:</label>
        <input type="checkbox" class="custom-control-input" id="checkbox3" value="yes">
        <label class="custom-control-label" for="checkbox3">Yes</label>
        <input type="checkbox" class="custom-control-input" id="checkbox4" value="no">
        <label class="custom-control-label" for="checkbox4">No</label>
    </div>

    <!-- Car Paint Booth -->
    <div class="custom-control custom-checkbox mb-2">
        <label class="custom-control-label" for="checkbox5">Car Paint Booth:</label>
        <input type="checkbox" class="custom-control-input" id="checkbox5" value="yes">
        <label class="custom-control-label" for="checkbox5">Yes</label>
        <input type="checkbox" class="custom-control-input" id="checkbox6" value="no">
        <label class="custom-control-label" for="checkbox6">No</label>
    </div>

    <!-- Car Lift Machine -->
    <div class="custom-control custom-checkbox mb-2">
        <label class="custom-control-label" for="checkbox7">Car Lift Machine:</label>
        <input type="checkbox" class="custom-control-input" id="checkbox7" value="yes">
        <label class="custom-control-label" for="checkbox7">Yes</label>
        <input type="checkbox" class="custom-control-input" id="checkbox8" value="no">
        <label class="custom-control-label" for="checkbox8">No</label>
    </div>

    <!-- Separate Office -->
    <div class="custom-control custom-checkbox mb-2">
        <label class="custom-control-label" for="checkbox9">Separate Office:</label>
        <input type="checkbox" class="custom-control-input" id="checkbox9" value="yes">
        <label class="custom-control-label" for="checkbox9">Yes</label>
        <input type="checkbox" class="custom-control-input" id="checkbox10" value="no">
        <label class="custom-control-label" for="checkbox10">No</label>
    </div>

    <!-- Customer Lounge -->
    <div class="custom-control custom-checkbox mb-2">
        <label class="custom-control-label" for="checkbox11">Customer Lounge:</label>
        <input type="checkbox" class="custom-control-input" id="checkbox11" value="yes">
        <label class="custom-control-label" for="checkbox11">Yes</label>
        <input type="checkbox" class="custom-control-input" id="checkbox12" value="no">
        <label class="custom-control-label" for="checkbox12">No</label>
    </div>
</div>

</div>

            </td>
        </tr>
        <tr>
            <td class="bold">Car Washing Area:</td>
            <td><label><input type="radio" name="car_wash"> Yes</label><label><input type="radio" name="car_wash"> No</label></td>
            <td class="bold">Car Repair Booth:</td>
            <td><label><input type="radio" name="car_repair"> Yes</label><label><input type="radio" name="car_repair"> No</label></td>
        </tr>
        <tr>
            <td class="bold">Car Paint Booth:</td>
            <td><label><input type="radio" name="car_paint"> Yes</label><label><input type="radio" name="car_paint"> No</label></td>
            <td class="bold">Separate Office:</td>
            <td><label><input type="radio" name="office"> Yes</label><label><input type="radio" name="office"> No</label></td>
        </tr>
        <tr>
            <td class="bold">Customer Lounge:</td>
            <td><label><input type="radio" name="lounge"> Yes</label><label><input type="radio" name="lounge"> No</label></td>
        </tr>
        <tr>
            <th colspan="4" class="text-center">Final Comment</th>
        </tr>
        <tr>
            <td colspan="4" style="height: 100px;"></td>
        </tr>
        <tr>
            <td class="bold">Manager's Name:</td>
            <td></td>
            <td class="bold">Surveyor's Name:</td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Seal & Signature:</td>
            <td></td>
            <td class="bold">Date:</td>
            <td></td>
        </tr>
    </table>
      </div>
    </div>
</div>
@endsection