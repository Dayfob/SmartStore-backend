<?php

namespace App\Console\Commands\Admin;

use App\Models\Admin\Employer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create_user';
    protected $description = 'Создать админ пользователя';

    public function handle()
    {
        $employer = new Employer();
        $employer->name = 'admin';
        $employer->password = Hash::make('admin');
        $employer->email = 'admin@admin.com';
        $employer->save();
    }
}
