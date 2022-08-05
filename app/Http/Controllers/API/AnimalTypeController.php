<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AnimalType;


class AnimalTypeController extends Controller
{
    public function all()
    {
        return response()->json(AnimalType::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:animal_types,name',
            'image' => 'required',
            'gestation_days' => 'required|integer',
            'adult_months' => 'required|integer',
            'kids_months' => 'required|integer',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new AnimalType([
                'name' => $request->post('name'),
                'image' => $request->post('image'),
                'gestation_days' => $request->post('gestation_days'),
                'adult_months' => $request->post('adult_months'),
                'kids_months' => $request->post('kids_months'),
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
