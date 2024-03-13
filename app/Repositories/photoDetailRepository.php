<?php

namespace App\Repositories;

use App\Models\photoDetail;
use App\Repositories\BaseRepository;

class photoDetailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return photoDetail::class;
    }
}
