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
    public function client_case_insert(Request $request){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');

        $metroRows = json_decode($request->metro_rows, true);
        $nonMetroRows = json_decode($request->non_metro_rows, true);
        $metroUploadCount = $request->metro_upload_count;
        $nonMetroUploadCount = $request->non_metro_upload_count;
        $metroCharge = $request->metro_charge;
        $nonMetroCharge = $request->non_metro_charge;
        $newWallet = $request->new_wallet;
        $wallet = $request->wallet;
        $total_charge = $request->total_charge;
        
        $projectType = $request->project_type;
        $client_id = $request->client_id;
        $client_type = $request->client_type;
        
        $case_time_line = DB::table('client_details')->where('id',$client_id)->value('a_case_timeline')??20;
        $created_at = $date; //case rcv date
        $case_end_date = date('Y-m-d H:i:s', strtotime($date . " + $case_time_line days"));
        
        
        //insert metro and non metro status in case-details table to manage charge in future.
        
          $insert_row = [];
        if($projectType==1||$projectType==3){
            foreach ($metroRows as $value){
                $insert_row[] = [
                    'location'=>$value[0],
                    'employee_id'=>$value[1],
                    'candidate_name'=>$value[2],
                    'mobile'=>$value[3],
                    'email'=>$value[4],
                    'father_name'=>$value[5],
                    'mother_name'=>$value[6],
                    'address_type'=>$value[7],
                    'address'=>$value[8],
                    'city'=>$value[9],
                    'state'=>$value[10],
                    'pincode'=>$value[11],
                    'period_of_stay_from'=>$value[12],
                    'period_of_stay_to'=>$value[13],
                    'metro_status' =>1,
                    'project_type'=>$projectType,
                    'client_id'=>$client_id,
                    'created_at'=>$created_at,
                    'case_end_date'=>$case_end_date
                    ];
            }
            foreach ($nonMetroRows as $value){
                $insert_row[] = [
                    'location'=>$value[0],
                    'employee_id'=>$value[1],
                    'candidate_name'=>$value[2],
                    'mobile'=>$value[3],
                    'email'=>$value[4],
                    'father_name'=>$value[5],
                    'mother_name'=>$value[6],
                    'address_type'=>$value[7],
                    'address'=>$value[8],
                    'city'=>$value[9],
                    'state'=>$value[10],
                    'pincode'=>$value[11],
                    'period_of_stay_from'=>$value[12],
                    'period_of_stay_to'=>$value[13],
                    'metro_status' =>2,
                    'project_type'=>$projectType,
                    'client_id'=>$client_id,
                    'created_at'=>$created_at,
                    'case_end_date'=>$case_end_date
                    ];
            }
            
        }else{
            foreach ($metroRows as $value){
                $insert_row[] = [
                    'location'=>$value[0],
                    'employee_id'=>$value[1],
                    'candidate_name'=>$value[2],
                    'mobile'=>$value[3],
                    'email'=>$value[4],
                    'address_type'=>$value[5],
                    'address'=>$value[6],
                    'city'=>$value[7],
                    'state'=>$value[8],
                    'pincode'=>$value[9],
                    'period_of_stay_from'=>$value[10],
                    'period_of_stay_to'=>$value[11],
                    'gst_number'=>$value[12],
                    'pan_card_num'=>$value[13],
                    'contact_person_name'=>$value[14],
                    'contact_person_desi'=>$value[15],
                    'metro_status' =>1,
                    'project_type'=>$projectType,
                    'client_id'=>$client_id,
                    'created_at'=>$created_at,
                    'case_end_date'=>$case_end_date
                    ];
            }
            foreach ($nonMetroRows as $value){
                $insert_row[] = [
                    'location'=>$value[0],
                    'employee_id'=>$value[1],
                    'candidate_name'=>$value[2],
                    'mobile'=>$value[3],
                    'email'=>$value[4],
                    'address_type'=>$value[5],
                    'address'=>$value[6],
                    'city'=>$value[7],
                    'state'=>$value[8],
                    'pincode'=>$value[9],
                    'period_of_stay_from'=>$value[10],
                    'period_of_stay_to'=>$value[11],
                    'gst_number'=>$value[12],
                    'pan_card_num'=>$value[13],
                    'contact_person_name'=>$value[14],
                    'contact_person_desi'=>$value[15],
                    'metro_status' =>2,
                    'project_type'=>$projectType,
                    'client_id'=>$client_id,
                    'created_at'=>$created_at,
                    'case_end_date'=>$case_end_date
                    ];
            }
        }
        
        $ins = DB::table('case_details')->insert($insert_row);
        
        if(!$ins){
           return redirect()->route('newallocation')->with('error','Faild to insert cases!');
        }
        
        if($client_type==1){
           $wallet_update = DB::table('client_details')->where('id',$client_id)->update([
               'wallet'=>DB::raw("wallet - $total_charge")
               ]);
           if(!$wallet_update){
               return redirect()->route('newallocation')->with('error','Faild to deduct charge from wallet!');
           }       
        }
        
        DB::table('case_upload_count')->insert([
            'client_id'=>$client_id,
            'project_type'=>$projectType,
            'case_count'=>$nonMetroUploadCount+$metroUploadCount,
            'created_at'=>$date
            ]);
            
            if($client_type==1){
                
                  $order_id = mt_rand(100000, 999999) . mt_rand(100000, 999999);
                  $transaction[] = [
                                     'client_id'=>$client_id,
                                     'amount'=>$metroCharge*$metroUploadCount,
                                     'type'=>2,
                                     'status'=>1,
                                     'case_count'=>$metroUploadCount,
                                     'project_type'=>$projectType,
                                     'metro_status'=>1,
                                     'created_at'=>$date,
                                     'order_id'=>$order_id,
                                 ];  
                     
                     if($projectType != 3){
                            $order_id = mt_rand(100000, 999999) . mt_rand(100000, 999999);
                            $transaction[] = [
                                                 'client_id'=>$client_id,
                                                 'amount'=>$nonMetroCharge*$nonMetroUploadCount,
                                                 'type'=>2,
                                                 'status'=>1,
                                                 'case_count'=>$nonMetroUploadCount,
                                                 'project_type'=>$projectType,
                                                 'metro_status'=>2,
                                                 'created_at'=>$date,
                                                 'order_id'=>$order_id
                                             ];  
                     } 
                    DB::table('client_transaction')->insert($transaction);  
            }
            
        return redirect()->route('newallocation')->with('success','Case Uploaded successfully');
    }
    
    
    
    
      public function newallocation(){
             $client_id = session('client_login_id');
             $perpage = 10;
             $selected_veri = DB::table('client_details')->where('id',$client_id)->value('project_type');
             $selected_p = json_decode($selected_veri);
             $cases = DB::table('case_upload_count')->where('client_id',$client_id)->orderBy('id','desc')->paginate($perpage);
             return view('NewAllocation.index')->with('cases',$cases)->with('client_id',$client_id)->with('selected_p',$selected_p);
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
        
        
        if($client_type==1&&$wallet<=0){
            return redirect()->back()->with('error','Insufficient blanace,please recharge yor account!');
        }
        
        $charges = DB::table('client_packages')->where('client_id',$client_id)->where('project_type',$project_type)->get();
        $metro_rows = [];
        $non_metro_rows = [];
        
        if($project_type==1){
            $index = 11;
        }else{
           $index = 9; 
        }
        
        if($project_type==1||$project_type==2){
        foreach($rows as $row){
            $metro_status = DB::table('pincodes')->where('pincode',$row[$index])->value('metro_code');
            if($metro_status==1){
                $metro_rows[] = $row;
            }elseif($metro_status==2){
                $non_metro_rows[] = $row;
            }
        }
        }else{
            foreach($rows as $row){
            $metro_rows[] = $row;
            //due to $rows is a collection, not a array so that's why.
            }
        }
        
        if($client_type==2){
             return view('NewAllocation.preview')
                ->with('metro_rows',$metro_rows)
                ->with('non_metro_rows',$non_metro_rows)
                ->with('metro_upload_count',count($metro_rows))
                ->with('non_metro_upload_count',count($non_metro_rows))
                ->with('metro_charge',0)
                ->with('non_metro_charge',0)
                ->with('new_wallet',0)
                ->with('wallet',0)
                ->with('project_type',$project_type)
                ->with('total_charge',0)
                ->with('client_id',$client_id)
                ->with('client_type',$client_type);
        }
        
        $non_metro_charge =0;
        $metro_charge = 0;
        
        foreach ($charges as $charge){
            if($charge->metro_status==1){
                $metro_charge = $charge->amount;
            }elseif($charge->metro_status==2){
                $non_metro_charge = $charge->amount;
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
                $metro_upload_count = floor($new_wallet/$metro_charge);
                $new_wallet = $new_wallet%$metro_charge;
                $metro_rows = array_slice($metro_rows,0,$metro_upload_count);
            }
        }else{
            $metro_rows = [];
        }
        
        if($non_metro_count>0&&$non_metro_charge>0){
            $x = $new_wallet - $non_metro_count*$non_metro_charge;
            if($x>=0){
                $non_metro_upload_count = $non_metro_count;
                $new_wallet = $x;
            }else{
                $non_metro_upload_count = floor($new_wallet/$non_metro_charge);
                $new_wallet = $new_wallet%$non_metro_charge;
                $non_metro_rows = array_slice($non_metro_rows,0,$non_metro_upload_count);
            }
        }else{
            $non_metro_rows = [];
        }
        
        $total_charge = $metro_charge*$metro_upload_count + $non_metro_charge*$non_metro_upload_count;
        
        return view('NewAllocation.preview')
                ->with('metro_rows',$metro_rows)
                ->with('non_metro_rows',$non_metro_rows)
                ->with('metro_upload_count',floor($metro_upload_count))
                ->with('non_metro_upload_count',floor($non_metro_upload_count))
                ->with('metro_charge',$metro_charge)
                ->with('non_metro_charge',$non_metro_charge)
                ->with('new_wallet',$new_wallet)
                ->with('wallet',$wallet)
                ->with('project_type',$project_type)
                ->with('total_charge',$total_charge)
                ->with('client_id',$client_id)
                ->with('client_type',$client_type);
    }
    
    
}




