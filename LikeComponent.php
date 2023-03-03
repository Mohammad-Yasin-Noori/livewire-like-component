<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeComponent extends Component
{
    public $post;

    public function mount()
    {
        // $this->posts = Post::all();
    }

    public function render()
    {
        $posts = Post::all();
        return view('livewire.like-component', compact('posts'));
    }

    public function likePost($post_id)
    {
        $this->post = Post::find($post_id);
         if(auth()->check())
         {
            if($this->post->user_id = auth()->user()->id)
            {
                $this->post->update([
                    'liked' => $this->post->liked == 1 ? 0 : 1,
                    'total_likes' => $this->post->liked == 1 ? $this->post->total_likes-1 : $this->post->total_likes+1
                ]);
            }
         }
    }
}
