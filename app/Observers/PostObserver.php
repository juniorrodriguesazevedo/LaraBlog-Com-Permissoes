<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->title = Str::title($post->title);
        $post->auxiliary_title = Str::ucfirst($post->auxiliary_title);
        $post->body = Str::ucfirst($post->body);
        $post->user_id = Auth::id();

        if ($post->image && $post->image->isValid()) {
            
            $imagePath = Storage::putFile('public', $post->image);

            $post['image'] = $imagePath;
        }
    }

    /**
     * Handle the Post "updating" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {
        $post->title = Str::title($post->title);
        $post->auxiliary_title = Str::ucfirst($post->auxiliary_title);
        $post->body = Str::ucfirst($post->body);
        
        $id = Post::findOrFail($post->id);

        if ($post->image && $post->image->isValid()) {
            
            if ($id->image && Storage::exists($id->image)) {
                Storage::delete($id->image);
            }

            $imagePath = Storage::putFile('public', $post->image);

            $post['image'] = $imagePath;
        }
    }

    /**
     * Handle the Post "deleting" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
    }
}
