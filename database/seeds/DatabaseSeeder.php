<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserGPAX;
use App\SubjectInfo;
use App\StudyResult;
use App\Adviser;

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

        $this->call(AdviserTableSeeder::class);
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
        User::create(['user_id'=>'5631036721','password'=>bcrypt('111111'),'name'=>'Nattapong','surname'=>'Ousirimaneechai','major'=>'CP','adviser_code'=>'PVK']);
        User::create(['user_id'=>'5631057921','password'=>bcrypt('111111'),'name'=>'Patipol','surname'=>'Chiammunchit','major'=>'CP','adviser_code'=>'PVK']);
        User::create(['user_id'=>'5631056221','password'=>bcrypt('111111'),'name'=>'AA','surname'=>'MaiRoo','major'=>'CP','adviser_code'=>'PVK']);
        User::create(['user_id'=>'5631054421','password'=>bcrypt('111111'),'name'=>'BB-8','surname'=>'MaiRoo','major'=>'CP','adviser_code'=>'PVK']);
        User::create(['user_id'=>'5531054421','password'=>bcrypt('111111'),'name'=>'R2D2','surname'=>'MaiRoo','major'=>'CP','adviser_code'=>'PVK']);
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
        UserGPAX::create(['user_id'=>'5631036721','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.70']);
        UserGPAX::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','gpa'=>'3.70','gpax'=>'3.30']);
        UserGPAX::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','gpa'=>'3.70','gpax'=>'3.40']);
        UserGPAX::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.85']);
        UserGPAX::create(['user_id'=>'5631056221','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.90']);
        UserGPAX::create(['user_id'=>'5631054421','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.80']);
        UserGPAX::create(['user_id'=>'5531054421','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'4.00']);
    }
}
class StudyResultTableSeeder extends Seeder
{
    public function run()
    {
        StudyResult::create(['user_id'=>'5631036721','year'=>'2556','semester'=>'1','subject_id'=>'123','grade'=>'A']);
    }
}
class AdviserTableSeeder extends Seeder
{
    public function run()
    {
        Adviser::create(['code'=>'PVK','title'=>'Ph.D','name'=>'Peerapon','surname'=>'Vateekul','major'=>'CP','email'=>'peerapon.vateekul@gmail.com']);
    }
}