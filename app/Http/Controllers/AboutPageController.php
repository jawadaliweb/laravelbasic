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

    public function AboutPageUpdate(Request $request)
    {
        $about_id = $request->id;

        $data=[
            'title' => $request->title,
            'Short_title' => $request->Short_title,
            'description'=> $request ->description,
            'resume_link'=> $request -> resume_link,
            
        ];
        if ($request->hasfile('about_image')) {
            $image = $request->file('about_image');
            $name_generate = time() . '_' . $image->getClientOriginalName();
            $image->move('upload/about_images/',$name_generate);
            $data['about_image'] = $name_generate;
        }
    
    if($about_id) {
        aboutpage::findorFail($about_id)->update($data);
    }
    else {
        aboutpage::create($data);
    }
    return redirect('/');

}

public function Admin_Skills_Add()
{
    
        return view('admin.aboutpage.skills_add');
}
    
}
