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

class DashboardController extends Controller
{
    public function reject_case_client(Request $request){
               date_default_timezone_set("Asia/Calcutta");
               $date = date('Y-m-d H:i:s');
               
               $case_id = $request->case_id;
               $v_id = $request->v_id;
               $reject_remark = $request->reject_remark;
               
               $track_details = DB::table('case_details')->select('project_type','track_status')->where('case_id',$case_id)->first();
               $track_status = json_decode($track_details->track_status,true)??[];
               $track_status[] = ['status'=>18,'date'=>$date,'reject_remark'=>$reject_remark];
              
               $a  = DB::table('case_details')->where('case_id',$case_id)->update(['track_status'=>json_encode($track_status)]);
               $c = DB::table('case_allocated')->where('case_id',$case_id)
                           ->where('v_id',$v_id)->where('case_status',8)
                           ->update(['rejected_status'=>1,'rejected_date'=>$date]);
                $project_type = $track_details->project_type;
                if($project_type==1||$project_type==3){
                  $b = DB::table('v_report_submitted_addre')->where('case_id',$case_id)->where('v_id',$v_id)->where('case_status',2)->update([
                      'case_status'=>5
                      ]);
              }else{
                  $b = DB::table('v_site_report_sub')->where('case_id',$case_id)->where('v_id',$v_id)->where('case_status',2)->update([
                      'case_status'=>5
                      ]);
              }  
               if($a&&$c){
                    return redirect()->back()->with('success','Successfully marked as rejected..');
               }else{
                   return redirect()->back()->with('error','Something went wrong!');
               }
         }
    
    
        public function reopen_case_client(Request $request){
               date_default_timezone_set("Asia/Calcutta");
               $date = date('Y-m-d H:i:s');
               
               $case_id = $request->case_id;
               $v_id = $request->v_id;
               $reopen_remark = $request->reopen_remark;

               $track_details = DB::table('case_details')->select('project_type','track_status')->where('case_id',$case_id)->first();
               $track_status = json_decode($track_details->track_status,true)??[];
               $track_status[] = ['status'=>19,'date'=>$date,'reopen_remark'=>$reopen_remark];
               $project_type = $track_details->project_type;
               
              
               $a  = DB::table('case_details')->where('case_id',$case_id)->update(['track_status'=>json_encode($track_status)]);
               $c = DB::table('case_allocated')->where('case_id',$case_id)
                           ->where('v_id',$v_id)->where('case_status',8)
                           ->update(['reopen_status'=>1,'reopen_date'=>$date]);
                           
              if($project_type==1||$project_type==3){
                  $b = DB::table('v_report_submitted_addre')->where('case_id',$case_id)->where('v_id',$v_id)->where('case_status',2)->update([
                      'case_status'=>4
                      ]);
              }else{
                  $b = DB::table('v_site_report_sub')->where('case_id',$case_id)->where('v_id',$v_id)->where('case_status',2)->update([
                      'case_status'=>4
                      ]);
              }               
                           
               if($a&&$c&&$b){
                    return redirect()->back()->with('success','Successfully marked for reopen..');
               }else{
                   return redirect()->back()->with('error','Something went wrong!');
               }
         }

        public function download_report(? string $client_id,? string $project_type,? string $case_id){
     
      $selected_report = DB::table('report_layout')
                                ->where('client_id', $client_id)
                                ->where('project_type', $project_type)
                                ->first();
       $report_design = DB::table('verifications')->where('id',1)->first();  
      
      if($project_type==1||$project_type==3){
      $details = DB::table('v_report_submitted_addre')
                       ->leftJoin('case_details','v_report_submitted_addre.case_id','=','case_details.case_id')
                       ->leftJoin('vendors','v_report_submitted_addre.v_id','=','vendors.id')
                       ->select(
                           'case_details.candidate_name as candidate_name',
                           'case_details.address as address',
                           'case_details.father_name as father_name',
                           'case_details.period_of_stay_from as period_of_stay_from',
                           'case_details.period_of_stay_to as period_of_stay_to',
                           'case_details.mobile as mobile',
                           
                           'v_report_submitted_addre.respondent_name as respondent_name',
                           'v_report_submitted_addre.rel_with_candi as rel_with_candi',
                           'v_report_submitted_addre.resp_c_num as resp_c_num',
                           'v_report_submitted_addre.landmark as landmark',
                           'v_report_submitted_addre.visited_date as visited_date',
                           'v_report_submitted_addre.residence_status as residence_status',
                           'v_report_submitted_addre.residence_type as residence_type',
                           
                           'v_report_submitted_addre.stay_period_form as stay_period_form',
                           'v_report_submitted_addre.stay_period_to as stay_period_to',
                           
                           'v_report_submitted_addre.respondent_sign as respondent_sign',
                           'v_report_submitted_addre.complete_remark as complete_remark',
                           
                           'vendors.name as v_name',
                           'vendors.signature as v_signature'
                           )
                       ->where('v_report_submitted_addre.case_id','=',$case_id)
                       ->where('v_report_submitted_addre.case_status','=',2)
                       ->orderBy('v_report_submitted_addre.id','desc')
                       ->first();
      }else{
           $details = DB::table('v_site_report_sub')
                      ->leftJoin('case_details','v_site_report_sub.case_id','=','case_details.case_id')
                      ->leftJoin('client_details','case_details.client_id','=','client_details.id')
                      ->leftJoin('vendors','v_site_report_sub.v_id','=','vendors.id')
                      ->select(
                          'v_site_report_sub.case_id as case_id',
                          'v_site_report_sub.created_at as created_at',
                          'client_details.a_company_name as a_company_name',
                          'case_details.address as address',
                          'v_site_report_sub.business_permises as business_permises',
                          'v_site_report_sub.tenure_since as tenure_since',
                          'v_site_report_sub.tenure_to as tenure_to',
                          'v_site_report_sub.site_type as site_type',
                          'v_site_report_sub.neighbour_check_1 as neighbour_check_1',
                          'v_site_report_sub.neighbour_check_2 as neighbour_check_2',
                          'v_site_report_sub.landmark as landmark',
                          'v_site_report_sub.security_confirmation as security_confirmation',
                          'v_site_report_sub.signboard_name as signboard_name',
                          'v_site_report_sub.car_wash as car_wash',
                          'v_site_report_sub.car_repair as car_repair',
                          'v_site_report_sub.car_paint as car_paint',
                          'v_site_report_sub.car_lift as car_lift',
                          'v_site_report_sub.separate_office as separate_office',
                          'v_site_report_sub.customer_lounge as customer_lounge',
                          'v_site_report_sub.is_owner_call_bef as is_owner_call_bef',
                          'v_site_report_sub.is_mobile_correct as is_mobile_correct',
                          'v_site_report_sub.doc_verification_det as doc_verification_det',
                          'v_site_report_sub.partners_name as partners_name',
                          'v_site_report_sub.name_appr_lomb as name_appr_lomb',
                          'v_site_report_sub.business_with_lom as business_with_lom',
                          'v_site_report_sub.is_blacklist as is_blacklist',
                          'v_site_report_sub.relative_lamboard as relative_lamboard',
                          'v_site_report_sub.law_inforcement as law_inforcement',
                          'v_site_report_sub.sign_comp as sign_comp',
                          'v_site_report_sub.final_comment as final_comment',
                          'v_site_report_sub.il_manager_name as il_manager_name',
                          'v_site_report_sub.il_sign as il_sign',
                          'vendors.name as v_name',
                          'vendors.signature as v_signature'
                          )
                      ->where('v_site_report_sub.case_id',$case_id)
                      ->where('v_site_report_sub.case_status',2)
                      ->orderBy('v_site_report_sub.id','desc')
                      ->first();
          
      }
       // write query for case details
       
       return view('downloadLayout')
               ->with('selected_report',$selected_report)
               ->with('report_design',$report_design)
               ->with('details',$details)
               ->with('project_type',$project_type);
               
               /*
               project_type  layout_type  
                    1           1          => use verification table and report_layout>default_layout
                    1           2          => use custom_layout column from report_layout table
                    2           1          => use verification>site_veri,
                    2           2          => use custom_layout
                    3           1          => use verification>digital_add_veri
                    3           2          => use custom_layout
               
               */
    }
    
    
        public function clear_insuff(Request $request){
               date_default_timezone_set("Asia/Calcutta");
               $date = date('Y-m-d H:i:s');
               
               $case_id = $request->case_id;
               $v_id = $request->v_id;
               $remark = $request->insuff_remark;
               
               $action_remark = DB::table('case_allocated')->where('case_id',$case_id)->where('v_id',$v_id)->where('case_status',2)->value('action_remark');
               $track_status = DB::table('case_details')->where('case_id',$case_id)->value('track_status');
               
               $action_remark =json_decode($action_remark,true)??[];
               $track_status = json_decode($track_status,true)??[];
               
               $action_remark['insuff']['clear_date'] = $date;
               $action_remark['insuff']['clear_remark'] = $remark;
               
               $track_status[] = [
                   'status'=>17,
                   'date'=>$date,
                   'clear_remark'=>$remark
                   ];
               
             $a =    DB::table('case_details')->where('case_id',$case_id)->update(['track_status'=>json_encode($track_status)]);
             $b =   DB::table('case_allocated')->where('case_id',$case_id)
                                       ->where('v_id',$v_id)
                                       ->where('case_status',2)
                                       ->update(['insuff_clear_date'=>$date,'insuff_clear_remark'=>$remark,'action_remark'=>json_encode($action_remark),'case_status'=>17,'insuff_status'=>0]);
                                       
             if($a&&$b){
                 return redirect()->back()->with('success','Insuff cleared..');
             }else{
                 return redirect()->back()->with('error','Something went wrong!');
             }                                   

         } 
        
        public function casetracking(? string $id)
          {
              $data = DB::table('case_details')
             ->leftJoin('case_allocated','case_details.case_id','=','case_allocated.case_id')
             ->leftJoin('client_details','case_details.client_id','=','client_details.id')
             ->select(
                'case_details.case_id as case_id',
                'case_details.track_id as track_id',
                'case_details.project_type as project_type',
                'case_details.candidate_name as candidate_name',
                'case_details.employee_id as employee_id',
                'case_details.father_name as father_name',
                'case_details.mother_name as mother_name',
                'case_details.email as email',
                'case_details.mobile as mobile',
                'case_details.pan_card_num as pan_card_num',
                'case_details.gst_number as gst_number',
                'case_details.contact_person_name as contact_person_name',
                'case_details.contact_person_desi as contact_person_desi',
                'case_details.period_of_stay_from as period_of_stay_from',
                'case_details.period_of_stay_to as period_of_stay_to',
                'case_details.address_type as address_type',
                'case_details.state as state',
                'case_details.city as city',
                'case_details.address as address',
                'case_details.pincode as pincode',
                'case_details.created_at as uploaded_date',
                'case_details.track_status as track_status',
                
                'case_allocated.reopen_status as reopen_status',
                'case_allocated.rejected_status as rejected_status',
                'case_allocated.insuff_status as insuff_status',
                'case_allocated.overdue_status as overdue_status',
                'case_allocated.v_id as v_id',
                'case_allocated.case_status as case_status',

                'client_details.reference_id as reference_id',  
                'client_details.a_company_name as a_company_name',  
                'client_details.phone_number as clientphone_number',
                'client_details.email as clientemail',  
                'client_details.payment_preference as payment_preference'
               )
               ->where('case_details.case_id',$id)
               ->where('case_allocated.status','!=',1)
               ->first();
             
              return view('case_tracking')->with('data', $data);
          }
    
        public function dashboard(Request $request, string $id) {
            $client_id = session('client_login_id');
        
            // Store filter parameters in the session if the request method is POST
            if ($request->isMethod('post')) {
                $request->session()->put('id', $request->input('status_id'));
                $request->session()->put('candidate_name', $request->input('candidate_name'));
                $request->session()->put('email_id', $request->input('email_id'));
                $request->session()->put('mobile', $request->input('mobile'));
            }
        
            // Retrieve filter parameters from the session
            if (session('id')) {
                $id = session('id');
            }
            $candidate_name = session('candidate_name');
            $email_id = session('email_id');
            $mobile = session('mobile');
        
            // Initialize the query
            $query = DB::table('case_details')
                ->leftJoin('case_allocated', 'case_details.case_id', '=', 'case_allocated.case_id')
                ->select(
                    'case_details.case_id as case_id', 
                    'case_details.client_id as client_id', 
                    'case_details.employee_id as employee_id', 
                    'case_details.location as location', 
                    'case_details.project_type as project_type', 
                    'case_details.pincode as pincode', 
                    'case_details.candidate_name as candidate_name', 
                    'case_details.mobile as mobile', 
                    'case_details.email as email', 
                    'case_details.father_name as father_name', 
                    'case_details.mother_name as mother_name', 
                    'case_details.address_type as address_type', 
                    'case_details.address as address', 
                    'case_details.city as city', 
                    'case_details.state as state', 
                    'case_details.period_of_stay_from as period_of_stay_from', 
                    'case_details.period_of_stay_to as period_of_stay_to', 
                    'case_details.contact_person_name as contact_person_name', 
                    'case_details.contact_person_desi as contact_person_desi', 
                    'case_details.site_vendor_name as site_vendor_name', 
                    'case_details.gst_number as gst_number', 
                    'case_details.pan_card_num as pan_card_num', 
                    'case_details.approved_status as approved_status',
                    'case_allocated.case_status as case_status', 

                    'case_details.created_at as case_rcv_date',
                    'case_details.case_end_date as end_date',
                    'case_allocated.created_at as allocation_date',
                    'case_allocated.case_closer_date as case_closer_date', 
                    'case_allocated.case_completed_date as case_completed_date',
                    'case_allocated.rejected_date as rejected_date',
                    'case_allocated.insuff_date as insuff_date',
                    'case_allocated.reopen_date as reopen_date'
                    );
        
            // Apply filters based on the status ID
            if ($id == 1) {
                $query->whereNotIn('case_allocated.case_status', [2, 8]);
            }elseif($id==101){
                $query->where('case_details.approved_status', 0);
            }elseif($id==5){
            }elseif($id==2){
                 $query->where('case_allocated.case_status', 2);
            }elseif($id==5){
                $query->where('case_allocated.reopen_status', 1);
            }elseif($id==18){
                $query->where('case_allocated.rejected_status', 1);
            }elseif ($id==8){
                  $query->where('case_allocated.case_status', 8)
                  ->where('case_allocated.rejected_status','!=',1)
                  ->where('case_allocated.reopen_status','!=',1);
            }
        
            // Apply additional filters if they are set
            if ($candidate_name) {
                $query->where('case_details.candidate_name', 'LIKE', '%' . $candidate_name . '%');
            }
        
            if ($email_id) {
                $query->where('case_details.email', 'LIKE', '%' . $email_id . '%');
            }
        
            if ($mobile) {
                $query->where('case_details.mobile', 'LIKE', '%' . $mobile . '%');
            }
        
            // Paginate the results
            $perPage = 10;
            $cases = $query->where('case_details.client_id', $client_id)
                           ->where('case_allocated.status','!=',1)
                           ->orderBy('case_details.case_id', 'desc')
                           ->paginate($perPage);
                
             $totals = DB::table('case_details')
                ->leftJoin('case_allocated', 'case_details.case_id', '=', 'case_allocated.case_id')
                ->selectRaw("
                    COUNT(CASE WHEN case_details.approved_status IN (0,1,2,3,4) THEN 1 END) AS total_case,
                    COUNT(CASE WHEN case_allocated.case_status NOT IN (2,8) THEN 1 END) AS pending_case,
                    COUNT(CASE WHEN case_allocated.case_status = 2 THEN 1 END) AS insuff_case,
                    COUNT(CASE 
                            WHEN case_allocated.rejected_status = 1
                                 AND case_allocated.status != 1 
                            THEN 1 
                        END) AS rejected_case,
                    
                    COUNT(CASE WHEN case_allocated.reopen_status = 1  THEN 1 END) AS re_open_case,
                    COUNT(CASE 
                            WHEN case_allocated.case_status = 8 
                                 AND case_allocated.rejected_status != 1 
                                 AND case_allocated.reopen_status != 1 
                                 AND case_allocated.status != 1 
                            THEN 1 
                        END) AS completed_case
                ")
                ->where('case_details.client_id',$client_id)
                ->first();
                
                $pendings = [];
                 $pendings_count = DB::table('case_details')->whereIn('approved_status',[0,2])->where('client_id',$client_id)->count();
                          
                if($id==1){
                  $pendings = DB::table('case_details')->whereIn('approved_status',[0,2])->where('client_id',$client_id)->get();
                }          
                    
            // Return the view with the cases and status ID
            return view('index')->with('cases', $cases)->with('status_id', $id)->with('totals',$totals)->with('pendings',$pendings)->with('pendings_count',$pendings_count);
        }

    
}


