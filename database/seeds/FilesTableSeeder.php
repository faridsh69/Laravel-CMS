<?php

use App\Models\File;
use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    public function run()
    {
    	$files = [
    		[
    			'title' => 'profile_picture',
    			'extension' => 'jpg',
    			'file_name' => 'profile_picture-0.jpg',
    			'mime_type' => 'image/jpg',
    			'size' => 100000,
    			'src' => asset('storage/upload/user/1/profile_picture-0.jpg'),
    			'src' => asset('storage/upload/user/1/profile_picture-thumbnail-0.jpg'),
    			'fileable_type' => 'App\Models\User',
    			'fileable_id' => 1,
    		],
    	];

    	foreach($files as $file)
    	{
        	// File::firstOrCreate($file);
    	}
    }
}
