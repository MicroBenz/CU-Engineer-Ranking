<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserGPAX;
use App\SubjectInfo;
use App\StudyResult;
use App\Adviser;
use App\RankingWeight;

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
        $this->call(RankingWeightTableSeeder::class);

        Model::reguard();
    }
}
class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['user_id'=>'admin','password'=>bcrypt('111111'),'name'=>'Nattapong','surname'=>'Ousirimaneechai','major'=>'CP','status'=>'admin']);
//        User::create(['user_id'=>'5631036721','password'=>bcrypt('111111'),'name'=>'Nattapong','surname'=>'Ousirimaneechai','major'=>'CP','adviser_code'=>'PVK','status'=>'normal']);
//        User::create(['user_id'=>'5631057921','password'=>bcrypt('111111'),'name'=>'Patipol','surname'=>'Chiammunchit','major'=>'CP','adviser_code'=>'PVK','status'=>'normal']);
//        User::create(['user_id'=>'5631056221','password'=>bcrypt('111111'),'name'=>'AA','surname'=>'MaiRoo','major'=>'CP','adviser_code'=>'PVK','status'=>'normal']);
//        User::create(['user_id'=>'5631054421','password'=>bcrypt('111111'),'name'=>'BB-8','surname'=>'MaiRoo','major'=>'CP','adviser_code'=>'PVK','status'=>'normal']);
//        User::create(['user_id'=>'5531054421','password'=>bcrypt('111111'),'name'=>'R2D2','surname'=>'MaiRoo','major'=>'CP','adviser_code'=>'PVK','status'=>'normal']);
    }
}
class SubjectInfoTableSeeder extends Seeder
{
    public function run()
    {
//        SubjectInfo::create(['subject_id'=>'123','name'=>'KREAK DEEDEE','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2103106','name'=>'ENG DRAWING','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2100111','name'=>'EXPL ENG WORLD','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2109101','name'=>'ENG MATERIALS','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110101','name'=>'COMP PROG','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110200','name'=>'DISCRETE STRUC','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110215','name'=>'PROG METH I','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110221','name'=>'COMP ENG ESS','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110251','name'=>'DIG COMP LOGIC','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110253','name'=>'COMP ELEC INTF','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110263','name'=>'DIG LOCIG LAB I','credit'=>'1']);
//        SubjectInfo::create(['subject_id'=>'2110201','name'=>'COMP ENG MATH','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110211','name'=>'INTRO DATA STRUCT','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110254','name'=>'DIG DESIGN VER','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2110265','name'=>'DIG DESIGN LAB I','credit'=>'1']);
//        SubjectInfo::create(['subject_id'=>'2301107','name'=>'CALCULUS I','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2301108','name'=>'CALCULUS II','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2302127','name'=>'GEN CHEM','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2302163','name'=>'GEN CHEM LAB','credit'=>'1']);
//        SubjectInfo::create(['subject_id'=>'2304107','name'=>'GEN PHYS I','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2304108','name'=>'GEN PHYS II','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2304183','name'=>'GEN PHYS LAB I','credit'=>'1']);
//        SubjectInfo::create(['subject_id'=>'2304184','name'=>'GEN PHYS LAB II','credit'=>'1']);
//        SubjectInfo::create(['subject_id'=>'2313213','name'=>'DIGITAL PHOTO','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2313221','name'=>'PHOTO SCI','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2602121','name'=>'INTRO BUSINESS','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'2603284','name'=>'STAT PHYS SCIENCE','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'5500111','name'=>'EXP ENG I','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'5500112','name'=>'EXP ENG II','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'5500208','name'=>'COM PRES SKIL','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'0123104','name'=>'UNIV THAI READING','credit'=>'3']);
//        SubjectInfo::create(['subject_id'=>'0201255','name'=>'ICT STRATEGIC MGT','credit'=>'3']);


    }
}
class UserGPAXTableSeeder extends Seeder
{
    public function run()
    {
//        UserGPAX::create(['user_id'=>'5631036721','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.70']);
//        UserGPAX::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','gpa'=>'3.09','gpax'=>'3.09']);
//        UserGPAX::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','gpa'=>'3.13','gpax'=>'3.11']);
//        UserGPAX::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','gpa'=>'3.05','gpax'=>'3.09']);
//        UserGPAX::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','gpa'=>'3.53','gpax'=>'3.20']);
//        UserGPAX::create(['user_id'=>'5631056221','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.90']);
//        UserGPAX::create(['user_id'=>'5631054421','year'=>'2557','semester'=>'2','gpa'=>'3.70','gpax'=>'3.80']);
    }
}
class StudyResultTableSeeder extends Seeder
{
    public function run()
    {
//        StudyResult::create(['user_id'=>'5631036721','year'=>'2557','semester'=>'2','subject_id'=>'123','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'2103106','grade'=>'B+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'2301107','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'2302127','grade'=>'B']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'2302163','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'2304107','grade'=>'C']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'2304183','grade'=>'B+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'1','subject_id'=>'5500111','grade'=>'C+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'2100111','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'2109101','grade'=>'B']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'2110101','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'2301108','grade'=>'B']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'2304108','grade'=>'C']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'2304184','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2556','semester'=>'2','subject_id'=>'5500112','grade'=>'C+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2110200','grade'=>'C+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2110215','grade'=>'C']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2110221','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2110251','grade'=>'B+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2110253','grade'=>'C+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2110263','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'1','subject_id'=>'2602121','grade'=>'B+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'0123104','grade'=>'W']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'2110201','grade'=>'C+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'2110211','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'2110254','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'2110265','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'2313213','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'2603284','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'2','subject_id'=>'5500208','grade'=>'C+']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'S','subject_id'=>'0201255','grade'=>'A']);
//        StudyResult::create(['user_id'=>'5631057921','year'=>'2557','semester'=>'S','subject_id'=>'2313221','grade'=>'A']);
    }
}
class AdviserTableSeeder extends Seeder
{
    public function run()
    {
        Adviser::create(['code'=>'PVK','title'=>'Ph.D','name'=>'Peerapon','surname'=>'Vateekul','major'=>'CP','email'=>'peerapon.vateekul@gmail.com']);
    }
}
class RankingWeightTableSeeder extends Seeder
{
    public function run()
    {
//        RankingWeight::create(['major'=>'ce','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'ee','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'6',
//                                'CALCULUS II'=>'6','GEN PHYS I'=>'3','GEN PHYS II'=>'6','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'me','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'auto','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'be','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'ie','ENG DRAWING'=>'4','ENG MATERIALS'=>'4','COMP PROG'=>'5','EXPL ENG WORLD'=>'1','CALCULUS I'=>'5',
//                                'CALCULUS II'=>'5','GEN PHYS I'=>'2','GEN PHYS II'=>'2','GEN CHEM'=>'2','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'che','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'metal','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'env','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'3','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'2','GEN PHYS LAB I'=>'2','GEN PHYS LAB II'=>'2']);
//        RankingWeight::create(['major'=>'pe','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'4','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'4','EXP ENG II'=>'4',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
//        RankingWeight::create(['major'=>'cp','ENG DRAWING'=>'3','ENG MATERIALS'=>'3','COMP PROG'=>'9','EXPL ENG WORLD'=>'3','CALCULUS I'=>'3',
//                                'CALCULUS II'=>'3','GEN PHYS I'=>'3','GEN PHYS II'=>'3','GEN CHEM'=>'3','EXP ENG I'=>'3','EXP ENG II'=>'3',
//                                'GEN CHEM LAB'=>'1','GEN PHYS LAB I'=>'1','GEN PHYS LAB II'=>'1']);
    }
}

