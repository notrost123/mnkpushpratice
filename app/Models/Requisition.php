<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Requisition
 * @package App\Models
 * @version August 21, 2022, 1:11 pm UTC
 *
 * @property string $ctrl_no
 * @property integer $truck_id
 * @property string $status
 */
class Requisition extends Model
{
    use SoftDeletes;

    public $table = 'requisitions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ctrl_no',
        'truck_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ctrl_no' => 'string',
        'truck_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ctrl_no' => 'required',
        'truck_id' => 'required',
        'status' => ''
    ];

    
}
