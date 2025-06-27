<?php
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::truncate();
        $admin = Admin::create([
            'name' => 'Admin',
            'password' => Hash::make('madarom01'),
            'email' => 'admin@admin.com',
            'picture' => ''
        ]);
    }
}
