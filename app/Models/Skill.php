<?php

namespace App\Models;

use Database\Factories\SkillFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<SkillFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'category',
        'level',
    ];

    /**
     * @return array<string, list<self>>
     */
    public static function groupedByCategory(): array
    {
        return static::query()
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category')
            ->all();
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('category')->orderBy('name');
    }
}
