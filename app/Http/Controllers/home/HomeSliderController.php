<?php

namespace App\Http\Controllers\home;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homeslide;

class HomeSliderController extends Controller
{
    public function Homeslider()
    {

        $homedata = Homeslide::find(1);
        
        return view('admin.home_slide.home_slide_all',compact('homedata'));
        
    }
    
    public function Homesliderview()
    {  
        $homedata = Homeslide::find(1);    
        return view('frontend.index', compact('homedata'));
    }


    public function UpdateSider(Request $request)
    {
        $slider_id = $request->id;

        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $name_generate = time() . '_' . $image->getClientOriginalName(); // Generate a unique name using timestamp and original file name
        
            // Move and save the image to the desired location
            $image->move('upload/slider_images/', $name_generate);
        
            Homeslide::findOrFail($slider_id)->update([
                'tittle' => $request->tittle,
                'description' => $request->description,
                'video_url' => $request->video_url,
                'home_image' => $name_generate, // Store the image name in the database
            ]);
         
            
        } else {
            Homeslide::findOrFail($slider_id)->update([
                'tittle' => $request->tittle,
                'description' => $request->description,
                'video_url' => $request->video_url,
                'back_color' => $request->back_color,
            ]);
        }
        
        return redirect('/');

    }
}
