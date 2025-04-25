<?php

namespace App\Database\Seeds;

use App\Models\StudentModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 50; $i++) {

            $data[] = $this->generateTestStudent();
        }

        $student_obj = new StudentModel();

        $student_obj->insertBatch($data);
    }

    public function generateTestStudent()
    {
        $faker = Factory::create();

        return [
            "name" => $faker->name(),
            "email" => $faker->email,
            "mobile" => $faker->phoneNumber,
            "branch" => $faker->randomElement([
                "Computer Science",
                "Mechancial",
                "Electrical",
                "Civil",
                "Robotics",
                "Medical",
            ]),
        ];
    }
}