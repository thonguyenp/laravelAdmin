<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(StorePostRequest $request)
    {
        
        // Xử lý lưu file ảnh
        if ($request->hasFile('thumbnail'))
        {
            $file  = $request->file('thumbnail');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);        
        }

        DB::table('posts')->insert([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'created_at' => now(),
            'updated_at' => now(),
            'thumbnail' => $path,
        ]);

        return redirect()->route('posts.index')
        ->with('message', 'Create post successfully!');
    }

    public function edit($id)
    {
        $posts = DB::table('posts')->where('id', $id)->first();
        if (!$posts)
        {
            abort(404);
        }

        return view('posts.edit', compact('posts'));
    }

    public function update(StorePostRequest $request, $id)
    {   
        $post = Post::findOrFail($id);

        if ($request->hasFile('thumbnail'))
        {
            Storage::delete($post->thumbnail);
            $file = $request->file('thumbnail');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        // DB::table('posts')->where('id', $id)->update([
        //     'title' =>$request->get('title'),
        //     'content' => $request->get('content'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $post->update([
            'title' =>$request->get('title'),
            'content' => $request->get('content'),
            'thumbnail' => $path ?? null
        ]);

        return redirect()->route('posts.index')
        ->with('message', 'Edit post successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
       $post->delete();

       Storage::delete($post->thumbnail);

        return back()
        ->with('message', 'Delete post successfully');
    }
}

