<?php

namespace GRGroup\GRTags\Models;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
	public $timestamps = false;
	
    protected $guarded = [];

    public function taggable()
    {
        return $this->morphTo();
    }

    public function tag()
    {
    	return $this->belongsTo(Tag::class);
    }
}