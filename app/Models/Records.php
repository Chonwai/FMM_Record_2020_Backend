<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'taken_by', 'taken_at', 'will_return_at', 'staff_number', 'department', 'contact', 'status', 'is_returned', 'remark', 'hired_out_by', 'hired_out_at', 'returned_by', 'returned_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'taken_at' => 'datetime:Y-m-d',
        'will_return_at' => 'datetime:Y-m-d',
        'is_returned' => 'boolean',
        'hired_out_at' => 'datetime:Y-m-d',
        'returned_at' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function items_records()
    {
        return $this->hasMany('App\Models\ItemsRecords', 'record_id', 'id');
    }
}
