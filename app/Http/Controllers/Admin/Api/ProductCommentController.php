<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Product_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCommentController extends Controller
{
    public function index($id){
        $comments = Product_comment::where('product_id', $id)->orderBy('created_at')->get();

        return response()->json([
            'data'=>$comments,
            'code'=>200,
            'message'=>'is Ok!'
        ]);
    }
   public function addForm(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required|max:255',
           'email' => 'required|max:255',
           'message' => 'required|max:255',
       ]);

       if ($validator->fails()) {
          return response()->json([
               'data'=>$validator->errors()->all(),
               'code'=>400,
               'message'=>'Failed!'
           ]);
       }


       $comments = Product_comment::create([
           'user_id'=>$request->userId,
           'product_id'=>$request->productId,
           'name'=>$request->name,
           'email'=>$request->email,
           'message'=>$request->message
       ]);
       if ($comments){
           return response()->json([
               'data'=>$comments,
               'code'=>200,
               'message'=>'is Ok!'
           ]);
       }


   }
}
