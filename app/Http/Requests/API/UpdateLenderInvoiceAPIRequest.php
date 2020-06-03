<?php

namespace App\Http\Requests\API;

use App\Models\LenderInvoice;
use InfyOm\Generator\Request\APIRequest;

class UpdateLenderInvoiceAPIRequest extends APIRequest
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
        $rules = LenderInvoice::$rules;
        
        return $rules;
    }
}
