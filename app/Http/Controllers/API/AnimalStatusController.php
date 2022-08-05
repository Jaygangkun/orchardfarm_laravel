<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AnimalStatus;


class AnimalStatusController extends Controller
{
    public function all()
    {
        return response()->json(AnimalStatus::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag' => 'required',
            'name' => 'required',
            'reason' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'weight' => 'required',
            'sales_price' => 'required',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new AnimalStatus([
                'tag' => $request->post('tag'),
                'name' => $request->post('name'),
                'reason' => $request->post('reason'),
                'date' => $request->post('date'),
                'weight' => $request->post('weight'),
                'sales_price' => $request->post('sales_price'),
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
