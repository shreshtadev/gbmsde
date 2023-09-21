<?php

namespace App\Policies;

use App\Models\DailyWorkLog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DailyWorkLogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_daily::work::log');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DailyWorkLog $dailyWorkLog): bool
    {
        return $user->can('view_daily::work::log');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_daily::work::log');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DailyWorkLog $dailyWorkLog): bool
    {
        return $user->can('update_daily::work::log');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DailyWorkLog $dailyWorkLog): bool
    {
        return $user->can('delete_daily::work::log');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_daily::work::log');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DailyWorkLog $dailyWorkLog): bool
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, DailyWorkLog $dailyWorkLog): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DailyWorkLog $dailyWorkLog): bool
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }
}
