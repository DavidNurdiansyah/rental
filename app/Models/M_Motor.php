<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Motor extends Model
{
    protected $table            = 'motor';
    protected $primaryKey       = 'id_motor';
    protected $returnType       = 'object';
    protected $allowedFields    = ['no_plat','nama_motor','harga','deskripsi','gambar'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
