<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = new Category();
        $cat1->name = 'kompjuteri';
        $cat1->save();

        $cat2 = new Category();
        $cat2->name = 'tastature';
        $cat2->save();

        $cat3 = new Category();
        $cat3->name = 'telefoni';
        $cat3->save();
    }
}
