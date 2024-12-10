<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


//use App\Imports\UsersImport;  // Optional if you're using a dedicated import class

class ExcelController extends Controller
{
    
    public function view_excel(){
        return view('view_excel');
    }
    
    
   public function uploadExcel(Request $request) {
    $request->validate([
        'file' => 'required|mimes:xlsx,csv',
    ]);

    $file = $request->file('file');
    $data = Excel::toCollection(null, $file);
    $rows = $data->first();
    $updatedRows = 0;

    foreach ($rows as $row) {
        $postname = ', ' . $row[0];
        $pincode = $row[1];

        // Use query builder with CONCAT function
        $affectedRows = DB::table('testpincode')
            ->where('pincode', $pincode)
            ->update([
                'post_name' => DB::raw("CONCAT(IFNULL(post_name, ''), '" . addslashes($postname) . "')")
            ]);

        if ($affectedRows > 0) {
            $updatedRows += $affectedRows;
        }
    }

    session()->flash('success', "$updatedRows rows updated successfully.");
    return redirect()->back();
}


    
    
    
    
    
    
    
    public function uploadExcel_old(){
        $request->validate([
                         'file' => 'required|mimes:xlsx,csv',  
                       ]);
             $file = $request->file('file');
             $data = Excel::toCollection(null, $file);  
             $rows = $data->first(); 
            
            

            $client =  session('session_client_details');
            
            if($client && $client->status==2){
                return redirect()->route('client_login');
            }
            $client_type = $client->payment_preference; // prepaid = 1; postpaid = 2;
            if($client_type==1&&$client->wallet<=0){
                return redirect()->back()->with('error','Insufficient blanace,please recharge yor account!');
            }
            
            if($client_type==1){
                $charges = DB::table('client_packages')->where('client_id',$client->id)->get();
                
                  $address_m = 0;
                  $address_nm = 0;
                  $site_m = 0;
                  $site_nm = 0;
                  $digital = 0;
                  
                foreach ($charges as $charge){
                    if($charge->project_type==1&&$charge->metro_status==1){
                        $address_m = $charge->amount;
                    }elseif($charge->project_type==1&&$charge->metro_status==2){
                        $address_nm = $charge->amount;
                    }elseif($charge->project_type==2&&$charge->metro_status==1){
                        $site_m = $charge->amount;
                    }elseif($charge->project_type==2&&$charge->metro_status==2){
                        $site_nm = $charge->amount;
                    }else{
                        $digital = $charge->amount;
                    }
                }
                
                
                
                
            }
           
          
            
        
            
            /*
         
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',  
        ]);
        $file = $request->file('file');
        $data = Excel::toCollection(null, $file);  
        $rows = $data->first(); 
        foreach ($rows as $row) {
            $column1 = $row[0];  // First column in the row
            $column2 = $row[1];  // Second column in the row

        }

        return back()->with('success', 'Excel file uploaded and data processed successfully.');
        
        */
    }
    
}







