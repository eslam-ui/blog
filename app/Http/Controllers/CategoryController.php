<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats =  Category::all();
        return view('admin.category.category', compact('cats'));
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
            'name' => ['required', 'string', 'max:255'],
            ]);

        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('status', 'category was added');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $did = Category::find($request->id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            ]);

            $did->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('edit', 'category was updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $did = Category::where('id', '=', $id)->firstOrFail();
        $did->delete();
        return redirect()->back()->with('del', 'category was deleted');
    }
}
