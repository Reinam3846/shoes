<?php

use Illuminate\Database\Seeder;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            [
                'name' => 'Mint Sandal',
                'content' => 'Slip-on style Braided band Open toe',
                'image' => 'mint_1.jpg'
            ],
            [
                'name' => 'Light Pink Sandal',
                'content' => 'Low contoured heel',
                'image' => 'pink_1.jpg'
            ],
            [
                'name' => 'Lavender Sandal',
                'content' => 'Truesdale Flat Sandal',
                'image' => 'Lavender_1.jpg'
            ],
            [
                'name' => 'Blue Sandal',
                'content' => 'Cornflower Blue Sandals',
                'image' => 'blue_1.jpg'
            ],
            [
                'name' => 'Yellow Sandal',
                'content' => 'Buckled slide sandals',
                'image' => 'yellow_1.jpg'
            ],
            [
                'name' => 'Red Sandal',
                'content' => 'Bow Detail Upper Leather Lining',
                'image' => 'red_1.jpg'
            ],
            [
                'name' => 'Green Sandal',
                'content' => 'This will make any simple outfit.',
                'image' => 'green_1.jpg'
            ],
            [
                'name' => 'White Sandal',
                'content' => 'Leather Crossover design',
                'image' => 'white_1.jpg'
            ],
            [
                'name' => 'Yellow Mule',
                'content' => 'Comfy Suade New YELLOW',
                'image' => 'yellowmule.jpg'
            ],
            [
                'name' => 'Pink Mule',
                'content' => 'Something you should buy!',
                'image' => 'pinkmule.jpg'
            ],
            [
                'name' => 'Red Mule',
                'content' => 'This is good for autumn!', 
                'image' => 'redmule.jpg'
            ],
            [
                'name' => ' Blue Loafer',
                'content' => 'Beautiful blue suade loafer',
                'image' => 'bluesuade.jpg'
            ],
            [
                'name' => ' Purple Flat',
                'content' => 'Stunner Women Cute Ballet Shoes',
                'image' => 'purpleballet.jpg'
            ],
            [
                'name' => 'Pink Bootie',
                'content' => 'Piper85 leather ankle boots',
                'image' => 'pinkboots.jpg'
            ],
             [
                'name' => 'Baby Blue Boots',
                'content' => 'Dorateymur Baby Blue Suede',
                'image' => 'babyblueboots.jpg'
            ],
            [
                'name' => 'White Bootie',
                'content' => 'Good to wear into the new season.',
                'image' => 'whiteboots.jpg'
            ],
             [
                'name' => ' Purple Bootie',
                'content' => 'You’ll See Everywhere This Fall',
                'image' => 'purpleboots.jpg'
            ],
            [
                'name' => 'Mint Boots',
                'content' => 'Leather Knee-high Boots In Mint.',
                'image' => 'mintlongboots.jpg'
            ],
         ]);
    }
}
