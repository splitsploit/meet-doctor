<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare table
    public $table = 'role';

    // Type field must be date
    protected $dates =  [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable
    protected $fillabla = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // many to many
    public function user()
    {
        return $this->belongsToMany(User::class); //App\Models\User
    }

    public function permission()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Permission');
    }

    public function role_user(){
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
    }

    public function permission_role(){
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
    }
}
