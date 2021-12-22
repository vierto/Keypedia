<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function loginValidation(Request $request)
    {

        $rules = $request->validate([
            'email_address' => 'required|email',
            'password' => 'required'
        ]);

        if($request->remember_me){
            Cookie::queue('email_address', $rules['email_address'], 10080);
            Cookie::queue('password', $rules['password'], 10080);
        }
            
        if(Auth::attempt($rules)){
            return redirect('/');
        }
            return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    public function registerValidation(Request $request){

        $rules = [
            'username' => 'required|min:5',
            'email_address' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'address' => 'required|min:10',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required'
        ];

        $request->validate($rules);

        $user = new User;
        $user->role_id = 2;
        $user->cartCount = 1;
        $user->username = $request->username;
        $user->email_address = $request->email_address;
        $user->password = Hash::make($request->password);
        $user->confirm_password = $request->confirm_password;
        $user->address = $request->address;

        if($request->gender == 'male') $user->gender = 'Male';
        else if($request->gender == 'female') $user->gender = 'Female';

        $user->date_of_birth = $request->date_of_birth;

        $user->save();
        return redirect('/login');
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

    public function changePassword(){
        $categories = Category::all();
        return view('changePassword')->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ];

        $request->validate($rules);

        if($request->current_password == $user->confirm_password) {
            $user->password = Hash::make($request->new_password);
            $user->confirm_password = $request->confirm_password;
            $user->save();
            return redirect('/');
        } else {
            return redirect()->back()->withErrors('Invalid Password!');
        }
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
