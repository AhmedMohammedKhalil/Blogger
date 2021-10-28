<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

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
            if (is_dir(public_path('storage/users/' . $user->id . '/images')) == false) {
                mkdir(public_path('storage/users/'.$user->id ));
                mkdir(public_path('storage/users/'.$user->id .'/images'));
                copy(public_path('images/user_default.png'), public_path('storage/users/' .$user->id . '/images/user_default.png'));
            } else {
                $this->error('  this folder '.public_path('storage\users\\'.$user->id.'\images').' is existed  ');
                $flag = false;
            }
        }
        if($flag == true)
            $this->info('files Created Successfully');

    }
}
