<?php

use App\Profession;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$professions = DB::select('SELECT id FROM professions WHERE title="Desarrollador Back-End"');
        $professions = DB::select(
            'SELECT id FROM professions WHERE title=?',
            ['Desarrollador Back-End']
        );
        $profession = DB::table('professions')
            ->select('id')
            ->where('title', 'Desarrollador Back-End')
            ->first();
        $professionId = DB::table('professions')
            ->where('title', 'Desarrollador Back-End')
            ->value('id');
        $professionId = DB::table('professions')
            ->whereTitle('Desarrollador Back-End')
            ->value('id');*/

        User::create([
            'name' => 'Pepe Pérez',
            'email' => 'pepe@mail.es',
            'password' => bcrypt('123456'),
            'profession_id' => Profession::whereTitle('Desarrollador Back-End')
                ->value('id')
        ]);
    }
}
