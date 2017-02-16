<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests;

class PostsController extends Controller
{

    public function __construct()
    {

        $this->middleware('admin', ['except' => ['index','show']]);

    }

    public function index(){

        $posts = Post::orderBy('id', 'desc')->paginate(12);
        return view('posts.index', compact('posts'));

    }

    public function create(){

        return view('posts.create');

    }

    public function store(PostRequest $request){


            $path = public_path().'/images/'; // your upload folder
            if (!File::exists($path))
            {
                File::makeDirectory($path, 0777, true, true);
            }

            $image       = $request->file('image');
            $img = Image::make($request->file('image'));
            $description = $request->input('description');
            $filename    = str_random(40) . '.' .$image->getClientOriginalExtension();

            $img->resize(null, 150, function ($constraint) //resize and save thumbnail
            {$constraint->aspectRatio();})
            ->save($path.'thumbnail-'.$filename);

            $image->move($path, $filename); // move file to path

            // create a record
            Post::create([

                'description' => $description,
                'image' => $filename,
                'thumbnail' => 'thumbnail-' . $filename

            ]);

            return redirect('posts');

    }

    public function show($id) {

        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));

    }

    public function edit($id) {

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));

    }

    public function update($id, Requests\PostRequest $request) {

        $post = Post::findOrFail($id);
        $path = public_path().'/images/'; // your upload folder path
        File::delete($path . $post->image); // delete old image from images path
        File::delete(public_path() . '/images/' . 'thumbnail-' . $post->image); // delete old thumbnail from images path
        $image       = $request->file('image');
        $img = Image::make($request->file('image')); //thumbnail
        $description = $request->input('description');
        $filename    = str_random(40) . '.' .$image->getClientOriginalExtension();

        $img->resize(null, 150, function ($constraint) // resize and save thumbnail
        {$constraint->aspectRatio();})
            ->save($path.'thumbnail-'.$filename);

        $image->move($path, $filename); // move file to images path

        //update a record
        $post->update([

            'description' => $description,
            'image' => $filename,
            'thumbnail' => 'thumbnail-' . $filename

        ]);

        return redirect('posts');

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        File::delete(public_path() . '/images/' . $post->image); //delete image
        File::delete(public_path() . '/images/' . 'thumbnail-' . $post->image); //delete thumbnail
        $post->delete();

        return redirect('posts');
    }

}
