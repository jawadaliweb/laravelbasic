<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function ViewResume(){
        $user = Auth::user()->load('skills');
        return view('frontend.resume.resume1', compact('user'));
    }

}
