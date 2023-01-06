<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $connection = 'mysql_data';
    protected $table = 'przemysl24_artykuly';
    public $timestamps = false;
    const CREATED_AT = 'data';
    const UPDATED_AT = 'data_zmiany';    

    public function __construct($table_name = 'przemysl24_artykuly')
    {
        $this->table = $table_name;
        return $this->table;
    }
}
