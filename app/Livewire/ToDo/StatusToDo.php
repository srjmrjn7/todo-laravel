<?php

namespace App\Livewire\ToDo;

use Livewire\Component;
use App\Models\ToDo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StatusToDo extends Component
{
    use AuthorizesRequests;
    public $todo;

    protected function rules() {
        return [];
    }

    public function mount(ToDo $todo) {
        $this->todo = $todo;
    }

    public function render()
    {
        return view('livewire.to-do.status-to-do');
    }

    public function update()
    {
        $this->authorize('update', $this->todo);
        $utodo['completed'] = !$this->todo->completed;
// dd($utodo);
        $this->todo->update($utodo);
        session()->flash('success', 'To Do Updated!');
        return redirect()->back();
    }
}
