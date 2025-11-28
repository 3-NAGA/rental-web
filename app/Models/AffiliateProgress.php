<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateProgress extends Model
{
    use HasFactory;
    protected $table = 'affiliate_progress';

    public $timestamps = false;

    protected $primaryKey = 'id';
}