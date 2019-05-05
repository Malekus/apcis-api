<?php

namespace App\Observers;

use App\Personne;

class PersonneObserver
{
    /**
     * Handle the personne "created" event.
     *
     * @param  \App\Personne  $personne
     * @return void
     */
    public function created(Personne $personne)
    {
        //
    }

    /**
     * Handle the personne "updated" event.
     *
     * @param  \App\Personne  $personne
     * @return void
     */
    public function updated(Personne $personne)
    {

    }

    /**
     * Handle the personne "deleted" event.
     *
     * @param  \App\Personne  $personne
     * @return void
     */
    public function deleted(Personne $personne)
    {
        //
    }

    /**
     * Handle the personne "restored" event.
     *
     * @param  \App\Personne  $personne
     * @return void
     */
    public function restored(Personne $personne)
    {
        //
    }

    /**
     * Handle the personne "force deleted" event.
     *
     * @param  \App\Personne  $personne
     * @return void
     */
    public function forceDeleted(Personne $personne)
    {
        //
    }
}
