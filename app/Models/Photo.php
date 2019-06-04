<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = ['name'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function storageFilesPathOfUser(): string
    {
        return 'photos/'.$this->user->id.'/';
    }

    public function imagePath(): string
    {
        return Storage::url($this->storageFilesPathOfUser().$this->name);
    }
}
