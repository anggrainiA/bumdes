<?php

namespace App\Policies;

use App\Models\Pelanggan;
use App\Models\Pengelola;
use Illuminate\Auth\Access\HandlesAuthorization;

class PelangganPolicy
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
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pengelola $pengelola, Pelanggan $pelanggan)
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
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pengelola $pengelola, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pengelola $pengelola, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pengelola $pengelola, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pengelola  $pengelola
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pengelola $pengelola, Pelanggan $pelanggan)
    {
        //
    }
}
