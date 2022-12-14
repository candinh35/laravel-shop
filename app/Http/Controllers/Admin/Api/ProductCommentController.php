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
//       $validator = Validator::make($request->all(), [
//           'name' => 'required|max:255',
//           'email' => 'required|max:255',
//           'message' => 'required|max:255',
//           'rating'=> 'required'
//       ]);
//       if ($validator->fails()) {
//           return redirect('post/create')
//               ->withErrors($validator)
//               ->withInput();
//       }

        $data = $request->only('user_id', 'product_id', 'name', 'email', 'message', 'rating');
       $comments = Product_comment::create($data);
       if ($comments){
           return response()->json([
               'data'=>$comments,
               'code'=>200,
               'message'=>'is Ok!'
           ]);
       }
       return response()->json([
           'data'=>null,
           'code'=>400,
           'message'=>'Failed!'
       ]);

   }
}
