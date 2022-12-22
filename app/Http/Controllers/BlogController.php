<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function dashboard()
    {
        $allCatsNames=[];
        $all = $this->allitems();
        foreach($all[1] as $cat){
            $allCatsNames[] = $cat->name;
        }

        $count = Category::groupBy('name')->select('name', DB::raw('count(*) as total'))->get();

        $r=[];
        for ($i=0; $i <count($count) ; $i++) {
                $r[] = $count[$i]->name;
                $r[] = $count[$i]->total;
        }
        // $data = json_encode($r);
        return view('admin.index', compact('r'));
    }

    public function allitems()
    {
        $blogs =  Blog::all();
        $cats =  Category::all();
        $arr = [$blogs,$cats];
        return $arr;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = $this->allitems();
        return view('admin.blog.blog', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'image' => ['required'],
            'author' => ['required','string','max:255'],
            'category' => ['required'],
            'article'=> ['required','string','max:30000'],
        ]);
        $extension = $request->image->extension(); //Image file extension eg. jpg or png
        $directory = 'uploads/' . date('Y') . '/' . date('m'); //Upload and move image into this directory
        $id = Str::random(15); //Random 8 character string
        $image_name = $id . '.' . $extension;
        $full_save_path_name = $directory . '/' . $image_name;
        $request->image->move(public_path($directory), $image_name); //Save into: public/images

        Blog::create([
            'title' => $request->title,
            'image' => $full_save_path_name,
            'author' => $request->author,
            'cat_id' => $request->category,
            'article' => $request->article,
        ]);
        return redirect()->back()->with('status', 'blog was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $cat = Category::find($blog->cat_id);
        return view('admin.blog.show', compact('blog','cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function showeditpage(Blog $blog,$id)
    {   $all = $this->allitems();
        $cats = $all[1];
        $blog = Blog::find($id);
        $cat = Category::find($blog->cat_id);
        return view('admin.blog.edit',compact('blog','cat','cats'));
    }
    public function edit(Blog $blog)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   if($request->image){
        $request->validate([
            'title' => ['required','string','max:255'],
            'image' => ['required'],
            'author' => ['required','string','max:255'],
            'category' => ['required'],
            'article'=> ['required','string','max:30000'],
        ]);
        $extension = $request->image->extension(); //Image file extension eg. jpg or png
        $directory = 'uploads/' . date('Y') . '/' . date('m'); //Upload and move image into this directory
        $id = Str::random(15); //Random 8 character string
        $image_name = $id . '.' . $extension;
        $full_save_path_name = $directory . '/' . $image_name;
        $request->image->move(public_path($directory), $image_name); //Save into: public/images


        $blog = Blog::find($request->id);
        $blog->update([
            'title' => $request->title,
            'image' => $full_save_path_name,
            'author' => $request->author,
            'cat_id' => $request->category,
            'article' => $request->article,
        ]);
        return redirect('/blogs')->with('edit', 'blog was updated');
        }
        $request->validate([
            'title' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'category' => ['required'],
            'article'=> ['required','string','max:30000'],
        ]);
        $blog = Blog::find($request->id);
        $blog->update([
            'title' => $request->title,
            'author' => $request->author,
            'cat_id' => $request->category,
            'article' => $request->article,
        ]);

        return redirect('/blogs')->with('edit', 'blog was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog,$id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('del', 'blog was deleted');
    }
}
