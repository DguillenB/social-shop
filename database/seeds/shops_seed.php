<?php

use Illuminate\Database\Seeder;

class shops_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i <= 20; $i++){
            DB::table('shops')->insert(array(
                'name'      => "Tienda ".$i,
                'direction' => "Barcelona, Av. Diagonal núm ".$i,
                'distance'  => rand(1, 999),
                'created_at' => DB::raw('CURRENT_TIMESTAMP')
            ));
        }
        $this->command->info('Se han insertado los registros en la tabla de shops');
    }
}
