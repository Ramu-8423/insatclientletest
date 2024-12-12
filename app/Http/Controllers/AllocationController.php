<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\ClientDetail;
use App\Models\User;


class AllocationController extends Controller
{
      public function newallocation(){
             $client_id = session('client_login_id');
             $perpage = 10;
             $cases = DB::table('case_upload_count')->where('client_id',$client_id)->orderBy('id','desc')->paginate($perpage);
             return view('NewAllocation.index')->with('cases',$cases)->with('client_id',$client_id);
     }
    
    public function excel_upload(Request $request){
        $validator = Validator::make($request->all(),[
                'project_type'=>'required',
                'file' => 'required|mimes:xlsx,csv'
            ]);
            
        $validator->stopOnFirstFailure();
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        
        $client =  session('session_client_details');
        if($client && $client->status==2){
                return redirect()->route('client_login');
         }
        $client_type = $client->payment_preference; // prepaid = 1; postpaid = 2;
        if($client_type==1&&$client->wallet<=0){
            return redirect()->back()->with('error','Insufficient blanace,please recharge yor account!');
        }
            
            dd($client);
        
            
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
            
    }
    
    
    
}




