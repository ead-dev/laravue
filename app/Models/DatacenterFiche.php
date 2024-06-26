<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DatacenterFiche extends Model
{
    //
    protected $guarded = [];
    protected $table = 'datacenter_fiches';
    protected $appends = ['dc'];

    public function fiche()
    {
        return $this->belongsTo('App\Models\Fiche','fiche_id');
    }

    public function datacenter()
    {
        return $this->belongsTo('App\Models\Datacenter','datacenter_id');
    }

    public function getDcAttribute(){
        return $this->datacenter;
    }



}
