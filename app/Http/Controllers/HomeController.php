<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Semua gambar produk menggunakan file lokal.
        $products = [
            [
                'name' => 'Sunny Shore',
                'subtitle' => 'Ubi Jalar Kuning',
                'description' => 'Caramel pudding yang menggunakan ubi jalar kuning sebagai bahan lokal.',
                'price' => 7000,
                'image' => 'images/sunny-shore.png',
                'theme' => 'sunny',
                'emoji' => '💛',
            ],
            [
                'name' => 'Twilight Sea',
                'subtitle' => 'Ubi Jalar Ungu',
                'description' => 'Caramel pudding yang menggunakan ubi jalar ungu sebagai bahan lokal.',
                'price' => 7000,
                'image' => 'images/twilight-sea.png',
                'theme' => 'twilight',
                'emoji' => '💜',
            ],
            [
                'name' => 'Ocean Blue',
                'subtitle' => 'Bunga Telang',
                'description' => 'Caramel pudding dengan warna biru dari penggunaan bunga telang.',
                'price' => 7000,
                'image' => 'images/ocean-blue.png',
                'theme' => 'ocean',
                'emoji' => '💙',
            ],
        ];

        // Tempel link Google Form pemesanan yang asli di sini.
        $googleFormUrl = '';

        // Isi jika akun media sosial resmi sudah tersedia.
        $instagramUrl = 'https://www.instagram.com/seapudd_?srtk=ZXM4bmExYjhnZHk0';

        // Harga bundling dua varian bebas.
        $bundlePrice = 12000;

        return view('home', compact(
            'products',
            'googleFormUrl',
            'instagramUrl',
            'bundlePrice'
        ));
    }
}
