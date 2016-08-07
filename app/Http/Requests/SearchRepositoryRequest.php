<?php

namespace CodeExplorer\Http\Requests;

use CodeExplorer\Http\Requests\Request;

class SearchRepositoryRequest extends Request
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
            'repositoryOwner' => 'required',
            'repositoryName' => 'required',
            'howMany' => 'required|in:10,20,50'
        ];
    }
}
