<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\aboutpage; // Make sure your model name matches the actual model name, typically uppercase singular.

class AboutPageController extends Controller
{
    public function aboutShow()
    {
        
        $aboutdata = aboutpage::first();
        return view('frontend.pages.about', compact('aboutdata')); // Remove the dollar sign before 'aboutdata'.
    }

    public function aboutUpdate()
    {
        $aboutdata = aboutpage::first();
        return view('admin.aboutpage.aboutform', compact('aboutdata')); // Remove the dollar sign before 'aboutdata'.
    }
}
