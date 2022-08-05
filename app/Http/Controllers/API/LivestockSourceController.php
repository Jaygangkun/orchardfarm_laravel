<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\LivestockSource;


class LivestockSourceController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new LivestockSource([
                'name' => $request->post('name'),
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }
    
        
    }
}
