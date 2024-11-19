<?php

namespace App\Fieldtypes;

use Statamic\Fields\Fieldtype;

class Timepicker extends Fieldtype
{
    protected $component = 'timepicker'; // Matches the Vue component name

    public function preload()
    {
        // Provide preloaded default time
        return [
            'default_time' => $this->config('default', '12:00'),
        ];
    }

    public function configFieldItems(): array
    {
        return [
            'default' => [
                'display' => 'Default Time',
                'instructions' => 'Set the default time value (e.g., 12:00).',
                'type' => 'text',
                'default' => '12:00',
            ],
        ];
    }
}
