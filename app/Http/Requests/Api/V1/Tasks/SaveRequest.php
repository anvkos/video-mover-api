<?php

namespace App\Http\Requests\Api\V1\Tasks;

use App\Models\Task;
use App\Models\TaskCriterion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'        => 'required|string|max:255',
            'enabled'      => 'required|boolean',
            'action'       => ['required', 'string', Rule::in(Task::actionsList())],
            'number_files' => 'required|integer',
            'size_files'   => 'required|integer',
            'src_storage_ids'   => 'required|array',
            'src_storage_ids.*' => 'required|integer',
            'dst_storage_ids'   => 'nullable|array',
            'dst_storage_ids.*' => 'required|integer',
            'criteria' => 'nullable|array',
            'criteria.*.property' => ['required', 'string', Rule::in(TaskCriterion::propertiesList())],
            'criteria.*.sign' => ['required', 'string', Rule::in(TaskCriterion::signsList())],
            'criteria.*.number' => 'required|integer',
            'criteria.*.unit_name' => ['required', 'string', Rule::in(TaskCriterion::unitNamesList())],
            'criteria.*.sorting_direction' => ['required', 'string', Rule::in(TaskCriterion::sortingDirectionsList())],
        ];
    }
}
