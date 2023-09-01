<?php

namespace App\Http\Controllers\home;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;

class HomeSliderController extends Controller
{
    public function Homeslider()
    {

        $homedata = HomeSlide::first();
        
        return view('admin.home_slide.home_slide_all',compact('homedata'));
        
    }
    
    public function Homesliderview()
    {  
        $homedata = HomeSlide::first();    
        return view('frontend.index', compact('homedata'));
    }


    public function UpdateSlider(Request $request)
    {

            // Validation rules
            $rules = [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'video_url' => 'nullable|url',
                'back_color' => 'nullable|string|max:255',
                'home_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            ];

            $validatedData = $request->validate($rules);

        $slider_id = $request->id;
    
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'back_color' => $request->back_color,
        ];
    
        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $name_generate = time() . '_' . $image->getClientOriginalName();
            $image->move('upload/slider_images/', $name_generate);
            $data['home_image'] = $name_generate;
        }

 
    
        if ($slider_id) {
            // If ID is provided, update the existing record
            Homeslide::findOrFail($slider_id)->update($data);
        } else {
            // If no ID is provided, create a new record
            Homeslide::create($data);
        }
    
        return redirect('/');
    }
}
