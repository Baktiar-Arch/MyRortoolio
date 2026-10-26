<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'demo_url',
        'repo_url',
        'thumbnail',
    ];

    /**
     * @return list<string>
     */
    public function techStackList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->tech_stack))));
    }
}
