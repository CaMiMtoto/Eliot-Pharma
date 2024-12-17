<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    protected $appends = ['delete_url', 'edit_url'];
    public function getDeleteUrlAttribute(): string
    {
        return route('admin.working-hours.destroy', $this->id);
    }

    public function getEditUrlAttribute(): string
    {
        return route('admin.working-hours.show', $this->id);
    }
}
