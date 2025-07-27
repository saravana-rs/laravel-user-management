<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct(){ $this->middleware('auth'); }

    public function dashboard()
    {
        $user = Auth::user();
        return view('users.dashboard', compact('user'));
    }

    public function edit()
    {
        return view('users.edit', ['user' => Auth::user()]);
    }

    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        
        $user->update([
            'user_name'=>$data['user_name'], 'email'=>$data['email'], 'mobile'=>$data['mobile'],
            'dob'=>$data['dob'],'gender'=>$data['gender'],
            'password'=>!empty($data['password']) ? Hash::make($data['password']) : $user->password,
            'address1'=>json_encode($data['address1']),
            'address2'=>json_encode($data['address2'] ?? []),
        ]);
        return redirect()->route('dashboard')->with('success', 'Profile updated.');
    }

}
