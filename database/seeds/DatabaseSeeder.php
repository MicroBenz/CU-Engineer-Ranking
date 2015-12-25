<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserGPAX;
use App\SubjectInfo;
use App\StudyResult;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(SubjectInfoTableSeeder::class);
        $this->call(UserGPAXTableSeeder::class);
        $this->call(StudyResultTableSeeder::class);

        Model::reguard();
    }
}
class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['user_id'=>'5631036721','password'=>'111111','name'=>'Nattapong','surname'=>'Ousirimaneechai','major'=>'CP','adviser'=>'Kultida']);
        User::create(['user_id'=>'5631057921','password'=>'111111','name'=>'Patipol','surname'=>'Chiammunchit','major'=>'CP','adviser'=>'Nattapong']);
    }
}
class SubjectInfoTableSeeder extends Seeder
{
    public function run()
    {
        SubjectInfo::create(['subject_id'=>'123','name'=>'deedee','credit'=>'3']);
    }
}
class UserGPAXTableSeeder extends Seeder
{
    public function run()
    {
        UserGPAX::create(['user_id'=>'5631036721','year'=>'1','semester'=>'1','gpa'=>'3.xx','gpax'=>'3.xx']);
    }
}
class StudyResultTableSeeder extends Seeder
{
    public function run()
    {
        StudyResult::create(['user_id'=>'5631036721','year'=>'1','semester'=>'1','subject_id'=>'123','grade'=>'A']);
    }
}