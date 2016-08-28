<?php

namespace stix;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    //
    protected $fillable = ['title'];

    /**
     * Relationship between Notebook and Notes
     * One-Many
     */
    public function notes()
    {
       return  $this->hasMany(Note::class);
    }
}
