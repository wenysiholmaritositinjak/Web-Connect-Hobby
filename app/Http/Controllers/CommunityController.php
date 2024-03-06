<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\CommunityFormRequest;
    use App\Models\Category;
    use App\Models\Community;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Validator;


    class CommunityController extends Controller
    {
        public function indexAPI()
        {
            $community = Community::all();
            return response()->json(['data'=>$community]);
        }

        public function index()
        {
            $community = Community::orderBy('id', 'desc')->paginate(5);
            return view('Community.index', compact('community'));
        }

public function showAPI($id)
{
    try {
        $community = Community::findOrFail($id);
        return response()->json(['data' => $community]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Community not found'], 404);
    }
}


        public function create()
        {
            $categories = Category::all();
            return view('Community.create', compact('categories'));
        }

        public function storeAPI(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|string|in:Sport,Traveling,Music,Culinary,Travel',
        'whatsapp' => 'required|string',
        'category_id' => 'required|exists:categories,id' // Menambahkan validasi untuk category_id
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ], 422);
    }

    try {
        $community = Community::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'whatsapp' => $request->whatsapp,
            'category_id' => $request->category_id // Menyertakan category_id
        ]);

        if ($community) {
            return response()->json([
                'status' => 200,
                'message' => "Community Created Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Failed to Create Community"
            ], 500);
        }
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => $e->getMessage() // Menampilkan pesan error yang lebih spesifik
        ], 500);
    }
}





        public function store(CommunityFormRequest $request)
    {
        $validatedData = $request->validated();
        $code = random_int(10, 99);
        $originalSlug = Str::slug($validatedData['title']);
        $slug = $originalSlug . "-" . $code;

        $community = new Community();
        $community->title = $validatedData['title'];
        $community->category_id = $validatedData['category_id'];
        $community->description = $validatedData['description'];
        $community->status = $validatedData['status'];
        $community->whatsapp = $validatedData['whatsapp'];

        if (Community::where('slug', $originalSlug)->exists()) {
        $community->slug = $slug;
    } else {
        $community->slug = $originalSlug;
    }

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('uploads/Community/', $filename);
        $community->image = $filename;
    }

    $community->save();

    return redirect('/find-your-communities')->with('message', 'Community berhasil ditambahkan');
}


        public function edit(Community $community)
        {
            $categories = Category::all(); // Mengubah $category menjadi $categories
            return view('Community.edit', compact('community', 'categories'));
        }

        public function update(CommunityFormRequest $request, $community)
        {
            $validatedData = $request->validated(); // Mengubah menjadi $validatedData
            $community = Community::findOrFail($community); // Mengubah $community menjadi $communityId
            $community->title = $validatedData['title'];
            $community->category_id = $validatedData['category_id'];
            $community->description = $validatedData['description'];
            $community->status = $validatedData['status'];
            $community->whatsapp = $validatedData['whatsapp'];

            if ($request->hasFile('image')) {
                $path = 'uploads/Community/' . $community->image; // Mengubah 'upload' menjadi 'uploads'
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/Community/', $filename);
                $community->image = $filename;
            }

            $community->update(); // Menggunakan save() daripada update()
            return redirect('Community')->with('message', 'Community berhasil diupdate');
        }

        public function destroy(int $community_id){
            $community = Community::findOrFail($community_id);
            $path = 'uploads/Community/' . $community->image; // Mengubah 'upload' menjadi 'uploads'
                if (File::exists($path)) {
                    File::delete($path);
                }
            $community->delete();
            return redirect()->back()->with('message', 'Community berhasil dihapus');
        }


    }
