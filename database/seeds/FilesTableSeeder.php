<?php

use Illuminate\Database\Seeder;
use App\Models\File;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$files = [
    		[
    			'title' => 'profile_picture',
    			'extension' => 'jpg',
    			'file_name' => 'profile_picture-0.jpg',
    			'mime_type' => 'image/jpg',
    			'size' => 100000,
    			'src' => asset('storage/files/upload/user/1/profile_picture-0.jpg'),
    			'src' => asset('storage/files/upload/user/1/profile_picture-thumbnail-0.jpg'),
    			'fileable_type' => 'App\Models\User',
    			'fileable_id' => 1,
    		],
    	];

    	foreach($files as $file)
    	{
        	File::firstOrCreate($file);
    	}
    }
}
