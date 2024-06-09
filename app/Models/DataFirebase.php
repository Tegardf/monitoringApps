<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFirebase extends Model
{
    use HasFactory;
    protected $fillable = [
        'hr',
        'gsr',
        'spo',
        'br',
        'indicator',
        'timestamp',
    ]; // Define fields to be stored
    protected $table = 'firebase_data';
    public $timestamps = true;
}
