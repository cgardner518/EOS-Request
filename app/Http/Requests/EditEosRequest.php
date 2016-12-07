<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class EditEosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // if (Auth::User()->can('eosAdmin')) {
        // dd('Hi mom');
        return true;
      // }
      \App::abort(403, 'Sup');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
      return [
        'name' => 'required',
        'description'=> 'required',
        'dimX'=> [
          'required',
          'numeric'
        ],
        'dimY'=> [
          'required',
          'numeric'
        ],
        'dimZ'=> [
          'required',
          'numeric'
        ],
        'number_of_parts'=> [
          'required',
          'numeric'
        ],
      ];
    }

    public function messages(){
      return [
        'name.required' => 'Name is a required field',
        'description.required' => 'Description is a required field',
        'dimX.required' => 'All three(3) dimensions are required, X is not filled',
        'dimY.required' => 'All three(3) dimensions are required, Y is not filled',
        'dimZ.required' => 'All three(3) dimensions are required, Z is not filled',
        'number_of_parts.required' => 'Number of Parts is a required field',
      ];
    }
}
