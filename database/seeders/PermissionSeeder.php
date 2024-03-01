<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
        'مشاهده داشبرد',
          'مشاهده لیست کاربران',
          'ساخت کاربر',
          'ویرایش کاربر',
          'حذف کاربر',
            'مشاهده لیست نقش ها',
            'ساخت نقش',
            'ویرایش نقش',
            'حذف نقش',
            'مشاهده لیست دسته بندی ها',
            'ساخت دسته بندی',
            'ویرایش دسته بندی',
            'حذف دسته بندی',
            'مشاهده لیست برچسب ها',
            'ساخت برچسب',
            'ویرایش برچسب',
            'حذف برچسب',
            'مشاهده لیست مقالات',
            'ساخت مقاله',
            'ویرایش مقاله',
            'حذف مقاله',
            'مشاهده لیست نظرات',
            'حذف نظر',
            'مشاهده لیست گزارشات',


        ];
        foreach ($permissions as $permission)
            Permission::create(['name' => $permission]);
    }
}
