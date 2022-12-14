<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog_comment;
use App\repositories\blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected  $blogRepo;

    public function __construct( BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepo = $blogRepository;
    }

    public  function index()
    {
       $blogs = $this->blogRepo->getBlog();
       $newBlogs = $this->blogRepo->getNewPost();
       $blogComments = Blog_comment::orderByDesc('created_at')->limit(5)->get();
        return view('client.blog', compact('blogs', 'blogComments', 'newBlogs'));
    }

    public function detail($id)
    {
        if (is_numeric($id) ){
            $blogDetail = $this->blogRepo->find($id);

            if ($blogDetail == null){
                return abort(404);
            }
            $blogDetailComments = $this->blogRepo->getComment($id);
            $newBlogs = $this->blogRepo->getNewPost();
            return view('client.blogDetail', compact('blogDetail', 'blogDetailComments', 'newBlogs'));
        }

            return abort(404);
    }
}
