<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Hash;
use Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect admins after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:web')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        if(!empty(Auth::user()->id)){

            return redirect()->back();

        }else{
            return view('admin.login');
        }
        
    }

    public function showUserLoginForm()
    {
        if(!empty(Auth::guard('web')->check())){
            return redirect()->back();
        }
        else{
            return view('login');
        }
        
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function userdashboard()
    {
        return redirect()->route('Front.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            ]);
            
            if($validator){
                $user = Admin::where('email', $request->email)->first();
                // dd($user);
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        Auth::login($user);
                        return redirect()->route('admin.dashboard');
                    } else {
                        $errors['password'] = 'You have entered wrong password';
                    }
                } else {
                    $errors['email'] = 'This email is not register with us';
                }
                return back()->withErrors($errors)->withInput($request->all());  
                // dd("faild");
            }

    }

    public function userlogin(Request $request)
    {
        // dd($request->all());
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            ]);
            
            if($validator){
                $user = User::where('email', $request->email)->first();
                if ($user) {

                    if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                        // if successful, then redirect to their intended location
                        return redirect()->intended(route('front.index'));
                    }else{
                        $errors['password'] = 'This password is not matched';
                    }
                }else{
                    $errors['email'] = 'This email is not register with us';
                }

            return back()->withErrors($errors)->withInput($request->all());
        }

    }

    public function userregister(){
        return view('registration');
    }

    public function registration(Request $request){
        
        $request->validate([
            "name" => ['required'],
            "email" => 'required|email|unique:users',
            "password" => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
            "address" => ['required'],
            "image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
            "phone_no" => ['required'],
            "pincode" => ['required'],
            "city" => ['required'],
            "state" => ['required'],
            "country" => ['required'],
            "status" => ['required'],
        ]);

        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/user_image';
            // Upload file
            $file->move($location, $filename);
            // File path
            $user_image_filepath = ($location . "/" . $filename);
        }


        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->address = $request->address;
        if($request->image){
        $User->image = $user_image_filepath;
        }
        $User->phone_no = $request->phone_no;
        $User->pincode = $request->pincode;
        $User->city = $request->city;
        $User->state = $request->state;
        $User->country = $request->country;
        $User->status = $request->status;
        $User->save();

        if (!$User) {
            return $this->responseRedirectBack('Error occurred while creating User.', 'error', true, true);
        }
        Session::flash('success', "User registerd successfully");
        return redirect()->route('user.login');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        // return redirect()->route('user.login');
        return redirect('/');
    }

    public function change_password(Request $request){

       $request->validate([
        'current_password' => 'required|min:6',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password|min:6|',
    ]);

    }


    public function forgotPassword(Request $request)
    {
    	if ($request->method() === 'GET') {
    		return view('admin.forgot');
    	}
    	else if($request->method() === 'POST'){
    		return abort(404);
    	}
    }


    public function sendResetLink(Request $request)
    {
    	$user_data = Admin::where('email', $request->email)->first();
        if(empty($user_data)){
            $user_data = User::where('email', $request->email)->first();
        }

    	if (is_null($user_data)) {
    		Session::flash('error', "Invalid Email ID !!");
        	return redirect()->back();
    	}
    	
    	$user_data->remember_token = md5(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5))."-".time(); //<-- Create a random key with current timestamp

    	$user_data->save();
        $user_data->refresh();
        $email_data = array(
            'name'       => $user_data->name,
            'link' => route('resetPassword',$user_data->remember_token),
            'blade_file' => 'mail_forget',
            'Usermail' => $user_data->email,
            'subject' => 'forgot password mail',
        );

        PasswordResetMail($email_data);

        // Notification::route('mail', $request->email)->notify(new AdminPasswordReset($email_data));
        Session::flash('success', "Reset password link has been sent on your email id");
        return redirect()->back();
    }

    public function resetPassword(Request $request, $token)
    {
    	if ($request->method() === 'GET') {
    		//Check Rand Key Is Exists------------------->
    		$email = Admin::where('remember_token', $token)->first();
            if(empty($email)){
                $email = User::where(['remember_token' => $request->token])->first();
            }

            if ($email) {
                $email = $email->email;
            }

    		if(Admin::where('remember_token', $token)->count() > 0){
                //Check if Rand Key Expired or Not----------->
                $timestamp = explode('-', $token)[1];
                if(time() - $timestamp <= 60*60){ // <--- If Key not expired (1hr For testing)
                    
                    return view('admin.reset_password')->with(['email' => $email, 'token' => $token]);
                }
                else{
                    Session::flash('error', "Your password reset link was expired!");
                    return redirect()->route('admin.forgotPassword');
                }

    		}elseif(User::where('remember_token', $token)->count() > 0){

                $timestamp = explode('-', $token)[1];
                if(time() - $timestamp <= 60*60){ // <--- If Key not expired (1hr For testing)
                    
                    return view('admin.reset_password')->with(['email' => $email, 'token' => $token]);
                }
                else{
                    Session::flash('error', "Your password reset link was expired!");
                    return redirect()->route('admin.forgotPassword');
                }

            }
    		else{
                Session::flash('error', "Your password reset link was expired!");
                return redirect()->route('forgotPassword');
    		}
    	}
    	else if($request->method() === 'POST'){
    		$user = Admin::where(['remember_token' => $request->token])->first();
            if(empty($user)){
                $user = User::where(['remember_token' => $request->token])->first();
            }

                if (Hash::check($request->password, $user->password)) {
                    Session::flash('error', "Old Password Cannot be same as new password");
                    return redirect()->back();
                }
                else{
                // 			if ($request->password !== $request->password_confirmation) {
                // 				Session::flash('warning', "Passwords Mismatched");
                // 				return redirect()->back();
                // 			}
                        
    			$validator = Validator::make($request->all(), [
                     'password' => 'required|min:6',
                     'password_confirmation' => 'required|same:password|min:6|',                   
                    ]
                );
                $validationError = $validator->errors();
                if($validator->fails()){
                    return redirect()->back()
                        ->withErrors($validationError,'reset_password_warning')
                        ->withInput($request->all());
                }
    			$user->remember_token = md5(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5))."-".time(); //<-- Create a random key with current timestamp

    			$user->password = Hash::make($request->password);
    			$user->save();

    			Session::flash('success', "Password Changed Successfully");
    			// return redirect()->route('admin.login');
                return redirect('/');
    		}
    	}
    }
}
