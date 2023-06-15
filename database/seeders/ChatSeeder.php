<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Mengosongkan tabel messages
        Message::truncate();

        // Mendapatkan semua user
        $users = User::all();

        foreach ($users as $sender) {
            $receiver = $users->random();

            $messages = $faker->sentences(rand(1, 5));

            $messageString = implode(' ', $messages);

            Message::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'messages' => $messageString,
            ]);
        }
    }
}
