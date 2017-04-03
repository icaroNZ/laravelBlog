<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_1 = new Category();
        $category_1->name = 'Learn Laravel';
        $category_1->code = str_slug( 'Learn Laravel');
        $category_1->save();

        $category_2 = new Category();
        $category_2->name = 'Code in Laravel';
        $category_2->code = str_slug( 'Code in Laravel');
        $category_2->save();

        $category_2 = new Category();
        $category_2->name = 'PHP';
        $category_2->code = str_slug( 'PHP');
        $category_2->save();
    }
}
