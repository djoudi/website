<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Project extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait, AlgoliaEloquentTrait;

    public static $autoIndex = true;
    public static $autoDelete = true;

    public static $perEnvironment = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

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
