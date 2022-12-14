<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog_comment;
use App\Models\User;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public  function add(Request $request)
    {
        Blog_comment::create($request->all());
        return back();
    }

    public function delete($id)
    {
        Blog_comment::find($id)->delete();
        return back();
    }
}
