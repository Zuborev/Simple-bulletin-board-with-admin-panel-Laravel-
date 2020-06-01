<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[];

        for ($i = 1; $i<=5; $i++) {
            $name = 'Category №'.$i;

            $categories[] = [
                'id' => $i,
                'name' => $name,
                           ];
        }

        DB::table('categories')->insert($categories);
    }
}
