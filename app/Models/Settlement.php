<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Settlement extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = ['id'];

    protected $appends = ['emails', 'web_addresses', 'coordinates'];

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

    public function getCoordinatesAttribute(): string
    {
        if (!$this->lat || !$this->lon) {
            return '';
        }
        return $this->lat . ', ' . $this->lon;
    }

    public static function boot()
    {
        parent::boot();

        Settlement::updating(function (Settlement $settlement) {
            if ($settlement->coat_of_arms_path !== $settlement->getOriginal('coat_of_arms_path')) {
                if (Storage::exists($settlement->getOriginal('coat_of_arms_path'))) {
                    Storage::delete($settlement->getOriginal('coat_of_arms_path'));
                }
            }
        });
    }

    public function toSearchableArray()
    {
        return $this->only('name');
    }
}
