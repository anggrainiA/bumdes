<?php

namespace App\Policies;

use App\Models\Pemasok;
use App\Models\Pengelola;
use Illuminate\Auth\Access\HandlesAuthorization;

class PemasokPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Pengelola $pengelola)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pengelola $pengelola, Pemasok $pemasok)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Pengelola $pengelola)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pengelola $pengelola, Pemasok $pemasok)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pengelola $pengelola, Pemasok $pemasok)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pengelola $pengelola, Pemasok $pemasok)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pengelola $pengelola, Pemasok $pemasok)
    {
        //
    }
}
