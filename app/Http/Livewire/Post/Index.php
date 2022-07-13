<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $posts = Post::get();
        return view('livewire.post.index', compact('posts'));
    }
}
