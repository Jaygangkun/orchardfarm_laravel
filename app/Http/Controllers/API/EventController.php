<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\EventGroup;
use App\Models\EventIndividual;
use App\Models\EventType;

class EventController extends Controller
{
    public function group_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'animal_type' => 'required|integer',
            'type' => 'required|integer',
            'start_date' => 'required|date_format:Y-m-d',
            'frequency' => 'required',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new EventGroup([
                'name' => $request->post('name'),
                'animal_type' => $request->post('animal_type'),
                'type' => $request->post('type'),
                'start_date' => $request->post('start_date'),
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

    public function individual_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tag' => 'required',
            'type' => 'required|integer',
            'date' => 'required|date_format:Y-m-d',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new EventIndividual([
                'name' => $request->post('name'),
                'tag' => $request->post('tag'),
                'type' => $request->post('type'),
                'date' => $request->post('date'),
                'comments' => $request->post('comments')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }

    public function type_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:event_types,name',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new EventType([
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
