<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meetup extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meetups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'thumbnail',
        'content',
        'city',
        'street',
        'housenumber',
        'zip',
        'user_id',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
