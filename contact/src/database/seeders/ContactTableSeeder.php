<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Contact;
use Faker\Provider\ja_JP\Person as JapanesePerson;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
        $faker->addProvider(new JapanesePerson($faker));

        for ($i = 0; $i < 35; $i++) {
            $gender = $faker->randomElement(['男性', '女性']);
            $email = $faker->email;
            $postcode = $faker->numberBetween(100, 999) . '-' . $faker->numberBetween(1000, 9999);
            $address = $faker->address;
            $buildingName = $faker->optional()->buildingNumber;
            $opinion = $faker->text($maxNbChars = 200);
            while (mb_strlen($opinion) < 30) {
            $opinion = $faker->text($maxNbChars = 200);
            }

            $fullname = $faker->name;
            $createdAt = $faker->dateTimeBetween('-1 year', 'now');
            $updatedAt = $faker->dateTimeBetween($createdAt, 'now');

            Contact::create([
                'gender' => $gender,
                'email' => $email,
                'postcode' => $postcode,
                'address' => $address,
                'building_name' => $buildingName,
                'opinion' => $opinion,
                'fullname' => $fullname,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}