<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\FinancialCategory;
use App\Models\FinancialTransaction;

class FinancialController extends Controller
{
    public function category_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'short_name' => 'required',
            'category' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new FinancialCategory([
                'code' => $request->post('code'),
                'short_name' => $request->post('short_name'),
                'category' => $request->post('category')
            ]);

            $obj->save();

            return response()->json(array(
                'success' => true,
                'data' => $obj
            ));
        }    
    }

    public function transaction_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'category' => 'required',
            'amount' => 'required|numeric',
            'receipt_no' => 'required',
            'comments' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => implode(',', $validator->errors()->all())
            ));
        }
        else {
            $obj = new FinancialTransaction([
                'date' => $request->post('date'),
                'category' => $request->post('category'),
                'amount' => $request->post('amount'),
                'receipt_no' => $request->post('receipt_no'),
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
