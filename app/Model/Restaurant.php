<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property string $id 
 * @property string $email 
 * @property string $name 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class Restaurant extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurants';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'email', 'name'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    protected $keyType = 'string';
    public $incrementing = false;
}