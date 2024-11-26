<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use Faker\Generator as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        // Recupero tutti gli user
        $user = User::all();

        for ($i = 0; $i < 10; $i++) {
            $newTicket = new Ticket();
            $newTicket->title_ticket = $faker->sentence;
            $newTicket->email_ticket = $faker->text;
            $newTicket->message_ticket = $faker->text;
            $newTicket->status_ticket = $faker->randomElement(['Assigned', 'In progress', 'Closed']);

            // Seleziona un operatore e una categoria casuali solo se esistono
            $newTicket->user_id = $user->random()->id ?? null;
            $newTicket->save();
        }
    }
}
