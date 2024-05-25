<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; // Add this import
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //logout
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout successfully');

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

    //edit profile

    public function storeprofile(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi') . $file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

     return redirect()->Route('admin.profile');
    }

    public function editpassword()
    {
        return view('admin.admin_password');
    }

    public function updatepassword(Request $request)
    {

       $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $hash = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hash)) {
            $users = User::find(Auth::id());
            $users -> password = bcrypt($request->newpassword);
            $users-> save();

            toastr()->success('Password updated succesfully');
            return redirect('/dashboard');
        }
        else
        {
            toastr()->error('old password not match');
            return redirect()->back();
        }

    }
}
