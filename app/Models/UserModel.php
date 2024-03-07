<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $allowedFields = ["firstName","lastName","userName","image","gender","birthday","country","city","phone","email","password","about","is_admin","is_active","is_online"];
    protected $useTimestamps = true;
    protected $returnType    = \App\Entities\User::class;

    protected $validationRules = [
        'firstName'       => 'required|min_length[3]|max_length[25]',
        'lastName' => 'required|min_length[2]|max_length[25]',
        'userName' => 'required|min_length[8]|max_length[30]|is_unique[users.userName]',
        'email' => 'required|min_length[10]|valid_email|max_length[100]|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'gender' => 'required',
        'birthday' => 'required',
        'country' => 'required',
        // 'phone' => 'required|min_length[8]|max_length[20]|is_unique[users.phone]',

    ];
    protected $validationMessages = [
        'firstName' => [
            'required' => ' عفوا الاسم الشخصي ضروري',
            'min_length' => '  يجب ان يحتوي الاسم الشخصي على اكثر من 3 احرف',
            'max_length' => ' لا يجب ان يتعدى الاسم الاسم الشخصي من 25 حرفا',
        ],
        'lastName' => [
            'required' => ' عفوا الاسم العائلي ضروري',
            'min_length' => 'يجب ان يحتوي الاسم العائلي على اكثر من 2 احرف',
            'max_length' => ' لا يجب ان يتعدى الاسم العائلي من 25 حرفا',
        ],
        'useName' => [
            'required' => ' عفوا  اسم المستخدم ضروري',
            'min_length' => 'يجب ان يحتوي  اسم المستخدم على اكثر من 7 احرف',
            'max_length' => ' لا يجب ان يتعدى اسم المستخدم من 30 حرفا',
            'is_unique' => '  اسم المستخدم مسجل مسبقا'
        ],
        'email' => [
            'required' => '  البريد الالكتروني ضروري',
            'min_length' => ' يجب ان يحتوي البلد الالكتروني على الاقل على 10 احرف',
            'valid_email' => ' يجب عليك ان تدخل بريدا الكترونيا  صحيحا',
            'max_length' => 'لا يجب ان يتعدى البريد الالكتروني اكثر من 100 حرف',
            'is_unique' => '  البريد الالكتروني مسجل مسبقا'
        ],
        'password' => [
            'required' => 'كلمه السر ضروريه',
            'min_length' => 'يجب ان يحتوي كلمه السر على اكثر من 6 احرف'
        ],
        'gender' => [
            'required' => '  تحديد الجنس ضروري',
        ],
        'birthday' => [
            'required' => ' يجب عليك تحديد تاريخ الازدياد',
        ],
        'country' => [
            'required' => ' عفوا تحديد البلد الضروري',
        ],
        // 'phone' => [
        //     'required' => ' رقم الهاتف ضروري',
        //     'min_length' => ' يجب ان يحتوي رقم هاتف على الاقل على 8 ارقام',
        //     'max_length' => ' لا يجب ان يتعدى رقم الهاتف 20 رق',
        //     'is_unique' => ' رقم الهاتف مسجل مسبقا'
        // ],
    ];

    // function customQuery($myQuery)
    // {
    //     $query = $this->db->query($myQuery); 
    //     return $query->result_array();
    // }
}