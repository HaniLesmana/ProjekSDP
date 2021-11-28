<?php

namespace Database\Seeders;

use App\Models\chat;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $chat=chat::create([
             "chat_sender"=> 1,
             "chat_destination"=>1,
             "chat_from"=>"user",
             "chat_text"=>"kuda",
        ]);
        $chat->save();
    }
}
