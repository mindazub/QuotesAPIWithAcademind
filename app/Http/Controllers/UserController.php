<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use DB;
use Response;
/**
* 
*/
class UserController extends Controller
{
	public function all(){
		// $all_users = DB::raw('select * from users');
		// return $all_users = User::orderBy('created_at', 'desc')->get();
		// return response()->json([$all_users], 200);
		return Response::json(User::with('token', 'password')->get());

	}
	public function signup(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required'
			]);

		$user = new User([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password'))
			]);
		$user->save();
		return response()->json([
			'message' => 'Successfully created user!'
			], 201);
	}

	public function signin(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required'
			]);

		$credentials = $request->only('email', 'password');

		try{
			if(!$token = JWTAuth::attempt($credentials)){
				return response()->json([
						'error' => 'Invalid Credentials'
					], 401);
			}
		} catch (JWTException $e){
			return response()->json([
				'error' => 'Could not create token!'
				], 500);
		}
		return response()->json([
			'token' => $token
			], 200);


	}
}