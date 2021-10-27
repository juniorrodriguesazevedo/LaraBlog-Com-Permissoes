<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreUpdate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:post_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::paginate(5);

        return view('posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostStoreUpdate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreUpdate $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $imagePath = $request->file('image')->store('public');

            $data['image'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::findOrFail($id);

        return view('posts.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::findOrFail($id);

        return view('posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostStoreUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreUpdate $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }

            $imagePath = $request->file('image')->store('public');

            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deletado com sucesso!');
    }
}
