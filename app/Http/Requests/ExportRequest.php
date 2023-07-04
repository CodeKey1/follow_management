<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:255',
            'side_id'=>'max:11',
            'send_date'=>'required',
            'export_no'=>'required|max:20',
            'state'=>'max:100',
            'details'=>'max:1000',
            'upload_f'=>'',
            'topic_id'=> 'max:11',
            'cat_name'=>'required|max:255',
              
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'ادخل عنوان الصادر    ',
            'name.max' => 'تخطيت الحد الاقصي من اسم الجهة',
            'side_id.required' => 'ادخل اسم الجهة الوارد منها  ',
            'side_id.max' => 'هذا الحقل تعدي الحد المطلوب',
            'send_date.required' => '  ادخل تاريخ الإرسال',
            'export_no.required' => '  من فضلك ادخل رقم الصادر',
            'export_no.max'=>'     ادخل رقم وارد لا يزيد عن رقم 20 فقط',
            'cat_name.required'=>'اختر الجهة'

            
        ];
    }
}
