<?php

namespace App\Models;

use App\Enums\AssignmentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function editors(): HasMany
    {
        return $this->hasMany(User::class, 'admin_id')->with('roles');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function drafts(): HasMany
    {
        return $this->hasMany(Draft::class);
    }

    public function scopeUnpublishedDrafts(): HasMany
    {
        return $this->drafts()->where('publish_date', null)->orderBy('updated_at', 'desc');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function scopeUnpublishedAssignments($query): HasMany
    {
        return $this->assignments()->where('status', '!=', AssignmentStatus::COMPLETE)->with('assignable')->orderBy('updated_at', 'desc');
    }

    public function editorAssignments(): HasManyThrough
    {
        return $this->hasManyThrough(Assignment::class, User::class, 'admin_id', 'user_id')
            ->with(['assignable', 'user']);
    }

    public function scopeUnpublishedEditorAssignments($query): HasManyThrough
    {
        return $this->editorAssignments()->where('status', '!=', AssignmentStatus::COMPLETE);
    }
}
