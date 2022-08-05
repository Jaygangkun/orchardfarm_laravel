<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\UserRole;

class UserController extends Controller
{
    public function login()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ose.auth0.com/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials&client_id='.env('AUTH0_CLIENT_ID').'&client_secret='.env('AUTH0_CLIENT_SECRET').'&audience='.env('AUTH0_AUDIENCE'),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: did=s%3Av0%3A8289f310-137a-11ed-926c-8b36ce525b8d.AjSxJq016J3AKHLn8M1PnyRoY1c0aFxRKn1pLVVwA1k; did_compat=s%3Av0%3A8289f310-137a-11ed-926c-8b36ce525b8d.AjSxJq016J3AKHLn8M1PnyRoY1c0aFxRKn1pLVVwA1k'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;     

        return response()->json(json_decode($response, true));
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new User([
                'username' => $request->post('username'),
                'password' => $request->post('password'),
                'email' => $request->post('email'),
                'mobile' => $request->post('mobile')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }

    public function forgot_password(Request $request)
    {
       
        return response()->json(array(
            'success' => true,
            'message' => 'sent'
        ));
    }

    public function all()
    {
        return response()->json(User::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'nickname' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'image' => 'required',
            'role' => 'required|integer',
            // 'active' => 'required|integer',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new User([
                'username' => $request->post('username'),
                'name' => $request->post('name'),
                'nickname' => $request->post('nickname'),
                'password' => $request->post('password'),
                'email' => $request->post('email'),
                'mobile' => $request->post('mobile'),
                'image' => $request->post('image'),
                'role' => $request->post('role'),
                'active' => 0,
                'comments' => $request->post('comments')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }

    public function role_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:user_roles,name'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new UserRole([
                'name' => $request->post('name')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }
}
