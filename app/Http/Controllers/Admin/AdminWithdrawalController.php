<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Withdrawal;
use App\Models\Refund;
use App\Models\Payment_info;
use App\Models\Transaction;
use App\Models\Admin\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Support\Facades\Mail;

class AdminWithdrawalController extends Controller
{
    public function index(){
        $withdrawals = Withdrawal::orderBy('created_at','desc')->paginate(10);
        $currency_code = get_setting('currency_code', 'site');
        $currency = currency()->getCurrency($currency_code);
        $currency = $currency['symbol'] ? $currency['symbol'] : '';
        return view('admin.owner.withdrawal', compact('withdrawals', 'currency'));
    }


public function index_state($id){
        $withdrawal = Withdrawal::findOrFail($id);
        $currency_code = get_setting('currency_code', 'site');
        $currency = currency()->getCurrency($currency_code);
        $currency = $currency['symbol'] ? $currency['symbol'] : '';
        return view('admin.owner.withdrawal', compact('withdrawals', 'currency'));
    }

    function generate_pdf(Request $request, $id) {
        $withdrawal = Withdrawal::findOrFail($id);

        

    $data = [
        'First_name' => $withdrawal->owner->first_name,
        'last_name' => $withdrawal->owner->last_name,
        'address' => $withdrawal->owner->address,
        'city' => $withdrawal->owner->city,
        'state' => $withdrawal->owner->state,
        'phone' => $withdrawal->owner->phone,
        'amount' => $withdrawal->amount,
        'method' => $withdrawal->method,
        'bank' => $withdrawal->owner->bank,
        'acct_name' => $withdrawal->owner->acct_name,
        'acct_no' => $withdrawal->owner->acct_no,
        'ref_no' => $withdrawal->ref_no

    ];
    $pdf = PDF::loadView('pdf.invoice', $data);
    return $pdf->stream('document.pdf');
}



    function generate_refund_pdf(Request $request, $id) {
        $refund = Refund::findOrFail($id);

        

    $data = [
        'First_name' => $refund->user->info->first_name,
        'last_name' => $refund->user->info->last_name,
       
        'phone' => $refund->user->info->phone,
        'amount' => $refund->amount,
  
        'bank' => $refund->payment->bank,
        'acct_name' => $refund->payment->acct_name,
        'acct_no' => $refund->payment->acct_no,
        'ref_no' => $refund->ref_no

    ];
    $pdf = PDF::loadView('pdf.invoice_refund', $data);
    return $pdf->stream('document.pdf');
}


 /*function generate_pdf_refund(Request $request, $id) {
        $refund = Refund::findOrFail($id);

        

    $data = [
        'First_name' => $refund->user->first_name,
        'last_name' => $refund->user->last_name,
        'address' => $refund->user->address,
        'city' => $refund->user->city,
        'state' => $refund->user->state,
        'phone' => $refund->user->phone,
        'amount' => $refund->amount,
        'method' => $refund->method,
        'bank' => $refund->owner->bank,
        'acct_name' => $refund->owner->acct_name,
        'acct_no' => $refund->owner->acct_no
    ];
    $pdf = PDF::loadView('pdf.invoice', $data);
    return $pdf->stream('document.pdf');
}*/

    // Complete request
    public function complete(Request $request, $id){
        if($request->ajax()) {
            $withdrawal = Withdrawal::findOrFail($id);
            $withdrawal->status = 1;
            $withdrawal->touch();
            $withdrawal->save();

             $trans = new Transaction;

               

                        $trans->user_id = $withdrawal->user_id;
                        $trans->ref_no = $withdrawal->ref_no;
                        $trans->description = 'Received Withdrawal';
                        $trans->amount = $withdrawal->amount;
                        $trans->save();

                        $trans2 = new Transaction;

                        $trans2->user_id = 1;
                        $trans2->ref_no = $withdrawal->ref_no;;
                        $trans2->description = 'Pay Withdrawal To Host';
                        $trans2->amount = $withdrawal->amount;
                        $trans2->state = 1;
                        $trans2->save();

                        $owner = Owner::where('user_id', $withdrawal->user_id)->first();


                        $mail_data['first_name'] = $owner->first_name;
                        $mail_data['email']= $owner->user->email;
                        $mail_data['subject']= 'Successful Withdrawal Request';
                        $mail_data['amount']= $withdrawal->amount;


                   

                           // Create the mail and send it
              Mail::send('emails.withdrwal_success', ['mail_data' => $mail_data], function ($m) use ($mail_data) {
                $m->from('admin@hoocay.com', 'hoocay.com')
                ->to($mail_data['email'], $mail_data['first_name'])
                ->subject($mail_data['subject']);
            });

            return response()->json(get_string('completed_request'), 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
        }
    }

     public function transaction(){
       
    
        $trans = Transaction::orderBy('created_at', 'desc')->where('user_id', 1)->paginate(10);
       
       
     
        return view('admin.transaction', compact('trans'));
    }

    public function completeRefund(Request $request, $id){
        if($request->ajax()) {
            $refund = Refund::findOrFail($id);
            $refund->status = 1;
            $refund->touch();
            $refund->save();

             $trans = new Transaction;

                        $random= rand(000000,999999);

                        $trans->user_id = $refund->user_id;
                        $trans->ref_no = $refund->ref_no ;
                        $trans->description = 'Received refund';
                        $trans->amount = $refund->amount;
                        $trans->save();

                        $trans2 = new Transaction;

                      

                        $trans2->user_id = 1;
                        $trans2->ref_no = $refund->ref_no;
                        $trans2->description = 'Refund Paid';
                        $trans2->amount = $refund->amount;
                        $trans2->state = 1;
                        $trans2->save();

            return response()->json(get_string('completed_request'), 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
        }
    }

    // Complete request
    public function dismiss(Request $request, $id){
        if($request->ajax()) {
            $withdrawal = Withdrawal::findOrFail($id);
            $withdrawal->status = 0;

            // Edit User
            $user = Owner::where('user_id', $withdrawal->user_id)->first();
            $user->active_balance += $withdrawal->amount;
            $user->save();

            $withdrawal->touch();
            $withdrawal->save();
            return response()->json(get_string('dismissed_request'), 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
        }
    }

    // Delete request
    public function delete(Request $request, $id){
        if($request->ajax()) {
            $withdrawal = Withdrawal::findOrFail($id);
            $withdrawal->delete();
            return response()->json(get_string('delete_request_completed'), 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
        }
    }

        // Delete request
    public function  deleteRefund(Request $request, $id){
        if($request->ajax()) {
            $refund = Refund::findOrFail($id);
            $refund->delete();
            return response()->json(get_string('delete_request_completed'), 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
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

    public function userPaymentInfo(Request $request, $id){
       if($request->ajax()) {
            $userPaymentInfo = payment_info::where('user_id',$id)->first();

            if($userPaymentInfo){
             $data = 'Bank Name: '.$userPaymentInfo->bank.'</br></br> Account Name: '. $userPaymentInfo->acct_name.'</br></br>Account No: '.$userPaymentInfo->acct_no ;
            }

            else{
            	$data = 'User not verify payment info yet.';

            }
     

            
            return response()->json($data, 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
       }
    }

    //refund
     public function refund(){
        $refund = Refund::orderBy('created_at','desc')->paginate(10);
        $currency_code = get_setting('currency_code', 'site');
        $currency = currency()->getCurrency($currency_code);
        $currency = $currency['symbol'] ? $currency['symbol'] : '';
        return view('admin.owner.refunded', compact('refund', 'currency'));
    }
}
