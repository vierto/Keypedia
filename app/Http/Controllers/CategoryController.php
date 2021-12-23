<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('home')->with('categories', $categories);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_name)
    {
        $categories = Category::all();
        $category = Category::where('category_name', $category_name)->first();
        $keyboards = DB::table('keyboards')
                        ->where('category_id', '=', $category->id)
                        ->simplePaginate(8);
        return view('keyboard')->with('keyboards', $keyboards)->with('categories', $categories)->with('category_name', $category_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $rules = [
            'category_name' => 'required|unique:categories|min:5',
            'category_image' => 'nullable'
        ];

        $request->validate($rules);

        $id = $category_id;
        $category = Category::find($id);

        $imageFile = $request->file('category_image');
        if($imageFile != null){
            Storage::delete('public/'.$category->category_image);
            $imageName = $imageFile->getClientOriginalName();
            Storage::putFileAs('public/categoryImages', $imageFile, $imageName);
            $imagePath = 'categoryImages/'.$imageName;
            $category->category_image = $imagePath;
        }
        else{
            $category->category_image = $category->category_image;
        }

        $category->id = $category_id != null ? $category_id: $category->id;
        $category->category_name = $request->category_name != null ? $request->category_name : $category->category_name;

        $category->save();
        return redirect()->back();
    }

    public function updateCategory($id) {
        $categories = Category::all();
        return view('updateCategory')->with('categories', $categories)->with('category_id', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        Storage::delete('public/'.$category->category_image);
        $category->delete();

        return redirect()->back();
    }
}
