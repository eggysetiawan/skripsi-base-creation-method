<?php

namespace App\Http\Requests;

use App\Models\Criteria;
use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
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
            'criterias.*' => ['int', 'required', 'in:' . implode(",", Criteria::pluck('id')->toArray())],
            'score.*' => ['required', 'numeric', 'min:0']
        ];
    }
}
