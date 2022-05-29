<?php

namespace Database\Seeders;

use App\Models\Furniture;
use Illuminate\Database\Seeder;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $furniture = new Furniture();
        $furniture->name = "Lemari";
        $furniture->price = 550000;
        $furniture->type = "Storage";
        $furniture->color = "Black";
        $furniture->image = "images/gambar1.jpg";
        $furniture->save(); 
 
        $furniture = new Furniture();
        $furniture->name = "Sofa";
        $furniture->price = 7000000;
        $furniture->type = "Living Room";
        $furniture->color = "Black";
        $furniture->image = "images/gambar2.jpg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Meja Rias";
        $furniture->price = 300000;
        $furniture->type = "Workstation";
        $furniture->color = "White";
        $furniture->image = "images/gambar3.jpg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Wastafel";
        $furniture->price = 2500000;
        $furniture->type = "Kitchen";
        $furniture->color = "Yellow";
        $furniture->image = "images/gambar4.jpg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Lemari Buku";
        $furniture->price = 800000;
        $furniture->type = "Living Room";
        $furniture->color = "Green";
        $furniture->image = "images/gambar5.jpg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Sofa Pendek";
        $furniture->price = 600000;
        $furniture->type = "Living Room";
        $furniture->color = "Black";
        $furniture->image = "images/gambar6.jpg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Kasur";
        $furniture->price = 4500000;
        $furniture->type = "Living Room";
        $furniture->color = "Black";
        $furniture->image = "images/gambar7.jpeg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Lampu";
        $furniture->price = 99000;
        $furniture->type = "Lamp and Electronic";
        $furniture->color = "Green";
        $furniture->image = "images/gambar8.jpeg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Rak Sepatu";
        $furniture->price = 500000;
        $furniture->type = "Storage";
        $furniture->color = "Green";
        $furniture->image = "images/gambar9.jpeg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Kursi";
        $furniture->price = 175000;
        $furniture->type = "Living Room";
        $furniture->color = "Blue";
        $furniture->image = "images/gambar10.jpeg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Lemari Kayu";
        $furniture->price = 1380000;
        $furniture->type = "Living Room";
        $furniture->color = "Black";
        $furniture->image = "images/gambar11.jpeg";
        $furniture->save(); 

        $furniture = new Furniture();
        $furniture->name = "Rak Sepatu Mini";
        $furniture->price = 2800000;
        $furniture->type = "Storage";
        $furniture->color = "Red";
        $furniture->image = "images/gambar12.jpeg";
        $furniture->save(); 

    }
}
