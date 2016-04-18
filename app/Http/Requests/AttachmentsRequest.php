<?php

namespace App\Http\Requests;

use App\Invoice;
use App\Http\Requests\Request;

class AttachmentsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Invoice::where([
            'id'    =>      $this->invoice_id,
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attachment' => 'required|mimes:jpg,jpeg,png,bmp,pdf'
        ];
    }
}
