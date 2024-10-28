<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        level::create([
            'level' => 'manager'
        ]);

        level::create([
           'level' => 'cashier' 
        ]);

        level::create([
           'level' => 'admin' 
        ]);

        User::create([
            'level_id' => '1',
            'name' => 'daffy',
            'username' => 'daffyaja',
            'password' => bcrypt('asd321'),
            'email' => 'daffy@gmail.com', 
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        User::create([
            'level_id' => '2',
            'name' => 'tante Ina',
            'username' => 'inakasir',
            'password' => bcrypt('asd123'),
            'email' => 'inakasir@gmail.com', 
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        User::create([
            'level_id' => '3',
            'name' => 'balqis',
            'username' => 'balqis',
            'password' => bcrypt('asdasd123'),
            'email' => 'balqis@gmail.com',
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        $menuData = [
            [
                'name' => 'bakso',
                'modal' => '10000',
                'price' => '100000',
                'description' => '<div><strong>Consisting of<br></strong>- rice with, <strong><br></strong>- beef cut into small pieces and cooked in a blend of spices.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            
            [
                'name' => 'Matcha',
                'modal' => '10000',
                'price' => '15000',
                'description' => '-',
                'picture' => 'image.png',
                'category' => 'drink'
            ],
        ];

        $imageUrls = [
            'https://png.pngtree.com/png-clipart/20230105/original/pngtree-bakso-telor-vector-transparent-background-png-image_8874968.png',
            'https://static.vecteezy.com/system/resources/previews/020/002/976/non_2x/matcha-green-tea-graphic-clipart-design-free-png.png',
            'https://static.vecteezy.com/system/resources/previews/025/066/150/original/pudding-with-ai-generated-free-png.png'
        ];

        foreach ($menuData as $key => $menu) {
            $filename = Str::random(40) . '.png'; 

            $imageData = file_get_contents($imageUrls[$key]); 
            Storage::put('menu/' . $filename, $imageData); 

            $menu['picture'] = 'menu/' . $filename; 

            Menu::create($menu);
        }
    }
}





