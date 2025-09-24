<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'username',
        'body',
    ];

    public static function createComment(array $data): self
    {
        return self::create($data);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
