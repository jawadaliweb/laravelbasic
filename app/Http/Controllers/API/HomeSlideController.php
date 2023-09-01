    <?php

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\HomeSlide;

    class HomeSlideController extends Controller
    {
        public function index()
        {
            $homeSlides = HomeSlide::all();
            return response()->json(['data' => $homeSlides]);
        }

        public function show($id)
        {
            $homeSlide = HomeSlide::findOrFail($id);
            return response()->json(['data' => $homeSlide]);
        }

        public function store(Request $request)
        {
            // Validation rules
            $rules = [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'video_url' => 'nullable|url',
                'back_color' => 'nullable|string|max:255',
                'home_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        
            $validatedData = $request->validate($rules);
        
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
        
            // Create a new HomeSlide
            HomeSlide::create($data);
        
            return response()->json(['message' => 'HomeSlide created successfully']);
        }
        

        public function update(Request $request, $id)
    {
        // Validation rules (similar to the store method)
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'nullable|url',
            'back_color' => 'nullable|string|max:255',
            'home_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validatedData = $request->validate($rules);

        $homeSlide = HomeSlide::findOrFail($id);

        // Update the HomeSlide attributes
        $homeSlide->title = $request->title;
        $homeSlide->description = $request->description;
        $homeSlide->video_url = $request->video_url;
        $homeSlide->back_color = $request->back_color;

        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $name_generate = time() . '_' . $image->getClientOriginalName();
            $image->move('upload/slider_images/', $name_generate);
            $homeSlide->home_image = $name_generate;
        }

        // Save the updated HomeSlide
        $homeSlide->save();

        return response()->json(['message' => 'HomeSlide updated successfully']);
    }


        public function destroy($id)
        {
            $homeSlide = HomeSlide::findOrFail($id);
            $homeSlide->delete();
            return response()->json(['message' => 'HomeSlide deleted successfully']);
        }
    }
