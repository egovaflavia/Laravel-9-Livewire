<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posting extends Component
{
    public $posts, $title, $content, $post_id;
    public $updateMode = false;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posting');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
    }

    public function store()
    {
        $validate = $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($validate);
        $this->resetInputFields();
        session()->flash('message', 'Post Created Successfully');
    }

    public function edit($id)
    {
        $post          = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title   = $post->title;
        $this->content = $post->content;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validate = $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post updated successfully');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post deleted successfully');
    }
}
