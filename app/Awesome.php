<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Awesome extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'awesomes';

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
        'topic',
        'url',
        'author',
        'user_id',
        'approved'
    ];

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
