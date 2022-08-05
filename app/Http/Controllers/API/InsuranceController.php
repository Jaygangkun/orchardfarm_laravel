<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Insurance;


class InsuranceController extends Controller
{
    public function all()
    {
        return response()->json(Insurance::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'plan_type' => 'required',
            'policy_amount' => 'required|numeric',
            'anniversary_date' => 'required|date_format:Y-m-d',
            'frequency' => 'required',
            'contact_details' => 'required',
            'comments' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new Insurance([
                'name' => $request->post('name'),
                'plan_type' => $request->post('plan_type'),
                'policy_amount' => $request->post('policy_amount'),
                'anniversary_date' => $request->post('anniversary_date'),
                'frequency' => $request->post('frequency'),
                'contact_details' => $request->post('contact_details'),
                'comments' => $request->post('comments')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }
    
        
    }
}
