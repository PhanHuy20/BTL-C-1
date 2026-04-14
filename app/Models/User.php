<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Cần thiết nếu làm phần API (Mức Giỏi)

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mối quan hệ Nhiều-Nhiều với Role
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Mối quan hệ 1-1 với UserProfile (Đáp ứng tiêu chí 1-1)
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Kiểm tra xem người dùng có vai trò cụ thể nào không
     * @param string $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    /**
     * Kiểm tra xem người dùng có danh sách vai trò nào không
     * @param array $roleNames
     * @return bool
     */
    public function hasAnyRole(array $roleNames)
    {
        return $this->roles()->whereIn('name', $roleNames)->exists();
    }
}