<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class TaskCriterion extends Model
{
    public const PROPERTY_VIEWS            = 'views';
    public const PROPERTY_FILE_SIZE        = 'file_size';
    public const PROPERTY_CREATED_DAYS_AGO = 'created_days_ago';
    public const PROPERTY_VIDEO_ID         = 'video_id';

    public const SIGN_LESS  = '<=';
    public const SIGN_EQUAL = '=';
    public const SIGN_MORE  = '>=';

    public const UNIT_NAME_VIEWS       = 'views';
    public const UNIT_NAME_VIEWS_DAY   = 'views_day';
    public const UNIT_NAME_VIEWS_WEEK  = 'views_week';
    public const UNIT_NAME_VIEWS_MONTH = 'views_month';
    public const UNIT_NAME_VIEWS_YEAR  = 'views_year';
    public const UNIT_NAME_CREATED_DAY = 'day';
    public const UNIT_NAME_SIZE_MB     = 'MB';
    public const UNIT_NAME_VIDEO_ID    = 'video_id';

    public const SORTING_DIRECTION_ASC = 'ASC';
    public const SORTING_DIRECTION_DESC = 'DESC';

    protected $table = 'storage_task_criteria';

    protected $fillable = [
        'property', 'sign', 'number', 'unit_name', 'sorting_direction',
    ];

    public static function propertiesList(): array
    {
        return [
            self::PROPERTY_VIEWS,
            self::PROPERTY_FILE_SIZE,
            self::PROPERTY_CREATED_DAYS_AGO,
            self::PROPERTY_VIDEO_ID,
        ];
    }

    public static function unitNamesList(): array
    {
        return [
            self::UNIT_NAME_VIEWS,
            self::UNIT_NAME_VIEWS_DAY,
            self::UNIT_NAME_VIEWS_WEEK,
            self::UNIT_NAME_VIEWS_MONTH,
            self::UNIT_NAME_VIEWS_YEAR,
            self::UNIT_NAME_CREATED_DAY,
            self::UNIT_NAME_SIZE_MB,
            self::UNIT_NAME_VIDEO_ID,
        ];
    }

    public static function signsList(): array
    {
        return [
            self::SIGN_LESS,
            self::SIGN_EQUAL,
            self::SIGN_MORE,
        ];
    }

    public static function sortingDirectionsList(): array
    {
        return [
            self::SORTING_DIRECTION_ASC,
            self::SORTING_DIRECTION_DESC,
        ];
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
