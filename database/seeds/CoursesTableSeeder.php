<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Courses')->insert([
            'name' => 'Respaldo CONTPAQi',
            'description' => 'En este manual encontrarás la forma correcta de realizar un respaldo y una recuperación de los archivos en el sistema de CONTPAQi Contabilidad',
            'link' => '/respaldo-contabilidad/index.htm',
            'img' => '/splash_contabilidad.png',
        ]);
    }
}
