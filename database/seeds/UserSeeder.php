<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                '1',
                'Davide',
                'davide@gmail.com',
                'ciaociao',
                'Corsini',
                '1995-12-10',
                'https://media-exp1.licdn.com/dms/image/C4D03AQE3zs_pA5Bsfg/profile-displayphoto-shrink_200_200/0/1617388726596?e=1623888000&v=beta&t=J6UGxuv4Jq8LlvuP_ozHBR1c4BRyfrgfVwQtS2YkKJ4'
            ],
            [
                '2',
                'Cristiano',
                'cristiano@gmail.com',
                'willyboyz',
                'Tarconi',
                '1989-09-26',
                'https://media-exp1.licdn.com/dms/image/C5603AQFuun7sGr3EZg/profile-displayphoto-shrink_800_800/0/1614807864929?e=1625097600&v=beta&t=Ew5A55AvkxtThXid27bt7yUmj5xK8rAp1bZ041gVWvc'
            ],
            [
                '3',
                'Ulisse',
                'ulisse@gmail.com',
                'ciaociao',
                'Fontanot',
                '1999-03-12',
                'https://media-exp1.licdn.com/dms/image/C4D03AQGP0HlVJOyu5g/profile-displayphoto-shrink_800_800/0/1617629406401?e=1625097600&v=beta&t=Q3hAMyDZW7bIrgl4GsshBuoeYICfJCmpGLYPNcjCv_0'
            ],
            [
                '4',
                'Daniel',
                'daniel@gmail.com',
                'ciaociao',
                'Taddeo',
                '1997-11-27',
                'https://media-exp1.licdn.com/dms/image/C4D03AQEr022a7hPBcQ/profile-displayphoto-shrink_800_800/0/1618928707283?e=1625097600&v=beta&t=geA2ScWMBsPhFMvWHGYORlZ94U7a4_1KPXwQzs7gCME'
            ]
        ];


        foreach($users as $user){
            $newUser = new User();
            $newUser->id = $user[0];
            $newUser->name = $user[1];
            $newUser->email = $user[2];
            $newUser->password = bcrypt($user[3]);
            $newUser->lastname = $user[4];
            $newUser->birth_date = $user[5];
            $newUser->user_img = $user[6];

            $newUser->save();
        }
    }
}
