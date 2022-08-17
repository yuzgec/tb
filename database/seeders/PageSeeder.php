<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageGallery;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{

    public function run()
    {
        Page::create(['title' => 'Hakkımızda', 'slug' => 'hakkimizda', 'category' => 1]);
    }
}
