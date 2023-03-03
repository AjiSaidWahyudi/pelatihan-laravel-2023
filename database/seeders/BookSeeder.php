<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book')->insert([
            'title' => 'Membuat Program Laravel untuk Pemula',
            'author' => 'Aji',
            'location' => 'Samarinda',
            'year' => '2020',
            'publisher' => 'Bacabuku'
        ]);
    }
}
