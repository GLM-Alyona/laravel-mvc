<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'group_id',
        'surname',
        'name',
    ];

    //protected $primaryKey = ['surname', 'name'];
    //public $incrementing = false;
    //protected $keyType = 'string';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

}