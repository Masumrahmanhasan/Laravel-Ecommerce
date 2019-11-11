<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Notifications\RegistrationEmailNotification;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['only'=> 'logout']);
	}
	public function loginView()
	{

		return view('frontend.auth.login');
	}
	public function loginProcess(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$cardentials = $request->only(['email', 'password']);

		if (auth()->attempt($cardentials))
		{
			if (auth()->user()->email_verified_at === null)
			{
				$this->setError('Your Account is not activated!');
				return redirect()->route('login.view');
			}

			$this->setSuccess('User logged in');
			return redirect('/');
			
		}
		
		$this->setError('Invalid Cardentials');
		return redirect()->back();
	}
	public function registerView()
	{
		return view('frontend.auth.register');
	}

	public function registerProcess(Request $request)
	{
		$validator = Validator::make($request->all(), [

			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'phone' => 'required|min:11|max:13|unique:users,phone',
			'password' => 'required|min:6',

		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		try {
			$data['name'] = $request->input('name');
			$data['email'] = strtolower($request->input('email'));
			$data['phone'] = $request->input('phone');
			$data['password'] = bcrypt($request->input('password'));
			$data['email_verification_token'] = uniqid(time(), true).Str::random(16);
			$user = User::create($data);

			$user->notify(new RegistrationEmailNotification($user));

			$this->setSuccess('Account Created Successfully');
			return redirect()->route('login.view');

		} catch (Exception $e) {

			$this->setError($e->getMessage());
			return redirect()->back();
		}

	}

	public function logout()
	{
		auth()->logout();
		return redirect('/');
	}
	public function activate($token)
	{
		if ($token === null) {
			return redirect('/');
		}

		$user = User::where('email_verification_token', $token)->firstOrFail();
		if ($user) {

		$user->update([
			'email_verified_at' => Carbon::now(),
			'email_verification_token' => null,

		]);
			$this->setSuccess('Account Activated Now you can login');
			return redirect()->route('login.view');
		}

		$this->setError('Invalid token');
			return redirect()->route('login.view');
	}
}
