<?php

namespace App\Http\Controllers;

use App\Models\Admin\Booking;
use App\Models\Admin\UserRequest;
use App\Models\User;
use App\Models\Refund;
use App\Models\UserInfo;
use App\Models\Payment_info;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Admin\Owner;
use App\Models\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
class UserController extends Controller
{
    protected $static_data, $default_language, $activationFactory;
    public function __construct(){
        $this->static_data = static_home();
        $this->default_language = default_language();
    }

    public function index(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;
        $currency_code = get_setting('currency_code', 'site');
        $currency = currency()->getCurrency($currency_code);
        $currency = $currency['symbol'] ? $currency['symbol'] : '';
        if($static_data['user']){
            $request = (UserRequest::where('user_id', $static_data['user']->id)->first()) ? false : true;
            $bookings = Booking::where('user_id', $static_data['user']->id)->get();
        }else{
            $request = null;
            $bookings = null;
        }  
       //
       if(Str::startsWith($static_data['user']->username , '@fb')){
        $static_data['user']->username = '';

}
        return view('home.account.my_account', compact('static_data', 'default_language', 'request', 'bookings', 'currency'));
    }

        public function profile(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;
        $currency_code = get_setting('currency_code', 'site');
        $currency = currency()->getCurrency($currency_code);
        $currency = $currency['symbol'] ? $currency['symbol'] : '';
        if($static_data['user']){
            $request = (UserRequest::where('user_id', $static_data['user']->id)->first()) ? false : true;
            $bookings = Booking::where('user_id', $static_data['user']->id)->orderBy('created_at')->paginate(10);
            $photo = Image::where('imageable_id',$static_data['user']->id)->where('imageable_type','profile_photo')->first();
            $refund = Refund::where('user_id',$static_data['user']->id)->orderBy('created_at')->paginate(10);
    
        }else{
            $request = null;
            $bookings = null;
        }  
       //
       if(Str::startsWith($static_data['user']->username , '@fb')){
        $static_data['user']->username = '';


      
       // return response()->json($static_data['user']);

}
        return view('home.account.my_profile', compact('static_data', 'default_language', 'request', 'bookings', 'currency','photo','refund'));
    }


     public function bookingInfo(Request $request, $id){
        if($request->ajax()) {
            $booking = Booking::findOrFail($id);

            $msg = "Booking no : ". $booking->booking_ref . "</br> Property Name: ". $booking->property->contentload->name ."</br>";

            return response()->json($msg, 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
       }
    }


 public function BookingCancel(Request $request, $id){
        if($request->ajax()) {
            $booking = Booking::findOrFail($id);
            $payment = Payment_info::where('user_id',$booking->user_id)->first();
              $refund = new Refund;
               $random= rand(000000,999999);
               $commission = Setting::where('key','host_commission')->pluck('value')->first();

               $charge =  $booking->total * $commission / 100;
                       

                        $refund->user_id = $booking->user_id;
                        $refund->ref_no = "R-".$random;
                        $refund->booking_id = $booking->booking_ref;
                        $refund->description = 'Guest canceled booking';
                        $refund->amount = $booking->total;

                        $trans = new Transaction;



                        $trans->user_id = 1;
                        $trans->ref_no = "R-".$random;
                        $trans->description = 'Service charge deduction for full refund payment';
                        $trans->amount = $booking->total - $charge;
                        $trans->state = 1;
                        $trans->save();
                       


          

            if($payment){

                $refund->status = 0;


                        $mail_data['first_name'] = $booking->user->username;
                        $mail_data['email']= $booking->user->email;
                        $mail_data['Booking_no']= $booking->booking_ref;
                        $mail_data['refund_ref'] = $refund->ref_no;
                        $mail_data['subject']= 'Refund Request';
                        $mail_data['amount']= $booking->total;


                   

                           // Create the mail and send it
              Mail::send('emails.refund_request', ['mail_data' => $mail_data], function ($m) use ($mail_data) {
                $m->from('admin@hoocay.com', 'hoocay.com')
                ->to($mail_data['email'], $mail_data['first_name'])
                ->subject($mail_data['subject']);
            });

        }

      else{
               $refund->status = 2;
        }  

      
         $refund->save();

         $booking->completed = 2;
            $booking->save();
            $owner = Owner::where('user_id', $booking->owner_id)->first();

            $owner->pending_balance -= $booking->total;
            $owner->save();
                        $mail_data['first_name'] = $booking->user->username;
                        $mail_data['email']= $booking->user->email;
                        $mail_data['Booking_no']= $booking->booking_ref;
                        $mail_data['properties']= $booking->property->alias;
                        $mail_data['checkin']= $booking->start_date;
                        $mail_data['checkout']= $booking->end_date;
                        $mail_data['subject']= 'Booking Cancel';
                        $mail_data['amount']= $booking->total;


                   

                           // Create the mail and send it
              Mail::send('emails.booking_cancel', ['mail_data' => $mail_data], function ($m) use ($mail_data) {
                $m->from('admin@hoocay.com', 'hoocay.com')
                ->to($mail_data['email'], $mail_data['first_name'])
                ->subject($mail_data['subject']);
                });
            $msg = 'Your booking cancelation has succesful, Please check refund status.';

            return response()->json($msg, 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
       }



        }


        public function ConfirmRefund(Request $request){
        if($request->ajax()) {

            $static_data = $this->static_data;

            


            $refund = Refund::findOrFail($request->id);
            $refund->status = 0;
            $refund->save();
          //  $owner = Owner::where('user_id', $booking->owner_id)->first();

          $payment = new Payment_info;

          $payment->user_id = $static_data['user']->id;
          $payment->bank =  $request->bank;
          $payment->acct_no =  $request->acct_no;
          $payment->acct_name =  $request->acct_name;
          $payment->save();



          
            $msg = 'Your Refund has been confirmed. Please check your email for details.';

           return response()->json($msg, 200);
        }else{
            return response()->json(get_string('something_happened'), 400);
       }



        }

    

    public function login(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;
       // Session::put('url.intended',URL::previous());
        $isbook = Session::get('isbook');

         if(!$isbook)
         {
             Session::forget('property.url');
         }
        


       // return response()->json($isbook);

        return view('home.account.login', compact('static_data', 'default_language','isbook'));
    }

    public function register(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;

        return view('home.account.register', compact('static_data', 'default_language'));
    }

    public function register_owner(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;

        return view('home.account.register_owner', compact('static_data', 'default_language'));
    }

    public function update(Request $request){
        $static_data = $this->static_data;
        $this->validate($request, [
            'username'  => 'required|unique:users,id,'.$request->id,
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
          //  'email' => 'required|email|max:255|unique:users,email,'.$request->email,
            'phone' => 'phone_number|required',
            'password' => 'min:6|confirmed',
        ],[
            'username.required'     => $static_data['strings']['required_field'],
            'phone.phone_number'    => $static_data['strings']['phone_number_validation'],
            'username.unique'       => $static_data['strings']['not_unique_field'],
            'first_name.max'        => $static_data['strings']['max_20'],
            'last_name.max'         => $static_data['strings']['max_20'],
            'email.email'           => $static_data['strings']['email_invalid'],
            'first_name.required'   => $static_data['strings']['required_field'],
            'last_name.required'    => $static_data['strings']['required_field'],
            'password.min'          => $static_data['strings']['min_6'],
            'email.required'        => $static_data['strings']['required_field'],
            'email.unique'          => $static_data['strings']['not_unique_field'],
            'phone.required'        => $static_data['strings']['required_field'],
        ]);

        $user = User::findOrFail($request->id);
       

        // User info
        $user_info = UserInfo::where('user_id', $user->id);
        //Owner info
        $owner_info = Owner::where('user_id', $user->id);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone'     => $request->phone,
        ];
        //$data['username'] = $request->username;        
        $user_info->update($data);
        $owner_info->update($data);
        unset($data);

        // Update user
        if(isset($request->password)) $data['password'] = bcrypt($request->password);
        $data['username'] = $request->username; 
        $data['email'] = $request->email;
        $user->touch();
        $user->update($data);

        Session::flash('account_updated', true);
        return redirect('/');
    }

    public function request(Request $request){
        if($request->ajax()){
            UserRequest::create([
                'user_id' => $request->id,
                'request' => 1,
                'completed' => 0,
            ]);
            
            return response()->json($request);
            //return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 400);
        }
    }

    public function resend(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;

        return view('home.account.resend_activation', compact('static_data', 'default_language'));
    }

    public function resetPassword(){
        $static_data = $this->static_data;
        $default_language = $this->default_language;

        return view('home.account.reset_password', compact('static_data', 'default_language'));
    }

    public function activateAccount(){
        $static_data = $this->static_data;
        return view('home.account.activate_error', compact('static_data'));
    }

    public function changeLanguage(Request $request){
        if($request->ajax()) {
            Session::set('language', $request->code);
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 400);
        }
    }

    public function changeCurrency(Request $request){
        if($request->ajax()) {
            // currency()->setUserCurrency($request->code);
            Session::set('currency', $request->code);
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 400);
        }
    }

    public function savePhoto(Request $request){

        if(isset($request->images)){


$validation = Validator::make( $request->all(), [
    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);
        
if ( $validation->fails() ) {
    // change below as required
    return back()

            ->with('error','Image invalid');
}
            $imageName = uniqid() . unique_string() .'.'. $request->images->getClientOriginalExtension();
            $date = date('M-Y');
             $request->images->move(public_path('/images/data/'. $date .'/'), $imageName);
             $path = $date .'/'. $imageName;

             $photo = Image::where('imageable_id',$request->id)->where('imageable_type','profile_photo')->first();


       if($photo->count()){

      // 	$id = $photo->id;
    // Image::findOrFail($photo->id)->first()->fill(save(['image' => $path, 'imageable_id' => $request->id, 'imageable_type' => 'profile_photo']));
        //$photo->update(['image' => $path, 'imageable_id' => $request->id, 'imageable_type' => 'profile_photo']);

     $temp = Image::find($photo->id);
     $temp->image = $path;
     $temp->imageable_id = $request->id;
     $temp->save();

       }
       else{
                Image::Create(['image' => $path, 'imageable_id' => $request->id, 'imageable_type' => 'profile_photo']);
            }
           
            
        
            return back()

            ->with('success','You have successfully upload image.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
