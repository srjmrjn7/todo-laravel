<div>
    <span class="to-do-status">{{$todo->completed ? 'finished' : 'not finished'}}</span>
    <a class="to-do-action" href="#" wire:click.prevent="update"><i class="fa {{$todo->completed ? 'fa-times' : 'fa-check'}}" aria-hidden="true"></i></a>
</div>
