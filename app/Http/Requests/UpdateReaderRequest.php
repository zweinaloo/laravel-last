<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateReaderRequest extends Request {

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
			//
			'name' =>'required|min:3|max:100',
			'sex' =>'required',
			'phoneno'=>'required|min:7|max:11'
			
			
		];
	}

}
