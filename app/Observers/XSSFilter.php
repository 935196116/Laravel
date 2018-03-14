<?php

namespace App\Observers;

use App\Models\HousesList;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class HousesObserver
{
    public function saving(HousesList $h)
    {

        $h->detail = clean($h->detail, 'default');
        $h->title = clean($h->title, 'default');
        $h->address = clean($h->address, 'default');


    }
}