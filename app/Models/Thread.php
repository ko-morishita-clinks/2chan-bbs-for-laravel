<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public static function createThreadWithComment(array $threadData, array $commentData): self
    {
        return \DB::transaction(function () use ($threadData, $commentData) {
            $thread = self::create([
                'title' => $threadData['title'],
            ]);

            $thread->comments()->create([
                'username' => $commentData['username'],
                'body'     => $commentData['body'],
            ]);

            return $thread;
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
