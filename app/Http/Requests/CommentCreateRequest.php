<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentCreateRequest extends Request
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
            'topic_id' => 'required|numeric|exists:topics,id',
            'body' => 'required|max:5000',
            'parent_comment_id' => 'numeric|exists:comments,id',
        ];
    }
}
