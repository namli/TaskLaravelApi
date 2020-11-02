<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficesRequest extends FormRequest
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
     *  For url parametres accesibility
     * 
     */
    public function all($keys = null)
    {
        // return $this->all();
        $data = parent::all($keys);
        switch ($this->getMethod()) {
            case 'GET':
                $data['id'] = $this->route('office');
            case 'PUT':
                $data['id'] = $this->route('office');
                // case 'PATCH':
            case 'DELETE':
                $data['id'] = $this->route('office');
        }
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'string|max:255',
            'address' => 'string'
        ];

        switch ($this->getMethod()) {
            case 'GET':
                return [
                    'id' => 'integer|exists:offices,id'
                ];
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'id' => 'required|integer|exists:offices,id',
                ] + $rules;
                // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:offices,id'
                ];
        }
    }


    public function messages()
    {
        return [
            'id.exists'  => 'This id doesn\'t exists',
            'id.required'  => 'Id is required',
        ];
    }
}
