<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormaTrabajo;

class FormaTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaTrabajo::create([
            'forma_trabajo' => 'Presencial'
        ]);
        FormaTrabajo::create([
            'forma_trabajo' => 'Remoto'
        ]);
        FormaTrabajo::create([
            'forma_trabajo' => 'Híbrido'
        ]);
    }
}
