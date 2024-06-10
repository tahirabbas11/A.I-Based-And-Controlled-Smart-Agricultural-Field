<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;


class AttributeValue extends Model
{
    use HasFactory;
     /**
     * AttributeValues that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'attribute_id'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

}
