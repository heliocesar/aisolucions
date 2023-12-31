<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documents extends Model
{
    // use SoftDeletes;

    protected $table = 'documents';

    /**
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'title', 'contents'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
