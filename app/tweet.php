<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class tweet extends Model
{
    protected $fillable = [
        'text',
        'user',
        'posted_on',
    ];

    public function scopePublished($query)
    {
        $query->where('posted_on','<=',Carbon::now());
    }
    //
}
