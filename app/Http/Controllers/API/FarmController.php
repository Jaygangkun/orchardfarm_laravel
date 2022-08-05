<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Farm;


class FarmController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'location_lat' => 'required',
            'location_lng' => 'required',
            'image' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new Farm([
                'code' => $request->post('code'),
                'name' => $request->post('name'),
                'address' => $request->post('address'),
                'contact_name' => $request->post('contact_name'),
                'contact_phone' => $request->post('contact_phone'),
                'email' => $request->post('email'),
                'website' => $request->post('website'),
                'location_lat' => $request->post('location_lat'),
                'location_lng' => $request->post('location_lng'),
                'image' => $request->post('image')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }
}
