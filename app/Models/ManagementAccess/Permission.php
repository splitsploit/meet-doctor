<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare table
    public $table = 'permission';

    // This field must type date
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }

    public function permission_role(){
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'permission_id');
    }
}
