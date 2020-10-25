<?php

namespace Styde\Enlighten\Models;

use Illuminate\Database\Eloquent\Model;

class ExampleSnippetCall extends Model
{
    protected $connection = 'enlighten';

    protected $table = 'enlighten_example_snippet_calls';

    protected $guarded = [];

    protected $casts = [
        'arguments' => 'array',
        'result' => 'array',
    ];

    public function getResultCodeAttribute(): string
    {
        return OutputFormatter::format($this->result);
    }
}
