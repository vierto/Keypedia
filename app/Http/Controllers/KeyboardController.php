<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Pagination\Paginator;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('addKeyboard')->with('categories', $categories);
    }

    public function searchByName(Request $request, $category_name){
        $categories = Category::all();
        $category = Category::where('category_name', $category_name)->first();
        $keyboards = DB::table('keyboards')
                            ->where('category_id', '=', $category->id)
                            ->where('keyboard_name', 'like', '%'.$request->search.'%')
                            ->get();
        return view('keyboard')->with('keyboards', $keyboards)->with('categories', $categories)->with('category_name', $category_name);
    }

    public function searchByPrice(Request $request, $category_name){
        $categories = Category::all();
        $category = Category::where('category_name', $category_name)->first();
        $keyboards = DB::table('keyboards')
                            ->where('category_id', '=', $category->id)
                            ->where('keyboard_price', '<', $request->search)
                            ->get();
        return view('keyboard')->with('keyboards', $keyboards)->with('categories', $categories)->with('category_name', $category_name);
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

        $rules = [
            'category_name' => 'required|in:TKL Mechanical Keyboard, 60% Mechanical Keyboard, 
                                            Full Size Mechanical Keyboard, Full Size Membrane Keyboard',
            'keyboard_name' => 'required|unique:keyboards|min:5',
            'keyboard_price' => 'required|integer|min:30',
            'description' => 'required|min:20',
            'keyboard_image' => 'required'
        ];

        $request->validate($rules);

        $imageFile = $request->file('keyboard_image');
        $imageName = $imageFile->getClientOriginalName();
        
        Storage::putFileAs('public/keyboardImages', $imageFile, $imageName);
        $imagePath = 'keyboardImages/'.$imageName;

        $keyboard = new Keyboard;
        $category = Category::where('category_name', $request->category_name)->first();
        $keyboard->category_id = $category->id;
        $keyboard->keyboard_name = $request->keyboard_name;
        $keyboard->keyboard_price = $request->keyboard_price;
        $keyboard->description = $request->description;
        $keyboard->keyboard_image = $imagePath;

        $keyboard->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_name, $keyboard_name)
    {
        $categories = Category::all();
        $keyboard = DB::table('keyboards')
                            ->where('keyboard_name', '=', $keyboard_name)
                            ->get();
        return view ('detail')->with('keyboard', $keyboard)->with('categories', $categories);
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
    public function update(Request $request, $keyboard_id)
    {

        $rules = [
            'category_name' => 'required',
            'keyboard_name' => 'required|min:5',
            'keyboard_price' => 'required|integer|gt:0',
            'description' => 'required|min:20',
            'keyboard_image' => 'nullable'
        ];

        $request->validate($rules);

        $id = $keyboard_id;
        $keyboard = Keyboard::find($id);
        $category = Category::where('category_name', $request->category_name)->first();
        $imageFile = $request->file('keyboard_image');
        if($imageFile != null){
            Storage::delete('public/'.$keyboard->keyboard_image);
            $imageName = $imageFile->getClientOriginalName();
            Storage::putFileAs('public/keyboardImages', $imageFile, $imageName);
            $imagePath = 'keyboardImages/'.$imageName;
            $keyboard->keyboard_image = $imagePath;
        }
        else{
            $keyboard->keyboard_image = $keyboard->keyboard_image;
        }

        $keyboard->category_id = $category->id != null ? $category->id: $keyboard->category_id;
        $keyboard->keyboard_name = $request->keyboard_name != null ? $request->keyboard_name : $keyboard->keyboard_name;
        $keyboard->keyboard_price = $request->keyboard_price !=null ? $request->keyboard_price : $keyboard->price;
        $keyboard->description = $request->description !=null ? $request->description : $keyboard->description;

        $keyboard->save();
        return redirect()->back();
    }

    public function updateKeyboard($id) {
        $categories = Category::all();
        return view('updateKeyboard')->with('categories', $categories)->with('keyboard_id', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keyboard = Keyboard::find($id);

        Storage::delete('public/'.$keyboard->keyboard_image);
        $keyboard->delete();

        return redirect()->back();
    }
}
