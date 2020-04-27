<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Image;
use App\Post;
use App\Carousel;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $posts = Post::with('categories')->where('post_title', 'LIKE', "%$keyword%")
                ->orWhere('post_slug', 'LIKE', "%$keyword%")
                ->orWhere('post_teaser', 'LIKE', "%$keyword%")
                ->orWhere('post_content', 'LIKE', "%$keyword%")
                ->orWhere('post_image', 'LIKE', "%$keyword%")
                ->orWhere('post_image_desc', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::with('categories')->latest()->paginate($perPage);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cates = Category::pluck('cate_name', 'id');
        return view('admin.posts.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'post_title' => 'required',
			'post_teaser' => 'required',
			'post_content' => 'required',
			'post_image' => 'required',
			'post_image_desc' => 'required'
        ]);
        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_teaser = $request->post_teaser;
        $post->post_content = $request->post_content;
        $post->post_image_desc = $request->post_image_desc;
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $name =  str_slug($request->post_title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Uploads/Posts');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);

            $post->post_image = $name;
        }
        $post->post_temp_slug = Controller::to_slug($request['post_title']);
        $post->save();

        return redirect('admin/posts')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    public function display($slug)
    {
        $carousels = Carousel::all();
        $cates = Category::all();
        $post = Post::with('categories')->where('post_slug', $slug)->first();
        return view('posts.detail', compact('post', 'cates', 'carousels'));
    }
    public function postbycate($slug){
        $carousels = Carousel::all();
        $cates = Category::all();
        $categories = Category::where('cate_slug','LIKE',$slug)->firstOrFail();
        $posts = Post::with('categories')->where('cateId',$categories->id)->latest()->paginate(2);

        return view('posts.postsbycate', compact('cates', 'posts', 'categories', 'carousels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cates = Category::pluck('cate_name', 'id');

        return view('admin.posts.edit', compact('post', 'cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'post_title' => 'required',
			'post_teaser' => 'required',
			'post_content' => 'required',
			'post_image_desc' => 'required'
		]);
        $post = Post::findOrFail($id);
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $name =  str_slug($request->post_title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Uploads/Posts');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);

            $post->post_image = $name;
        }
        $post->cateId = $request->cateId;
        $post->post_title = $request->post_title;
        $post->post_teaser = $request->post_teaser;
        $post->post_content = $request->post_content;
        $post->post_image_desc = $request->post_image_desc;
        $post->post_temp_slug = Controller::to_slug($request['post_title']);
        $post->post_slug = null;
        $post->save();

        return redirect('admin/posts')->with('flash_message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/posts')->with('flash_message', 'Post deleted!');
    }
    function uploadFile($request) {

        try {
            $photo = $request->get('photo');
            if(isset($photo))
            {
                $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
                \Image::make($request->get('photo'))->save(public_path('Uploads/News/').$name);
            }
            else{
                $name = 'NoImage.png';
            }
            return $name;
        }
        catch (\Exception $ex) {
            return response()->json(['msg' => "Upload failed!"]);
        }
    }
}
