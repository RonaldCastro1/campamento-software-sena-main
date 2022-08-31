<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Bootcampseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/bootcamps.json");
        $jsonD = json_decode($json);

        foreach($jsonD as $bootcamp){
            $b = new Bootacamp();
            $b -> name = $bootcamp -> name;
            $b -> description = $bootcamp -> description;
            $b -> website = $bootcamp -> website;
            $b -> phone = $bootcamp -> phone;
            $b -> average_cost = $bootcamp -> average_cost;
            $b -> average_rating = $bootcamp -> average_rating;
            $b -> user_id = 1;
            $b -> save();
        }
    }
}
