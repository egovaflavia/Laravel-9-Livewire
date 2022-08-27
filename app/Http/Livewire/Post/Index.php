<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $post->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('post.index');
    }

    public function render()
    {
        $posts = Post::latest()->paginate(5);
        return view('livewire.post.index', compact('posts'));
    }
}
