<?php

namespace App\Repositories;

use App\Models\Qrcode;
use App\Repositories\BaseRepository;

class QrcodeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Qrcode::class;
    }
}
