<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\FaqCategory;
use App\Models\GalleryCategory;
use App\Models\PageCategory;
use App\Models\PriceCategory;
use App\Models\ProductCategory;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;
use App\Models\TeamCategory;
use App\Models\VideoCategory;
use Illuminate\Database\Seeder;


class KategoriSeeder extends Seeder
{

    public function run()
    {
        PageCategory::create(['title' => 'Kurumsal', 'slug' => 'kurumsal']);
        PageCategory::create(['title' => 'Bilgilendirme', 'slug' => 'bilgilendirme']);
        PageCategory::create(['title' => 'Sözleşmeler', 'slug' => 'sozlesmeler']);
        BlogCategory::create(['title' => 'Duyurular', 'slug' => 'duyurular']);
        BlogCategory::create(['title' => 'Haberler', 'slug' => 'haberler']);
        BlogCategory::create(['title' => 'Etkinlikler', 'slug' => 'etkinlikler']);
        FaqCategory::create(['title' => 'Genel Kategori', 'slug' => 'genel-kategori']);
        GalleryCategory::create(['title' => 'Genel Kategori', 'slug' => 'genel-kategori']);
        VideoCategory::create(['title' => 'Genel Kategori', 'slug' => 'genel-kategori']);
        ProductCategory::create(['title' => 'Dini İçerikli Ürünler', 'slug' => 'dini-icerikli-urunler']);
        ProductCategory::create(['title' => 'Zeka Akıl Oyunlari', 'slug' => 'zeka-akil-oyunlari']);
        ProductCategory::create(['title' => 'Ahşap Oyunlar', 'slug' => 'ahsap-oyunlar']);
    }
}
