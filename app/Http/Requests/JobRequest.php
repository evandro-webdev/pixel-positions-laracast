<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'title' => ['required'],
      'salary' => ['required'],
      'location' => ['required'],
      'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
      'url' => ['required', 'active_url'],
      'tags' => ['nullable', 'string', 'regex:/^[a-zA-Z0-9áéíóúãõâêôçÁÉÍÓÚÃÕÂÊÔÇ\-\s,]+$/']
    ];
  }
}
