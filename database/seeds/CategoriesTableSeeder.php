<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    protected $items = [
        [1, 'Соковыжималки', null, '<p>Страница Соковыжималки.</p>', 'category-1.jpg'],
        [2, 'Дегидраторы', null, '<p>Страница Дегидраторы.</p>', 'category-2.jpg'],
        [3, 'Блендеры', null, '<p>Страница Блендеры.</p>', 'category-3.jpg'],
        [4, 'Мельницы', null, '<p>Страница Мельницы.</p>', 'category-4.jpg'],
        [5, 'Маслопрессы', null, '<p>Страница Маслопрессы.</p>', 'category-5.jpg'],
        [6, 'Вакууматоры', null, '<p>Страница Вакууматоры.</p>', 'category-6.jpg'],
        [7, 'Вертикальные шнековые', 1, '', ''],
        [8, 'Горизонтальные одношнековые', 1, '', ''],
        [9, 'Горизонтальные двушнековые', 1, '', ''],
        [10, 'Ручные шнековые', 1, '', ''],
        [11, 'Для зелени', 10, '', ''],
        [12, 'Для корнеплодов', 10, '', ''],
        [13, 'Для ягод', 10, '', ''],
        [14, 'Для цитрусовых', 10, '', ''],
        [15, 'Для яблок', 10, '', ''],
        [16, 'Для овощей и фруктов', 10, '', ''],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0, $iMax=count($this->items); $i<$iMax; $i++)
        {
            $row = array_combine(['id', 'name', 'parent_id', 'about', 'image'], $this->items[$i]);

            Category::create($row);
        }
    }
}
