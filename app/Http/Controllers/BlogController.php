<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Auth;
use Illuminate\Http\Request;
use Session;

class BlogController extends Controller
{
    protected $rules =[
    'title' => ['required', 'unique:blogs'],
    'body' => ['required','min:50', 'max:1000'],
    ];

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show', 'create', 'store']]);
    }

    public function index()
    {
        $blogs = Blog::where('status', 1)->latest()->get();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $input = $request->all();
        $blog = Blog::create($input);
        if ($categoriesIds = $request->category_id){
            $blog->category()->sync($categoriesIds);
        }
        if ((Auth::user()) && (Auth::user()->role_id == 1)){
            $message = 'New Blog Created as Draft';
            $url = '/admin';
        } else {
            $message = 'New Blog Created pending approval from Administrator';
            $url = '/blog';
        }
        Session::flash('flash_message', $message);
        return redirect($url);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('blog.edit', compact('blog', 'categories'));
    }

    public function publish(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        if ($categoriesIds = $request->category_id){
            $blog->category()->sync($categoriesIds);
        }
        return view('blog.show', compact('blog'));
    }

    public function destroy(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $categoriesIds = $request->category_id;
        $blog->category()->detach($categoriesIds);
        $commentsIds = $request->comment_id;
        $blog->comment()->detach($commentsIds);
        $blog->delete($input);
        return redirect('/blog/trashed');
    }

    public function trashed()
    {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blog.trashed', compact('trashedBlogs'));
    }

    public function restore($id)
    {
        $restoreBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoreBlog->restore($restoreBlog);
        return redirect('blog');
    }

    public function removeFromDB($id)
    {
        $removeFromDB = Blog::onlyTrashed()->findOrFail($id);
        $removeFromDB->forceDelete();
        return back();
    }

    public function addComment(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        if ($categoriesIds = $request->category_id){
            $blog->category()->sync($categoriesIds);
        }
        return view('blog.show', compact('blog'));
    }
}
