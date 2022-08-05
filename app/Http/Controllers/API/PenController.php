<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Pen;


class PenController extends Controller
{
    public function all()
    {
        return response()->json(Pen::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'animal_type' => 'required|integer',
            'location' => 'required',
            'comments' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new Pen([
                'name' => $request->post('name'),
                'animal_type' => $request->post('animal_type'),
                'location' => $request->post('location'),
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
