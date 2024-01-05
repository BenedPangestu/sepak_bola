<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function User(Request $request){
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function InputUser(){
        // $user = User::all();
        return view('admin.user.create');
    }

    public function StoreUser(Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'role' => 'staf',
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('admin.user');
    }
    public function EditUser($id){
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }

    public function UpdateUser($id,Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password-confirm' => 'same:password',
        ]);
        
        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = (is_null($request->password)) ? $user->password : $request->password;
        
        return redirect()->route('admin.user');
    }
    public function DeleteUser($id) {
        // dd($request);
        // $request->validate([
        //     'email' => 'required',
        //     'username' => 'required',
        //     'password-confirm' => 'same:password',
        // ]);
        
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('admin.user');
    }
}
