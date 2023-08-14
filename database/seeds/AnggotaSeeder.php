<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$ranting_id = DB::table('ranting')->pluck('id');
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('anggota')->insert([
    			'nik' => $faker->randomNumber(),
    			'nama' => $faker->name,
    			'ranting_id' => $faker->randomElement($ranting_id),
    			'tg_badan' => $faker->numberBetween(150,195),
    			'tp_lahir' => $faker->city,
    			'tgl_lahir' => $faker->date,
    			'alamat' => $faker->address,
    			'no_hp' => $faker->e164PhoneNumber('id_ID'),
    			'pkd' => 'PKD'.$faker->randomNumber().'.jpg',
    			'status' => $faker->word
    		]);
 
    	}
    }
}
