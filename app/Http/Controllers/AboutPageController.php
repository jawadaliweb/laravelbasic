<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    $skillsData = AdminSkills::orderby('created_at','desc')->paginate(6);
    return view('admin.aboutpage.skills_add',compact('skillsData'));
}


public function Admin_Education_Add()
{

    $EducationData = AboutEducation::orderby('created_at','desc')->paginate(6);
    return view('admin.aboutpage.education_add',compact('EducationData'));
}



//skills adding
public function Admin_Skills_Adding(Request $request)
{
    $titles = $request->input('title'); // Get an array of skill titles
    $percentages = $request->input('percentage'); // Get an array of skill percentages

    // Loop through the skills and create records for each skill
    foreach ($titles as $index => $title) {
        $data = [
            'title' => $title,
            'percentage' => $percentages[$index],
            
        ];

        // Create a new skill record
        AdminSkills::create($data);
    }

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
    $titles = $request->input('title'); // Get an array of skill titles
    $descriptions = $request->input('description'); // Get an array of skill percentages
    $from_dates = $request->input('from_date'); // Get an array of skill percentages
    $to_dates = $request->input('to_date'); // Get an array of skill percentages

    // Loop through the skills and create records for each skill
    foreach ($titles as $index => $title) {
        $data = [
            'title' => $title,
            'description' => $descriptions[$index],
            'from_date' => $from_dates[$index],
            'to_date' => $to_dates[$index],
            
        ];

        // Create a new skill record
        AboutEducation::create($data);
    }

    return redirect('/about/education/add/');
}
//education delete
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
