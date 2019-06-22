<?php

use App\Buisness\Enum\RoleEnum;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class _ExampleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisator = new User([
            'username' => 'DanielaPitz',
            'firstname' => 'Daniela',
            'surname' => 'Pitz',
            'email' => 'daniela.pitz@tsvhofolding.de',
            'email_optional' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $organisator->assignRole(RoleEnum::getInstance(RoleEnum::Organisator)->getModel());
        $organisator->save();

        $teamMemberOne = new User([
            'username' => 'MagdalenaPitz',
            'firstname' => 'Magdalena',
            'surname' => 'Pitz',
            'email' => 'lena.pitz@gute-loesung.de',
            'email_optional' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $teamMemberOne->assignRole(RoleEnum::getInstance(RoleEnum::TeamIntern)->getModel());
        $teamMemberOne->save();

        $teamMemberTwo = new User([
            'username' => 'LennartRieger',
            'firstname' => 'Lennart',
            'surname' => 'Rieger',
            'email' => 'lennart.rieger@gmx.de',
            'email_optional' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $teamMemberTwo->assignRole(RoleEnum::getInstance(RoleEnum::TeamIntern)->getModel());
        $teamMemberTwo->save();

        factory(App\User::class, 100)->create()->each(function($u) {
            $u->assignRole(RoleEnum::getInstance(RoleEnum::TeamIntern)->getModel());
            $u->save;
        });
    }
}
