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


class WalletController extends Controller
{
    
   public function wallet(){
         $client_id = session('client_login_id');
         $perpage = 10;
        $wallet = DB::table('client_details')->where('id',$client_id)->value('wallet');
        $trs_history = DB::table('client_transaction')->where('client_id',$client_id)->orderBy('id','desc')->paginate($perpage);
        return view('wallet.index')->with('wallet',$wallet)->with('trs_history',$trs_history);
    }
    
    
public function rechargeAccount(Request $request){
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
    $clientId = session('client_login_id');
    $order_id = mt_rand(100000, 999999) . mt_rand(100000, 999999);

    if (!$clientId) {
        return redirect()->back()->with('error', 'Client not found');
    }
    $request->validate([
        'amount' => 'required|numeric|min:1'
    ]);
    $client = DB::table('client_details')->where('id', $clientId)->first();
    if (!$client) {
        return redirect()->back()->with('error', 'Client details not found');
    }
    $newBalance = $client->wallet + $request->amount;
    DB::table('client_details')->where('id', $clientId)->update(['wallet' => $newBalance]);
    DB::table('client_transaction')->insert([
        'client_id' => $clientId,
        'amount' => $request->amount,
        'type' =>1,
        'status'=>1,
        'created_at' =>$date,
        'order_id'=>$order_id
    ]);
    return redirect()->back()->with('success', 'Account recharged successfully. New Balance: ₹' . $newBalance);
}

}