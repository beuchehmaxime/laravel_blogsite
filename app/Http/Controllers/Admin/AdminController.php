<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('user_login', '=', '1')->get();
        $userscount = User::count();
        $postcount = Post::count();
        return view('admin.dashboard', compact('users','userscount','postcount'));
    }

    public function adminProfile(){
        $admin_id = Auth::user()->id;
        $user = User::findOrFail($admin_id);
        return view('admin.profile', compact('user'));
    }

    public function adminProfileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required'
        ]);
        User::whereId(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber
        ]);

        return redirect()->back()->with('successmessage','Profile updated successfully');
    }
    public function adminPasswordUpdate(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
       if(!Hash::check($request->current_password, Auth::user()->password)){
            return redirect()->back()->with('errormessage','Old password does not match');
       }

       User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
       ]);

        return redirect()->back()->with('successmessage','Profile updated successfully');
    }



    public function adminLogout(Request $request): RedirectResponse
    {
        User::whereId(Auth::user()->id)->update([
            'user_login' => false
        ]);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
