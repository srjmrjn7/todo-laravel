<?php

namespace App\Livewire\ToDo;

use Livewire\Component;
use App\Models\ToDo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use File;

class EditToDo extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title;
    public $photo;
    public $todo;

    protected function rules() {
        return [
            'title' => ['required', 'max:100', 'unique:to_dos,title,' . $this->todo->id],
            'photo' => ['nullable', 'image', 'max:2048']
        ];
    }

    public function mount(ToDo $todo) {
        $this->todo = $todo;
        $this->title = $todo->title;
    }

    public function render()
    {
        return view('livewire.to-do.edit-to-do');
    }

    public function update()
    {
        $this->authorize('update', $this->todo);
        $this->validate();

        $utodo['title'] = $this->title;

        if($this->photo) {
            if(File::exists(public_path($this->todo->photo))) {
                unlink(public_path($this->todo->photo));
            }
            $utodo['photo'] = $this->photo->store('files', 'public');
        }

        $this->todo->update($utodo);
        session()->flash('success', 'To Do Updated!');
        return redirect()->back();
    }
}
