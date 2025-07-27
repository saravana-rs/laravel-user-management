<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){ 
        
        $this->middleware(['auth','is_admin']);
    
    }

    public function index(Request $request)
    {
    if ($request->ajax()) {
        $users = User::where('role', '!=', 'admin');
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return view('admin.partials.actions', compact('user'))->render();
            })
            ->make(true);
    }

    // This line is missing in your error:
    $users = User::where('role', '!=', 'admin')->get(); // 👈 Add this

    return view('admin.dashboard', compact('users'));
    }



    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }



    public function update(User $user, Request $request)
    {
       $data = $request->validate([
        'user_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        'mobile' => 'required|string|max:20',
        'dob' => 'required|date',
        'gender' => 'required|in:Male,Female,Other',
        
        'address1.door_street' => 'required|string|max:255',
        'address1.city' => 'required|string|max:100',
        'address1.landmark' => 'required|string|max:255',
        'address1.state' => 'required|string|max:100',
        'address1.country' => 'required|string|max:100',
        'address1.primary' => 'sometimes|boolean',
        
        'address2.door_street' => 'nullable|string|max:255',
        'address2.city' => 'nullable|string|max:100',
        'address2.landmark' => 'nullable|string|max:255',
        'address2.state' => 'nullable|string|max:100',
        'address2.country' => 'nullable|string|max:100',
        'address2.primary' => 'sometimes|boolean',
       ]);

          $user->user_name = $data['user_name'];
          $user->email = $data['email'];
          $user->mobile = $data['mobile'];
          $user->dob = $data['dob'];
          $user->gender = $data['gender'];
      
          $data['address1']['primary'] = $request->has('address1.primary');
          $data['address2']['primary'] = $request->has('address2.primary');
      
          if ($data['address1']['primary']) {
              $data['address2']['primary'] = false;
          } elseif ($data['address2']['primary']) {
              $data['address1']['primary'] = false;
          }
      
          $user->address1 = json_encode($data['address1']);
          $user->address2 = json_encode($data['address2']);
      
          $user->save();

        return redirect()->route('admin.index')
            ->with('success', 'Profile updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted.');
    }
}
