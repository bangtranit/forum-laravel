<?php

use Illuminate\Database\Seeder;

use LaravelForum\Channel;
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $channels = Channel::create([
            'name' => 'Laravel 5.8',
            'slug' => str_slug('Laravel 5'),
        ]);

        $channels = Channel::create([
            'name' => 'VueJS 3',
            'slug' => str_slug('VueJS 3'),
        ]);

        $channels = Channel::create([
            'name' => 'Angular 7',
            'slug' => str_slug('Angular 7'),
        ]);

        $channels = Channel::create([
            'name' => 'Swift 5',
            'slug' => str_slug('Swift 5'),
        ]);

        $channels = Channel::create([
            'name' => 'React JS',
            'slug' => str_slug('React JS'),
        ]);
    }
}
