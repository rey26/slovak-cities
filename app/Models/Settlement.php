<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Settlement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['emails', 'web_addresses'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Settlement::class, 'parent_id')->with(['parent']);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Settlement::class, 'parent_id')->with(['children']);
    }

    public function getEmailsAttribute(): array
    {
        return explode(' ', $this->email);
    }

    public function getWebAddressesAttribute(): array
    {
        return explode(' ', $this->web_address);
    }
}
