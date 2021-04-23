<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportTicketRequest extends FormRequest
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
            'customer_name_input' => 'required',
            'customer_email_input' => 'required|email',
            'customer_phone_no_input' => 'required|digits:10',
            'ticket_subject_input' => 'required',
            'ticket_description_input' => 'required'
        ];
    }

//    public function messages()
//    {
//        return [
//            'customer_name_input.required' => 'Customer Name is required!',
//            'customer_email_input.required' => 'Customer Email is required',
//            'customer_phone_no_input.required' => 'Customer Phone Number is required',
//            'ticket_subject_input.required' => 'Ticket Subject is required!',
//            'ticket_description_input.required' => 'Ticket Description is required!',
//
//        ];
//    }




}
