<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubTopic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
