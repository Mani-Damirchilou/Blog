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
            'حذف نقش'
        ];
        foreach ($permissions as $permission)
            Permission::create(['name' => $permission]);
    }
}
