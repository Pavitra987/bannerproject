<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function home()
{
    $banners = Banner::where('status', 1)
                     ->orderBy('order')
                     ->get();

    return view('welcome', compact('banners'));
}

    public function index()
{
    $banners = Banner::orderBy('order')->get();

    return view('dashboard', compact('banners'));
}
 public function create()
{

    return view('banners.create');
}
 public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image',
            'order' => 'required|integer',
            'status' => 'required',
        ]);

         $image = $request->file('image')->store('banners', 'public');

        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'order' => $request->order,
            'status' => $request->status,
        ]);

        return redirect('/dashboard');
    }
public function edit($id)
{
    $banner = Banner::find($id);

    return view('banners.edit', compact('banner'));
}


  public function update(Request $request, $id)
{
    $banner = Banner::find($id);

    $banner->title = $request->title;
    $banner->description = $request->description;
    $banner->order = $request->order;
    $banner->status = $request->status;

    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('banners', 'public');
        $banner->image = $image;
    }

    $banner->save();

    return redirect('/dashboard');
}
  public function delete($id)
{
    $banner = Banner::find($id);

    $banner->delete();

    return redirect('/dashboard');
}
}
