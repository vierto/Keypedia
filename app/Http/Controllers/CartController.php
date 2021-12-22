<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Keyboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $carts = DB::table('carts')
                    ->where('id', '=', $user->cartCount)
                    ->where('user_id', '=', Auth::id())
                    ->get();
        $categories = Category::all();
        return view('myCart')->with('categories', $categories)->with('carts', $carts);
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
    public function store(Request $request, $id)
    {
        if(Auth::id() == null){
            return redirect('/login');
        }

        $rules = $request->validate([
            'quantity' => 'required|gt:0'
        ]);

        $keyboard = Keyboard::find($id);
        $user = User::find(Auth::id());
        $cart = Cart::where('keyboard_id', $id)->first();

        if($cart != null) {
            DB::table('carts')
            ->where('id', '=', Auth::user()->cartCount)
            ->where('user_id', '=', Auth::id())
            ->where('keyboard_id', '=', $id)
            ->update(array('quantity' => ($request->quantity + $cart->quantity)));
            
            return redirect()->back()->withErrors('Added to Cart');
        }

        $cart = new Cart();
        $cart->id = $user->cartCount;
        $cart->user_id = Auth::id();
        $cart->keyboard_id = $id;
        $cart->keyboard_name = $keyboard->keyboard_name;
        $cart->keyboard_image = $keyboard->keyboard_image;
        $cart->quantity = $request->quantity;
        $cart->subtotal = ($request->quantity * $keyboard->keyboard_price);

        $cart->save();
        return redirect()->back()->withErrors('Added to Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|gte:0'
        ]);
        
        $keyboard = Keyboard::where('id', $id)->first();

        if($request->quantity == 0) {
            DB::table('carts')
                ->where('id', '=', Auth::user()->cartCount)
                ->where('user_id', '=', Auth::id())
                ->where('keyboard_id', '=', $id)
                ->delete();
        }
        
        DB::table('carts')
                ->where('id', '=', Auth::user()->cartCount)
                ->where('user_id', '=', Auth::id())
                ->where('keyboard_id', '=', $id)
                ->update(array('quantity' => $request->quantity));
                
        DB::table('carts')
                ->where('id', '=', Auth::user()->cartCount)
                ->where('user_id', '=', Auth::id())
                ->where('keyboard_id', '=', $id)
                ->update(array('subtotal' => ($request->quantity * $keyboard->keyboard_price)));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
