<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(newClass::class);
    }
}
class newClass extends Seeder{
	public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name'=>'haihai',
            'email'=>'hainguyenvan6799aa@gmail.com',
            'password'=>Bcrypt('123456')
        ]);
        //DB::table('students')->insert([
        //	['name'=>'Nguyễn Văn Hải', 'age'=>'20'],
        //	['name'=>'Phạm Thị Thu', 'age'=>'20']
        // ]);
    }
}
