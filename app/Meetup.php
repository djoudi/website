<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Meetup extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait, AlgoliaEloquentTrait;

    public static $autoIndex = true;
    public static $autoDelete = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meetups';
    public $indices = ['dev_meetups'];

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
        'city',
        'address',
        'zip',
        'url',
        'user_id',
        'approved'
    ];

    public $algoliaSettings = [
        'attributesToIndex' => [
            'title',
            'topic',
            'address',
            'city'
        ],
        'customRanking' => [
            'desc(popularity)',
            'asc(title)',
        ],
    ];

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
