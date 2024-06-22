<?php

namespace App\Livewire\ToDo;

use Livewire\Component;
use App\Models\ToDo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class CreateToDo extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title = '';
    public $photo = '';

    protected function rules() {
        return [
            'title' => ['required', 'max:100', 'unique:to_dos,title'],
            'photo' => ['nullable', 'image', 'max:2048']
        ];
    }

    public function render()
    {
        return view('livewire.to-do.create-to-do');
    }

    public function create() {
        $this->authorize('create', ToDo::class);
        $this->validate();
        $user = \Auth::user();
        $ctodo['title'] = $this->title;

        if($this->photo) {
            $ctodo['photo'] = $this->photo->store('files', 'public');
        }

        $user->todos()->create($ctodo);
        return redirect()->back()->with('success', 'To Do Created!');
    }
}
