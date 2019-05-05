<?php

namespace App\Http\Controllers\Owner;

use App\Models\Admin\Withdrawal;
use App\Models\Admin\Owner;

use App\Models\Transaction;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class OwnerWithdrawalController extends Controller
{
    protected $user;
    public function __construct(){
        $this->user = Auth::user();
    }

    public function index(){
        $user = $this->user;
        $commission = Setting::where('key','host_commission')->pluck('value')->first();
        $withdrawals = Withdrawal::orderBy('created_at', 'desc')->where('user_id', $user->id)->paginate(10);
        $owner = Owner::where('user_id', $user->id)->first();
        $currency_code = get_setting('currency_code', 'site');
        $currency = currency()->getCurrency($currency_code);
        $currency = $currency['symbol'] ? $currency['symbol'] : '';
        return view('owner.withdrawal', compact('withdrawals', 'currency','owner','commission'));
    }


 public function transaction(){
        $user = $this->user;
    
        $trans = Transaction::orderBy('created_at', 'desc')->where('user_id', $user->id)->paginate(10);
       
       
     
        return view('owner.transaction', compact('trans'));
    }
    public function request(Request $request){



        // Validate Request
        $this->validate($request, [
            
            'amount' => 'required|numeric',
           
        ]);

        $owner = Owner::where('user_id', $this->user->id)->first();

        if($request->amount > $owner->active_balance){

            // Not Enought Balance
            Session::flash('withdrawal_request', false);
            return redirect()->back();


        }else{

            // Get Data
            $data = $request->all();
        
            $data['method'] = $owner->payment_method;

             $random= rand(000000,999999);
             $data['ref_no'] = 'W-'.$random;

           // $host_commission = Setting::where('key','host_commission')->pluck('value')->first();

            //$total_commission  = $request->amount * $host_commission /100;
            $total_amount = $request->amount;
            $owner->active_balance -= $total_amount;
            $owner->save();
            $data['user_id'] = $this->user->id;
            if($owner->payment_method == 'Bank Transfer'){
            $data['data'] = 'Bank Name: '.$owner->bank.'</br></br> Account Name: '. $owner->acct_name.'</br></br>Account No: '.$owner->acct_no ;
   			 }
    	else{
			$data['data'] = 'Paypal Account: '.$owner->paypal_acct ;

   			 }
            $data['amount'] = $total_amount;
            $data['type'] = 1;
         

            // Redirect Back
            Withdrawal::create($data);
            return redirect()->route('owner_withdrawal');
        }
    }


public function updatePayment(Request $request){


if($request->method == 1){

     $this->validate($request, [
            'method' => 'required',
            'email'   => 'required|email',
        ]);


}
else if($request->method == 0)
{
        // Validate Request
        $this->validate($request, [
            'method' => 'required',
            'bank'   => 'required',
            'acct_name'   => 'required',
            'acct_no'   => 'required',
        ]);
}
        $owner = Owner::where('user_id', $this->user->id)->first();

        if($request->amount > $owner->active_balance){

            // Not Enought Balance
            Session::flash('withdrawal_request', false);
            return redirect()->back();


        }else{

            // Get Data
           // $data = $request->all();

            // Get Payment Method
            switch($request->method){
                case 1: $data['method'] = 'PayPal'; break;
                case 0: $data['method'] = 'Bank Transfer'; break;
            }

           // $data['user_id'] = $this->user->id;
            //$data['data'] = $request->bank +"|"+$request->acct_name+"|"+$request->acct_no+"|"+$request->email;
          
            $owner->bank = $request->bank;
            $owner->acct_name = $request->acct_name;
            $owner->acct_no = $request->acct_no;
            $owner->paypal_acct = $request->email;
           // $owner->active_balance -= $total_ammount;
            $owner->payment_method = $data['method'];
            $owner->save();

            // Redirect Back
           // Withdrawal::create($data);
            return redirect()->route('owner_withdrawal');
        }
    }


    public function userInfo(Request $request, $id){
        if($request->ajax()) {
            $withdrawal = Withdrawal::findOrFail($id);
            return response()->json($withdrawal->data, 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
        }
    }

     
}
