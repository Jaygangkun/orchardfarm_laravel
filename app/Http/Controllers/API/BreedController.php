<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Breed;


class BreedController extends Controller
{
    public function all()
    {
        return response()->json(Breed::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'animal_type' => 'required|integer',
            'name' => 'required',
            'ears' => 'required',
            'horns' => 'required',
            'heights' => 'required|numeric',
            'temperament' => 'required',
            'bearded' => 'required',
            'fertility_rate' => 'required',
            'likely_offspring_number' => 'required',
            'kid_likely_weight' => 'required|numeric',
            'comments' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new Breed([
                'animal_type' => $request->post('animal_type'),
                'name' => $request->post('name'),
                'ears' => $request->post('ears'),
                'horns' => $request->post('horns'),
                'heights' => $request->post('heights'),
                'temperament' => $request->post('temperament'),
                'bearded' => $request->post('bearded'),
                'fertility_rate' => $request->post('fertility_rate'),
                'likely_offspring_number' => $request->post('likely_offspring_number'),
                'kid_likely_weight' => $request->post('kid_likely_weight'),
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
