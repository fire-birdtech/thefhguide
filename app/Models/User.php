<?php

namespace App\Models;

use App\Enums\AssignmentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

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

    public function choices(): BelongsToMany
    {
        return $this->belongsToMany(Choice::class)
            ->using(ChoiceUser::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    public function dataRequests(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_data_accesses', 'sender_id', 'receiver_id')
            ->withPivot(['message', 'access_granted', 'created_at']);
    }

    public function dataRequestsForMe(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_data_accesses', 'receiver_id', 'sender_id')
            ->withPivot(['message', 'access_granted', 'created_at']);
    }
}
