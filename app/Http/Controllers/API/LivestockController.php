<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\LiveStock;


class LivestockController extends Controller
{
    public function all()
    {
        return response()->json(LiveStock::all());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag' => 'required',
            'name' => 'required',
            'image' => 'required',
            'type' => 'required',
            'breed' => 'required|integer',
            'stage' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'age' => 'required|integer',
            'weight' => 'required',
            'source' => 'required|integer',
            'mother_tag' => 'required',
            'father_tag' => 'required',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new LiveStock([
                'tag' => $request->post('tag'),
                'name' => $request->post('name'),
                'image' => $request->post('image'),
                'type' => $request->post('type'),
                'breed' => $request->post('breed'),
                'stage' => $request->post('stage'),
                'gender' => $request->post('gender'),
                'date_of_birth' => $request->post('date_of_birth'),
                'age' => $request->post('age'),
                'weight' => $request->post('weight'),
                'source' => $request->post('source'),
                'mother_tag' => $request->post('mother_tag'),
                'father_tag' => $request->post('father_tag'),
                'comments' => $request->post('comments'),
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }

    public function offspring_all(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tag' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            return response()->json(array(
                'success' => true,
                'data' => LiveStock::where('mother_tag', $request->get('tag'))->orWhere('father_tag', $request->get('tag'))->get()
            ));
        }  
    }
}
