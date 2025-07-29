<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // admin side 
        }

        return redirect()->route('dashboard'); // user side
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ])->onlyInput('email');
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'user_name'=>$data['user_name'],'email'=>$data['email'],'mobile'=>$data['mobile'],
            'dob'=>$data['dob'],'gender'=>$data['gender'],
            'password'=>Hash::make($data['password']),
            'address1'=>json_encode($data['address1']),
            'address2'=>json_encode($data['address2'] ?? []),
            'role'=>'user',
        ]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
