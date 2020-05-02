<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsRecords extends Model
{
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'record_id', 'item', 'assets_model', 'assets_no', 'place_of_use', 'returned_by', 'returned_at',
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
        'record_id' => 'string',
        'returned_at' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function record()
    {
        return $this->belongsTo('App\Models\Records', 'id', 'record_id');
    }
}
