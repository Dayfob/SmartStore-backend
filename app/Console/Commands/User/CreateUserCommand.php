<?php

namespace App\Console\Commands\User;

use App\Models\Admin\Employer;
use App\Models\User\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create_user';
    protected $description = 'Создать админ пользователя';

    public function handle()
    {
//        $employer = new Employer();
//        $employer->name = 'admin';
//        $employer->password = Hash::make('admin');
//        $employer->email = 'admin@admin.com';
//        $employer->save();
        $user = new User();
        $user->name = 'Никита Киричевский';
        $user->email = 'nk@smartstore.com';
        $user->password = Hash::make('admin');
        $user->save();
    }
}
