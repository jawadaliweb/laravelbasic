<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\aboutpage; // Make sure your model name matches the actual model name, typically uppercase singular.
use App\Models\AdminSkills; // Make sure your model name matches the actual model name, typically uppercase singular.
use App\Models\AboutEducation; // Make sure your model name matches the actual model name, typically uppercase singular.

class AboutPageController extends Controller
{
    public function aboutShow()
    {
        $aboutdata = aboutpage::first();
        $skillsData = AdminSkills::orderby('created_at','desc')->get();
        $EducationData = AboutEducation::orderby('created_at','desc')->get();
        return view('frontend.pages.about', compact('aboutdata','skillsData','EducationData')); // Remove the dollar sign before 'aboutdata'.
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

//skills form
public function Admin_Skills_Add()
{

    $auth_user_id = Auth::user()->id;


    $skillsData = AdminSkills::where('user_id',$auth_user_id)->orderby('created_at','desc')->paginate(6);
    return view('admin.aboutpage.skills_add',compact('skillsData'));
}


public function Admin_Education_Add()
{

    $auth_user_id = Auth::user()->id;
    $EducationData = AboutEducation::where('user_id',$auth_user_id)->orderby('created_at','desc')->paginate(6);
    return view('admin.aboutpage.education_add',compact('EducationData'));
}



//skills adding
public function Admin_Skills_Adding(Request $request)
{
    $user = Auth::user();

    AdminSkills::insert([
        'title' =>  $request->input('title'),
        'percentage' => $request->input('percentage'),
        'user_id' => $user->id,
    ]);

    return redirect('/about/skills/add/');
}


//skills delete
public function deleteSkill($id)
{
    // Find the skill by its ID and delete it
    $skill = AdminSkills::findorFail($id);
    $skill->delete();

    // Redirect back or to a specific route after deletion
    return redirect('/about/skills/add');
}


//education adding
public function Admin_Education_Adding(Request $request)
{
    $user = Auth::user();

    AboutEducation::insert([
        'title' =>  $request->input('title'),
        'description' => $request->input('description'),
        'from_date' => $request->input('from_date'),
        'to_date' => $request->input('to_date'),
        'user_id' => $user->id,
    ]);

    return redirect('/about/education/add/');
}


public function deleteEducation($id)
{
    // Find the skill by its ID and delete it
    $skill = AboutEducation::findorFail($id);
    $skill->delete($id);

    // Redirect back or to a specific route after deletion
    return redirect('/about/education/add');
}

// Controller method for updating education records
public function updateEducation(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'from_date' => 'required',
        'to_date' => 'required',
    ]);

    // Find the education record by its ID
    $education = AboutEducation::findOrFail($id);

    // Update the education record with the new data
    $education->title = $request->input('title');
    $education->description = $request->input('description');
    $education->from_date = $request->input('from_date');
    $education->to_date = $request->input('to_date');
    $education->save();

    // Redirect to the education list page or any other appropriate route
    return redirect('/about/education/add');
}


}
