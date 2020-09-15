<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function viewAny( User $user )
    {
        return $user->hasPermissionTo( 'read companies' );
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     *
     * @return mixed
     */
    public function view( User $user, Company $company )
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create( User $user )
    {
        return $user->hasPermissionTo( 'create companies' );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     *
     * @return mixed
     */
    public function update( User $user, Company $company )
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     *
     * @return mixed
     */
    public function delete( User $user, Company $company )
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     *
     * @return mixed
     */
    public function restore( User $user, Company $company )
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     *
     * @return mixed
     */
    public function forceDelete( User $user, Company $company )
    {
        //
    }
}
