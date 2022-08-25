<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'Elettronica', 'icon'=>'storage/img/icon_electronic.png'],
            ['name'=>'Immobili', 'icon'=>'storage/img/icon_home.png'],
            ['name'=>'Abbigliamento', 'icon'=>'storage/img/icon_dress.png'],
            ['name'=>'Musica', 'icon'=>'storage/img/icon_music.png'],
            ['name'=>'Videogiochi', 'icon'=>'storage/img/icon_videogame.png'],
            ['name'=>'Motori', 'icon'=>'storage/img/icon_motors.png'],
            ['name'=>'Giardinaggio', 'icon'=>'storage/img/icon_gardening.png'],
            ['name'=>'DIY', 'icon'=>'storage/img/icon_DIY.png'],
            ['name'=>'Letteratura', 'icon'=>'storage/img/icon_literature.png'],
            ['name'=>'Film', 'icon'=>'storage/img/icon_film.png'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name'=>$category['name'],
                'icon'=>$category['icon'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}