<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;


    protected $table = 'services';

    protected $fillable = [
        'clientName',
        'dateTime',
        'address',
        'contactNo',
        'service',
        'serviceDescription',
        'serviceProvider',
        'price',
        'image_path', // Add this line
    ];
}
