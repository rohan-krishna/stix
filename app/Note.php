<?php

namespace stix;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $fillable = ['title','body','encrypted'];

    /*
     * Relationship between Notebook and Notes
     * One-Many
     */
    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }
}
