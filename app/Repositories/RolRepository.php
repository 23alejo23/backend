<?php

namespace App\Repositories;

use App\Models\Rol;
use App\Repositories\BaseRepository;

class RolRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Rol::class;
    }
}
