<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutEducation;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    //
    public function create(){
        $auth_user_id = Auth::user()->id;
        $experienceData = Experience::where('user_id',$auth_user_id)->orderby('created_at','desc')->paginate(6);
        return view('admin.aboutpage.experience',compact('experienceData'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        Experience::insert([
            'title' =>  $request->input('title'),
            'description' => $request->input('description'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Experience added successfully');
    }
}
