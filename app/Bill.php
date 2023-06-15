<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'bill_id';
    protected $fillable = ['customer_id', 'bill_date', 'bill_total'];
}
