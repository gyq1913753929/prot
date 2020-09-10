<?php

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Model\Brand;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //一条
        // DB::table('brand')->insert([
        //     'brand_name' =>Str::random(10),
        //     'brand_url' =>Str::random(10).'@gmail.com',
        //     'brand_logo' =>'http://upload.com/upload/IYTewmKfjv9oW8ujs6FfX2G393DKJlTGOik1UIHz.png',
        //     'brand_desc'=>Str::random(10),
        //     'updated_at'=>date('Y-m-d H:i:s',time()),
        //     'created_at'=>date('Y-m-d H:i:s',time()),
        //     ]);
    //多条
        factory(App\Model\Brand::class, 10)->create();
        
    }
}
