<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Job extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait, AlgoliaEloquentTrait;

    public static $autoIndex = true;
    public static $autoDelete = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';
    public $indices = ['dev_jobs'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'company',
        'description',
        'topic',
        'url',
        'user_id',
        'approved'
    ];

    public $algoliaSettings = [
        'attributesToIndex' => [
            'title',
            'topic',
            'company'
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
