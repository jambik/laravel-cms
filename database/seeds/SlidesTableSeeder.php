<?php

use App\Slide;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    protected $items = [
        ['Слайдер 1', 'Текст слайдера.', 'http://google.ru', 'slide-1.jpg'],
        ['Слайдер 2', 'Текст слайдера.', '', 'slide-2.jpg'],
        ['Слайдер 3', 'Текст слайдера.', '', 'slide-3.jpg'],
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
            $row = array_combine(['title', 'text', 'url', 'image'], $this->items[$i]);

            Slide::create($row);
        }
    }
}
