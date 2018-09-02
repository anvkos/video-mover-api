<?php

namespace App\Services;

use App\Models\VideoFile;

class SearchVideoFilesService
{
    private $query;

    public function __construct()
    {
        $this->query = (new VideoFile)->newQuery();
    }

    public static function find(Array $filters)
    {
        $service = new self;

        if (!empty($filters['src_storage_ids'])) {
            $service->query->byStorages($filters['src_storage_ids']);
        }
        if (!empty($filters['criteria'])) {
            foreach ($filters['criteria'] as $criterion) {
                switch ($criterion->property) {
                    case 'views':
                        $service->query->byViews($criterion->sign, $criterion->number, $criterion->unit_name, $criterion->sorting_direction);
                        break;
                    case 'created_days_ago':
                        $inverse_signs = ['>=' => '<=', '<=' => '>=', '=' => '='];
                        $inverse_sign = $inverse_signs[$criterion->sign];
                        $service->query->byCreatedDaysAgo($inverse_sign, $criterion->number);
                        break;
                    case 'file_size':
                        $fileSizeKB = $criterion->number * 1024;
                        $service->query->byFilesize($criterion->sign, $fileSizeKB, $criterion->sorting_direction);
                        break;
                }
            }
        }
        return $service->query;
    }
}
