<?php

namespace App\Policies;

use App\Models\ToDo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ToDoPolicy
{
    public function before(User $user, $ability)
    {
        if($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }
}
