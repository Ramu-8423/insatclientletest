<?php
 
namespace App\Http\Controllers\ReportPdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
use App\Models\User;
use Illuminate\View\View;
 
class ReportPdfController    extends Controller
{

     
    public function addressreportpdf(? string $report_id){ 
        
        $details = DB::table('v_report_submitted_addre')
        ->leftJoin('case_details', 'v_report_submitted_addre.case_id', '=', 'case_details.case_id')
        ->leftJoin('vendors', 'v_report_submitted_addre.v_id', '=', 'vendors.id')
        ->select(
            'case_details.candidate_name as candidate_name',
            'case_details.address as address',
            'case_details.father_name as father_name',
            'case_details.period_of_stay_from as period_of_stay_from',
            'case_details.period_of_stay_to as period_of_stay_to',
            'case_details.mobile as mobile',
            
            'v_report_submitted_addre.respondent_name as respondent_name',
            'v_report_submitted_addre.rel_with_candi as rel_with_candi',
            'v_report_submitted_addre.landmark as landmark',
            'v_report_submitted_addre.visited_date as visited_date',
            'v_report_submitted_addre.residence_status as residence_status',
            'v_report_submitted_addre.residence_type as residence_type',
            'v_report_submitted_addre.stay_period_form as stay_period_form',
            'v_report_submitted_addre.stay_period_to as stay_period_to',
            'v_report_submitted_addre.house as house',
            'v_report_submitted_addre.house_address as house_address',
            'v_report_submitted_addre.gate as gate',
            'v_report_submitted_addre.gate_address as gate_address',
            'v_report_submitted_addre.door as door',
            'v_report_submitted_addre.door_address as door_address',
            'v_report_submitted_addre.near_landmark as near_landmark',
            'v_report_submitted_addre.near_landmark_address as near_landmark_address',
            'v_report_submitted_addre.id_proof as id_proof',
            'v_report_submitted_addre.id_proof_address as id_proof_address',
            'v_report_submitted_addre.respondent_sign as respondent_sign',
            'v_report_submitted_addre.complete_remark as complete_remark',
            
            'vendors.name as v_field_agent_name',
            'vendors.signature as v_signature'
        )
        ->where('v_report_submitted_addre.id',$report_id)
        ->first();
        
        
        return view('report_pdf.addressreport')->with('details',$details);
    }
    
    
    
    
  public function sitereportpdf(?string $report_id){
    
        $details = DB::table('v_site_report_sub')
        ->leftJoin('case_details', 'v_site_report_sub.case_id', '=', 'case_details.case_id')
        ->leftJoin('client_details','case_details.client_id','=','client_details.id')
        ->leftJoin('vendors', 'v_site_report_sub.v_id', '=', 'vendors.id')
        ->select(
            'client_details.a_company_name as a_company_name',
            'case_details.address as address',
            'case_details.contact_person_name as contact_person_name',
            'case_details.contact_person_desi as contact_person_desi',
            'case_details.mobile as mobile',
            'case_details.contact_person_desi as contact_person_desi',
            
            'v_site_report_sub.site_type as site_type',
            'v_site_report_sub.tenure_to as tenure_to',
            'v_site_report_sub.tenure_since as tenure_since',
            'v_site_report_sub.business_permises as business_permises',
            
            'v_site_report_sub.landmark as landmark',
            'v_site_report_sub.neighbour_check_2 as neighbour_check_2',
            'v_site_report_sub.neighbour_check_1 as neighbour_check_1',
            'v_site_report_sub.signboard_name as signboard_name',
            'v_site_report_sub.security_confirmation as security_confirmation',
            
            
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
            'v_site_report_sub.il_date as il_date',
            
            'v_site_report_sub.car_wash as car_wash',
            'v_site_report_sub.car_wash_address as car_wash_address',
            'v_site_report_sub.car_repair as car_repair',
            'v_site_report_sub.car_repair_address as car_repair_address',
            'v_site_report_sub.car_paint as car_paint',
            'v_site_report_sub.car_paint_address as car_paint_address',
            'v_site_report_sub.car_lift as car_lift',
            'v_site_report_sub.car_lift_address as car_lift_address',
            'v_site_report_sub.separate_office as separate_office',
            'v_site_report_sub.separate_office_address as separate_office_address',
            'v_site_report_sub.customer_lounge as customer_lounge',
            'v_site_report_sub.customer_lounge_address as customer_lounge_address',
            
            'vendors.name as v_name',
            'vendors.signature as signature'
       
        )
        ->where('v_site_report_sub.id',$report_id)
        ->first();
    
       return view('report_pdf.sitereport')->with('details',$details);
    }
 

    
}
