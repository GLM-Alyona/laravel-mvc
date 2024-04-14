<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'title',
        'start_from',
        'is_active',
    ];

    //protected $primaryKey = 'title';
    //public $incrementing = false;
    //protected $keyType = 'string';


    public function students()
    {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }

}