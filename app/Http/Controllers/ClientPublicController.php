<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\ReportLayout;



class ClientPublicController extends Controller
{
    
    public function client_login(){
      return view('admin.client_login');  
    }
    
     public function mark_as_completed(? string $id){
       $up = DB::table('client_details')->where('id',$id)->update([
             'progress_status'=>5
                 ]);
        if($up){
             return redirect()->back()->with('success','Congratulations! You have successfully onboarded.');        
           }else{
                  return redirect()->back()->with('error','something went wrong!');    
                }
    }
    
      public function approve_layout_order(? string $id,string $remark_status){
          if($remark_status==1){
              $remark_status = 0;
          }
        $up =  DB::table('client_details')->where('id',$id)->update([
             'progress_status'=>3,
             'remark_status'=>$remark_status
             ]);
             
        if($up){
            return redirect()->back()->with('success','Layout Approved successfully..');
        }else{
             return redirect()->back()->with('error','something went wrong!');
        }     
      }
    public function client_agreement(Request $request){
         $id = session('client_login_id');
         $company_name = $request->company_name;
         $cin_number = $request->cin_number;
         $company_address = $request->company_address;
         $signatory_name = $request->signatory_name;
         $a_signatory_desi = $request->signatory_designation;
         $case_timeline = $request->case_timeline;
         $person_name = $request->person_name;
         $person_phone = $request->person_phone;
         $person_email = $request->person_email;
         $person_designation = $request->person_designation;
         $pan_card = $request->file('pan_card');
         $gst = $request->file('gst');
         $quotation_doc = $request->file('quotation_doc');
         $remark_status = $request->remark_status;
         if($remark_status==1){
             $remark_status = 0;
         }
         $a_other_person_info = [
             [
             "person_name"=>$person_name[0],
             "person_phone"=>$person_phone[0],
             "person_email"=>$person_email[0],
             "person_designation"=>$person_designation[0],
             ],
             [
             "person_name"=>$person_name[1],
             "person_phone"=>$person_phone[1],
             "person_email"=>$person_email[1],
             "person_designation"=>$person_designation[1],
             ],
             [
             "person_name"=>$person_name[2],
             "person_phone"=>$person_phone[2],
             "person_email"=>$person_email[2],
             "person_designation"=>$person_designation[2],
             ]
             ];
                   if ($request->hasFile('pan_card')) {
                        $pan_card = $request->file('pan_card');
                    }else{
                       $pan_card = null; 
                    }
                    
                    if ($request->hasFile('gst')) {
                        $gst = $request->file('gst');
                    }else{
                       $gst = null; 
                    }
                    if ($request->hasFile('quotation_doc')) {
                        $quotation_doc = $request->file('quotation_doc');
                    }else{
                       $quotation_doc = null; 
                    }
                     $filePaths = [];
                    $allowedFileTypes = ['pdf', 'jpg', 'jpeg', 'png'];
                  if ($pan_card) {
                     
                        $rand = Str::random(8);
                        $extension = $pan_card->getClientOriginalExtension();
                        $fileName = $rand . '.' . $extension;
                        $filePath = 'agreement_doc/' . $fileName;
                        $filePath_insert = env('APP_URL').'agreement_doc/' . $fileName;
                       // dd($pan_card,$filePath_insert,$filePath);
                        if (!in_array(strtolower($extension), $allowedFileTypes)) {
                            return redirect()->back()->with('error', 'Invalid PAN Card file type. Only PDF, JPG, JPEG, and PNG are allowed.');
                        }
                        try{
                            $fileContents = file_get_contents($pan_card->getPathname());
                            if ($fileContents === false) {
                                return redirect()->back()->with('error', 'Failed to read PAN Card file contents.');
                            }
                            $fullPath = public_path($filePath);
                            $saved = file_put_contents($fullPath, $fileContents);
                            if ($saved === false) {
                                return redirect()->back()->with('error', 'Failed to save the PAN Card file.');
                            }
                            $filePaths['a_pan_card'] = $filePath_insert;
                                DB::table('client_details')->where('id', $id)->update(['a_pan_card'=>$filePath_insert]);
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'An error occurred while uploading PAN Card: ' . $e->getMessage());
                        }
                     }
                              if ($gst) {
                                    $rand = Str::random(8);
                                    $extension = $gst->getClientOriginalExtension();
                                    $fileName = $rand . '.' . $extension;
                                    $filePath = 'agreement_doc/' . $fileName;
                                    $filePath_insert = env('APP_URL').'agreement_doc/' . $fileName;
                                    if (!in_array(strtolower($extension), $allowedFileTypes)) {
                                        return redirect()->back()->with('error', 'Invalid GST file type. Only PDF, JPG, JPEG, and PNG are allowed.');
                                    }
                                try {
                                    $fileContents = file_get_contents($gst->getPathname());
                                    if ($fileContents === false) {
                                        return redirect()->back()->with('error', 'Failed to read GST file contents.');
                                    }
                            
                                    $fullPath = public_path($filePath);
                                    $saved = file_put_contents($fullPath, $fileContents);
                                    if ($saved === false) {
                                        return redirect()->back()->with('error', 'Failed to save the GST file.');
                                    }
                            
                                    $filePaths['a_gst'] = $filePath_insert;
                                    DB::table('client_details')->where('id', $id)->update(['a_gst'=>$filePath_insert]);
                                } catch (\Exception $e) {
                                    return redirect()->back()->with('error', 'An error occurred while uploading GST: ' . $e->getMessage());
                                }
                         }
                             if ($quotation_doc) {
                                $rand = Str::random(8);
                                $extension = $quotation_doc->getClientOriginalExtension();
                                $fileName = $rand . '.' . $extension;
                                $filePath = 'agreement_doc/' . $fileName;
                                $filePath_insert = env('APP_URL').'agreement_doc/' . $fileName;
                                if (!in_array(strtolower($extension), $allowedFileTypes)) {
                                    return redirect()->back()->with('error', 'Invalid Quotation Document file type. Only PDF, JPG, JPEG, and PNG are allowed.');
                                }
                            try {
                                $fileContents = file_get_contents($quotation_doc->getPathname());
                                if ($fileContents === false) {
                                    return redirect()->back()->with('error', 'Failed to read Quotation Document file contents.');
                                }
                        
                                $fullPath = public_path($filePath);
                                $saved = file_put_contents($fullPath, $fileContents);
                                if ($saved === false) {
                                    return redirect()->back()->with('error', 'Failed to save the Quotation Document file.');
                                }
                        
                                $filePaths['a_quotation_doc'] = $filePath_insert;
                                DB::table('client_details')->where('id', $id)->update(['a_quotation_doc'=>$filePath_insert]);
                            } catch (\Exception $e) {
                                return redirect()->back()->with('error', 'An error occurred while uploading Quotation Document: ' . $e->getMessage());
                            }
                         }
                    $reportst = DB::table('client_details')->where('id', $id)->value(DB::raw("JSON_EXTRACT(reg_tracking, '$.report_status')"));
                    $paymentst = DB::table('client_details')->where('id', $id)->value(DB::raw("JSON_EXTRACT(reg_tracking, '$.payment_status')"));        
                    $progress = ($reportst == 1 && $paymentst == 1) ? 3 : (($reportst == 1 && $paymentst == 0) ? 2 : 1);
                    
                    $update = DB::table('client_details')->where('id', $id)->update([
                    'a_company_name' => $company_name,
                    'a_cin_number' => $cin_number,
                    'a_company_address' => $company_address,
                    'a_signatory_name' => $signatory_name,
                    'a_signatory_desi' => $a_signatory_desi,
                    'a_case_timeline' => $case_timeline,
                    'progress_status' => $progress, // Dynamically set value
                    'a_other_person_info' => $a_other_person_info,
                    'remark_status' => $remark_status,
                    'reg_tracking' => DB::raw("JSON_SET(reg_tracking, '$.agreement_status', 1)")
                ]);

     if($update){
         return redirect()->back()->with('success', 'Updated Successfully.');
     }else{
         return redirect()->back()->with('error', 'Failed to update.');
     }
    }
    
    
    
    
    public function client_register(){
      return view('admin.client_register');  
    }
    
    public function client_onboarding(){
        $id = session('client_login_id');
        $details = DB::table('client_details')->where('id',$id)->first();
        $report_details = DB::table('report_layout')->where('client_id',$id)->get();
        $column_layout = DB::table('verifications')->where('id',1)->first();
        $detail = DB::table('client_packages')->where('client_id',$id)->get();
        $approvestatus = DB::table('report_layout')->where('client_id',$id)->whereIn('layout_status',[1,3])->get();
         $msg = '';
         if($approvestatus->isNotEmpty()){
             foreach($approvestatus as $value){
                 $report_name = $value->project_type==1?'Address Verification':($value->project_type==2?'Site Investigation':'Digital Address Verification');
                 $report_status = $value->layout_status==1?'Pending':'Open for edit';
                 $msg .=$report_name.' - '.$report_status.',';
             }
         }
     
      return view('admin.client_onboarding')
      ->with('details',$details)
      ->with('detail',$detail)
      ->with('id',$id)
      ->with('msg',$msg)
      ->with('column_layout',$column_layout)
      ->with('report_details',$report_details);  
    }
    
    
        public function create_account(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'person_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:client_details,email',
            'phone' => 'required|string|max:10',
            'project_type' => 'required|array',
            'payment_preference' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
         $validator->stopOnFirstFailure();
        
        $a_other_person_info = [
            (object)[
                'person_name' =>null,
                'person_phone' =>null,
                'person_email' =>null,
                'person_designation' =>null
            ],
            (object)[
                'person_name' =>null,
                'person_phone' =>null,
                'person_email' =>null,
                'person_designation' =>null
            ],
            (object)[
                'person_name' =>null,
                'person_phone' =>null,
                'person_email' =>null,
                'person_designation' =>null
            ]
        ];
        
        $reg_tracking = [
            "reg_status"=>2,
            "reg_remark"=>"",
            "agreement_status"=>0,
            "agreement_remark"=>"",
            "report_status"=>0,
            "report_remark"=>"",
            "payment_status"=>0,
            "payment_remark"=>"",
            "complete_status"=>0,
            "complete_remark"=>""
            ];
        
        
       
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
         do{
            $referenceId = mt_rand(100000, 999999);
          } while (DB::table('client_details')->where('reference_id', $referenceId)->exists());
       $client_id =  DB::table('client_details')->insertGetId([
            'company_name' => $request->company_name,
            'person_name' => $request->person_name,
            'person_designation' => $request->designation,
            'company_address' => $request->company_address,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'project_type' => json_encode($request->project_type), // Store as JSON
            'payment_preference' => $request->payment_preference,
            'password' => Hash::make($request->password),
            'status'=>1,
            'progress_status'=>0,
            'report_layout_order'=>json_encode(["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17"]),
            'a_other_person_info'=>json_encode($a_other_person_info),
            'reference_id' => $referenceId,  // Store the reference ID
            'final_status'=>0,
            'reg_tracking'=>json_encode($reg_tracking)
        ]);
        
        
         $project_type = $request->project_type;
        $charge = [];
        
        foreach($project_type as $value){
               $charge[] = [
                   'project_type'=>$value,
                   'client_id'=>$client_id,
                   'metro_status'=>1,
                   'amount'=>0
                   ]; 
                   
                   if($value != 3){
              $charge[] = [
                   'project_type'=>$value,
                   'client_id'=>$client_id,
                   'metro_status'=>2,
                   'amount'=>0
                   ]; 
                   }
        }
        
        $client_package = DB::table('client_packages')->insert($charge);
        
        
     /*   SELECT `id`, `client_id`, `project_type`, `layout_type`, `layout_status`, `default_layout`, `custom_layout`, `file`, `created_at`, `updated_at` FROM `report_layout` WHERE 1  
      layout_type - default_layout-1,custom_layout-2,
      layout_status - pending - 1, Approved -2,edit -3,
      
     */
     
           $report_data = [];
        foreach ($project_type as $value){
            if($value==1){
                $report_data[] = [
                     'client_id'=>$client_id,
                     'project_type'=>$value,
                     'layout_type'=>1,
                     'layout_status'=>1,
                     'default_layout'=>json_encode(["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17"]),
                    ];
            }elseif($value==2){
                $report_data[] = [
                     'client_id'=>$client_id,
                     'project_type'=>$value,
                     'layout_type'=>1,
                     'layout_status'=>1,
                     'default_layout'=>json_encode(["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17"]) //this will change accornding to saved project type layout
                    ];
            }elseif($value==3){
                $report_data[] = [
                     'client_id'=>$client_id,
                     'project_type'=>$value,
                     'layout_type'=>1,
                     'layout_status'=>1,
                     'default_layout'=>json_encode(["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17"])
                    ];
            }
        }
        
        DB::table('report_layout')->insert($report_data);
        
        session(['reference_id' => $referenceId]);
        // return redirect()->route('thank_you',  ['reference_id' => $referenceId]);
        return redirect()->route('thank_you');
    }
    
        public function thank_you(){ 
        $reference_id = session('reference_id');
        return view('admin.thankyou', compact('reference_id'));
    }
    
         public function client_logout(Request $request){ 
            $request->session()->flush();
            return redirect()->route('client_login');
        }
        
         public function uploadfiles()
        {
            return view('upload_files.fileupload');
        }

      public function report_layout_page()
        {
            $client_login_id = session('client_login_id');
            $report = DB::table('report_layout')->where('client_id', $client_login_id)->get();
            return view('report_layout.index')->with('report', $report);
        }
///////////////
      public function upload(Request $request)
        {
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('file')->store('uploads', 'public');

        // $report = new ReportLayout();
        $report->view = $filePath;
        $report->update = $filePath;
        $report->save();

        return redirect()->route('report.layout.index')->with('success', 'File uploaded successfully');
    }
    public function update_layout_order(Request $request){
          //$order = $request->input('order', []);
         $order = $request->order;
         $client_id = $request->id;
         $remark_status = $request->remark_status;
         $progress_status = $request->progress_status;
         
         if(($progress_status==2&&$remark_status==0)||($progress_status==3&&$remark_status==1)){
         $update =  DB::table('client_details')->where('id',$client_id)->update([
             'report_layout_order'=>json_encode($order)
            ]);
         } 
        return response()->json(['status' => '$request']);
     }
       public function report($id, $layout_type, $layout_status) {
            $ids = session('client_login_id');
            if ($layout_type == 1) {
                $column_layout = DB::table('verifications')->where('id', 1)->first();
                $details = DB::table('report_layout')->where('id', $id)->first();
                $detail = DB::table('client_details')->where('id', $ids)->first();
                return view('report.report')->with([
                    'column_layout' => $column_layout,
                    'id' => $id,
                    'layout_type' => $layout_type,
                    'layout_status' => $layout_status,
                    'detail' => $detail,
                    'details' => $details
                ]);
            } if($layout_type == 2) {
               $report_details = DB::table('report_layout')->where('id',$id)->first();
                $details = DB::table('client_details')->where('id', $ids)->first();
                return view('report.getuploadupdate')
              
                ->with('report', $report_details)
                ->with('details', $details);
            }
        }
          public function Customfile(Request $request){
             $request->validate([
                 'id' => 'required',
                 'layout_type' => 'required',
                 'client_id' => 'required',
                 'project_type' => 'required',
                 'layout_status' => 'required',
                 'customfile' => 'required|file',
             ]);
             if ($request->file('customfile')) {
                 $file = $request->file('customfile');
                 $filename = time() . '.' . $file->getClientOriginalExtension();
                 $filePath = env('APP_URL') . '/spendingfile/' . $filename;
                 $file->move(public_path('spendingfile'), $filename); 
                 $data = [
                     'file' => $filePath,
                     'layout_type' => 2,
                     'updated_at' => now(),
                 ];
                 DB::table('report_layout')
                     ->where('id', $request->input('id'))
                     ->update($data);
                 return back()->with('success', 'File saved successfully.');
             }
             return back()->with('error', 'Please select a file to upload.');
}
         public function client_details_order(Request $request){
                $order = $request->order;
                $client_id = $request->id;
                $update =  DB::table('report_layout')->where('id',$client_id)->update([
                    'default_layout'=>json_encode($order)
                   ]);
               return response()->json(['status' => '$request']);
            }
            public function layoutstatus($id, $layout_status, $layout_type,$client_id) {
                //dd($id,$layout_status,$layout_type,$client_id);
               // dd($client_id);
                $update = DB::table('report_layout')->where('id', $client_id)->update([
                    'layout_status' => 2,
                    'layout_type' => $layout_type
                ]);
                return redirect()->route('client_onboarding',$id)->with('success', 'Approved successfully')->with('message',2);
        }
          public function getuploadupdate($id){
           $report_details = DB::table('report_layout')->where('id',$id)->first();
           return view('report.getuploadupdate')->with(['report' => $report_details]);
        }
        
   public function updateAgreementStatus(Request $request){
        $agreement_status = $request->agreement_status;
        $report = $request->report;
        $reportedit = $request->reportedit;
        $finalsubmit = $request->finalsubmit;
        $enableedit0 = $request->enableedit0;
        $id = $request->id;
        if($agreement_status){
          DB::table('client_details')->where('id', $id)->update([
          'progress_status' => 0,
            'reg_tracking' => DB::raw("JSON_SET(reg_tracking, '$.agreement_status', 0)")
        ]);  
        }
      if($report){
             $paymentStatus = DB::table('client_details')
            ->where('id', $id)
            ->value(DB::raw("JSON_EXTRACT(reg_tracking, '$.payment_status')"));
             $progress = ($paymentStatus == 1)?3 : 2 ;
             DB::table('client_details')->where('id', $id)->update([
             'progress_status' =>$progress,
             'reg_tracking' => DB::raw("JSON_SET(reg_tracking, '$.report_status', 1)")  // 1 ==  open fror complete save
             ]);
             return redirect()->back()->with('success', 'Report layout saved successfully!');
       }
      if($reportedit){
            DB::table('client_details')->where('id',$id)->update([
            'progress_status' => 1,
            'reg_tracking' => DB::raw("JSON_SET(reg_tracking, '$.report_status', 0 , '$.complete_status', 0)") //final sunmit ke sath wala edit
            ]);
       }
        if($finalsubmit)
        {
            DB::table('client_details')->where('id',$id)->update([
            'progress_status' => 3,
            'final_status' => 1,
            'reg_tracking' => DB::raw("JSON_SET(reg_tracking, '$.complete_status', 1)")
            ]);
             return redirect()->back();
        }
        if($enableedit0)
        { 
             DB::table('client_details')->where('id',$id)->update([
             'progress_status' => 1,
             'final_status' => 0,
             'reg_tracking' => DB::raw("JSON_SET(reg_tracking, '$.complete_status', 0)")
             ]);
        }
        return redirect()->back();
    }
}


