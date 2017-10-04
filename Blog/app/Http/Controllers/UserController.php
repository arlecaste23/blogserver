<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Support\Facades\Auth;

use Validator;

//To use the db class
use Illuminate\Support\Facades\DB;

class UserController extends Controller

{


    public $successStatus = 200;


    /**

     * login api

     *

     * @return \Illuminate\Http\Response

     */

    public function login(){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->accessToken;
		$success['id'] = $user->id;
            return response()->json(['success' => $success], $this->successStatus);

        }

        else{

            return response()->json(['error'=>'Unauthorised'], 401);

        }

    }


    /**

     * Register api

     *

     * @return \Illuminate\Http\Response

     */

    public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required',

            'c_password' => 'required|same:password',

        ]);


        if ($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);            

        }


        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $success['name'] =  $user->name;
	$success['id'] = $user->id;

        return response()->json(['success'=>$success], $this->successStatus);

    }

	/**

     * logout api

     *

     * @return \Illuminate\Http\Response

     */

    public function logout($id)

    {
	//Removing all tokens associated to the current id
	
        $tk = DB::table('oauth_access_tokens')->where('user_id', '=', $id)->delete();

        return response()->json($this->successStatus);


    }

    /**

     * details api

     *

     * @return \Illuminate\Http\Response

     */

    public function details()

    {

        $user = Auth::user();

        return response()->json(['success' => $user], $this->successStatus);

    }

}
