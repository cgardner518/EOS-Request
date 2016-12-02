<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateEosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if (Auth::User()->can('eosAdmin') || Auth::User()->can('eosGuest')) {
        return true;
      }
      \App::abort(403, 'Sup');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required',
          'description'=> 'required',
          'dimX'=> 'required',
          'dimY'=> 'required',
          'dimZ'=> 'required',
          'number_of_parts'=> 'required',
          'stl'=> 'required'
        ];
    }
}
