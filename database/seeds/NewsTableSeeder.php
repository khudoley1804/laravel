<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Models\News::create([
            'user_id' => '1',
            'title' => 'testnews',
            'content' => 'Test message',
        ]);
    }
}
