<?php

namespace Database\Seeders;

use App\Models\Door;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Door::create([
			'user_id' => '1',
			'name' => 'Door 1',
			'is_locked' => false,
			'password' => Hash::make('123456')
		]);

		Door::create([
			'user_id' => '1',
			'name' => 'Door 2',
			'is_locked' => false,
			'password' => Hash::make('123456')
		]);

		Door::create([
			'user_id' => '1',
			'name' => 'Door 3',
			'is_locked' => true,
			'password' => Hash::make('123456')
		]);

		Door::create([
			'user_id' => '2',
			'name' => 'Door 1',
			'is_locked' => true,
			'password' => Hash::make('123456')
		]);

		Door::create([
			'user_id' => '2',
			'name' => 'Door 2',
			'is_locked' => false,
			'password' => Hash::make('123456')
		]);
    }
}
