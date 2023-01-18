<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreReportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => 'required|string|max:100',
            'passport' => 'required|string|max:30',
            'status'   => 'required|min:3|max:5',
            'path'   => 'required',
        ];
    }



    protected function prepareForValidation()
    {
        $path = null;

        if ($this->hasFile('report')) {

            $time = Carbon::now()->timestamp;
            $extension = $this->file('report')->getClientOriginalExtension();

            $file_Name = Str::random(60) . "_$time.$extension";

            $this->file('report')->storeAs(
                'reports',
                $file_Name,
            );

            $path = "reports/" . $file_Name;
        }

        $this->merge([
            'path' => $path
        ]);
    }
}
