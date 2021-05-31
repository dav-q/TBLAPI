<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeDocuments extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'type_documents';

    protected $fillable = [
        'name',
        'short_name'
    ];

    protected $dates = ['deleted_at'];

}
