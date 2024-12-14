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
use Maatwebsite\Excel\Facades\Excel;



class AllocationController extends Controller
{
      public function newallocation(){
             $client_id = session('client_login_id');
             $perpage = 10;
             $cases = DB::table('case_upload_count')->where('client_id',$client_id)->orderBy('id','desc')->paginate($perpage);
             return view('NewAllocation.index')->with('cases',$cases)->with('client_id',$client_id);
     }
     
     
     public function previewblade(){
             return view('NewAllocation.preview');
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
        $client_id = $client->id;
        $project_type = $request->project_type;
        $wallet = DB::table('client_details')->where('id',$client_id)->value('wallet');
        
        
        $file = $request->file('file');
        $data = Excel::toCollection(null, $file);  
        $rows = $data->first()->skip(1)->filter(function ($row) {
            return !empty(array_filter($row->toArray()));
        });
        
        if($client_type==2){
            //call protected function for case insert and return from here, so, will not go for next line.
        }
        
        if($client_type==1&&$wallet<=0){
            return redirect()->back()->with('error','Insufficient blanace,please recharge yor account!');
        }
        
        $charges = DB::table('client_packages')->where('client_id',$client_id)->where('project_type',$project_type)->get();
        
        $non_metro_charge =0;
        $metro_charge = 0;
        
        foreach ($charges as $charge){
            if($charge->metro_status==1){
                $metro_charge = $charge->amount;
            }elseif($charge->metro_status==2){
                $non_metro_charge = $charge->amount;
            }
        }
        
        $metro_rows = [];
        $non_metro_rows = [];
        
        foreach($rows as $row){
            if($row[0]==1){
                $metro_rows[] = $row;
            }elseif($row[0]==2){
                $non_metro_rows[] = $row;
            }
        }
        
        $metro_count = count($metro_rows);
        $non_metro_count = count($non_metro_rows);
        $metro_upload_count = 0;
        $non_metro_upload_count = 0;
        $new_wallet = $wallet;
       
        
        if($metro_count>0&&$metro_charge>0){
            $x = $new_wallet - $metro_count*$metro_charge;
            if($x>=0){
                $metro_upload_count = $metro_count;
                $new_wallet = $x;
            }else{
                $metro_upload_count = $new_wallet/$metro_charge;
                $new_wallet = $new_wallet%$metro_charge;
            }
        }
        
        if($non_metro_count>0&&$non_metro_charge>0){
            $x = $new_wallet - $non_metro_count*$non_metro_charge;
            if($x>=0){
                $non_metro_upload_count = $non_metro_count;
                $new_wallet = $x;
            }else{
                $non_metro_upload_count = $new_wallet/$non_metro_charge;
                $new_wallet = $new_wallet%$non_metro_charge;
            }
        }
        
        return view('NewAllocation.preview')
                ->with('metro_rows',$metro_rows)
                ->with('non_metro_rows',$non_metro_rows)
                ->with('metro_upload_count',$metro_upload_count)
                ->with('non_metro_upload_count',$non_metro_upload_count)
                ->with('metro_charge',$metro_charge)
                ->with('non_metro_charge',$non_metro_charge)
                ->with('new_wallet',$new_wallet);
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




