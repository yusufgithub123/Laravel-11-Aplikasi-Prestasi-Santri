<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        
        DB::table('kriteria')->insert([
            [
                'nama_kriteria' => 'Nilai Rapot',
                'atribut'       => 'Benefit',
                'bobot'         =>  0.3,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'     => Carbon::now()->toDateTimeString(),     
                
            ],
            [
                'nama_kriteria' => 'Prestasi Akademik',
                'atribut'       => 'Benefit',
                'bobot'         =>  0.2,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'     => Carbon::now()->toDateTimeString(), 
            ],
            [
                'nama_kriteria' => 'Hafalan',
                'atribut'       => 'Benefit',
                'bobot'         =>  0.2,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'     => Carbon::now()->toDateTimeString(), 
            ],
            [
                'nama_kriteria' => 'Sikap Spiritual',
                'atribut'       => 'Benefit',
                'bobot'         => 0.15,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'     => Carbon::now()->toDateTimeString(), 
            ],
            [
                'nama_kriteria' => 'Pelanggaran',
                'atribut'       => 'cost',
                'bobot'         => 0.15,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'     => Carbon::now()->toDateTimeString(), 
            ],
        ]);
    }
}
