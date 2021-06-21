<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::rule('saveUsers', 'admin/Person/save', 'post');
Route::rule('saveInstitution', 'admin/Institution/save', 'post');
Route::rule('saveDepartment', 'admin/Department/save', 'post');
Route::rule('saveBusiness', 'admin/Business/save', 'post');
Route::rule('saveDevice', 'admin/Device/save', 'post');
Route::rule('saveStaff', 'admin/Staff/save', 'post');
Route::rule('saveContacts', 'admin/Contacts/save', 'post');
Route::rule('saveCase', 'admin/MedicalService/saveCase', 'post');
Route::rule('saveServicePoint', 'admin/InsServicePoint/save', 'post');
Route::rule('saveOrder', 'admin/TreatmentOrder/saveOrder', 'post');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
