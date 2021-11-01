<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\File;

class generateUserFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user_files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates User Files with Pictures in Public/Storage';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        $flag = true;

        foreach($users as $user) {
            if (is_dir(public_path('users/' . $user->id)) == false) {
                File::makeDirectory(public_path('users/'.$user->id ));
                File::makeDirectory(public_path('users/'.$user->id .'/images'));
                File::makeDirectory(public_path('users/'.$user->id .'/posts'));
                File::makeDirectory(public_path('users/'.$user->id .'/temp'));
                File::makeDirectory(public_path('users/'.$user->id .'/temp/files'));
                File::makeDirectory(public_path('users/'.$user->id .'/temp/images'));
                File::copy(public_path('images/user_default.png'), public_path('users/' .$user->id . '/images/user_default.png'));
            } else {
                $this->error('  this folder '.public_path('users\\'.$user->id).' is existed  ');
                $flag = false;
            }
        }
        if($flag == true)
            $this->info('files Created Successfully');

    }
}
