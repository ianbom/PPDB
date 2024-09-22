<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JalurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jalur')->insert([
            'nama_jalur' => 'Reguler',
            'biaya' => 1000,
            'deskripsi' => 'Ini jalur reguler'
        ]);

        DB::table('jalur')->insert([
            'nama_jalur' => 'Premium',
            'biaya' => 5000,
            'deskripsi' => 'Ini jalur premium'
        ]);
    }
}
