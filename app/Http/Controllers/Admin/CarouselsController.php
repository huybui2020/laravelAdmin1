<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Carousel;
use Illuminate\Http\Request;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $carousels = Carousel::where('image_name', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $carousels = Carousel::latest()->paginate($perPage);
        }

        return view('admin.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {    $this->validate($request, [
        'active' => 'in:true, false, 1, 0, "1", and "0"',
    ]);
        $carousel = new Carousel();
        $carousel->active = $request->active;
        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $name =  time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Uploads/Posts');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);

            $carousel->image_name = $name;
        }
        $carousel->save();

        return redirect('admin/carousels')->with('flash_message', 'Carousel added!');
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
        $carousel = Carousel::findOrFail($id);

        return view('admin.carousels.show', compact('carousel'));
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
        $carousel = Carousel::findOrFail($id);

        return view('admin.carousels.edit', compact('carousel'));
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
        $requestData = $request->all();        
        $carousel = Carousel::findOrFail($id);
        $carousel->active = $request->active;
        if ($request->hasFile('image_name')) {        
            $image = $request->file('image_name');
            $name =  time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Uploads/Posts');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);

            $carousel->image_name = $name;
        }
        $carousel->save();

        return redirect('admin/carousels')->with('flash_message', 'Carousel updated!');
    }
    public function isActive($id)
    {
	$carousel = Carousel::findOrFail($id);
        $carousel->active = $carousel->active == true ? false : true;  //hoặc ngắn gọn: $cate->active = !$cate->active
	$carousel->save();
        return redirect()->back()->with('success', 'success ');
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
        Carousel::destroy($id);

        return redirect('admin/carousels')->with('flash_message', 'Carousel deleted!');
    }
}
