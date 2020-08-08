<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class ListAim extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'list_aim';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['code', 'title', 'created_at', 'updated_at'];

}
