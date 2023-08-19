<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; // Add this import
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class AdminController extends Controller
{
    //logout
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }   
    //end logout

    //profile method
    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id); 

        return view('admin.body.admin_profile', compact('adminData'));
    }

    //edit profile
    public function editprofile()
    {
        $id = Auth::user()->id;
        $editdata = User::find($id); 
        return view('admin.body.admin_edit', compact('editdata'));

    }
}
