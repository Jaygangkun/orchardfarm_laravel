<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Medicine;


class MedicineController extends Controller
{
    public function all()
    {
        return response()->json(Medicine::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'type' => 'required|integer',
            'quantity_per_dose' => 'required|numeric',
            'frequency' => 'required',
            'comments' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new Medicine([
                'name' => $request->post('name'),
                'description' => $request->post('description'),
                'type' => $request->post('type'),
                'quantity_per_dose' => $request->post('quantity_per_dose'),
                'frequency' => $request->post('frequency'),
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
