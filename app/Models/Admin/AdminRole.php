<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminRole extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_name',
        'role_description',
    ];

    public function employers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AdminRoleEmployer::class, 'role_id', 'id');
    }
}
