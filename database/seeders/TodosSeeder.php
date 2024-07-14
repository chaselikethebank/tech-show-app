<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
         // Replace the user_id with the actual ID of the user you want to associate with the todos
         $userId = 1; // Replace with the ID of the user

         Todo::create([
             'title' => 'Change Oil',
             'description' => 'Drain, replace oil and filter, check for leaks' ,
             'timer_running' => false,
             'user_id' => $userId, // Assigning the user_id here
         ]);
    }
}
