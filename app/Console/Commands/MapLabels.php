<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MapLabels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:labels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'download map labels';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $init_zoom = 0;
        $max_zoom = 5;
        $tile_url = 'https://tiles.windy.com/labels/v1.3/en/';
        $points = [];
        for($zoom = $init_zoom; $zoom <= $max_zoom; $zoom ++){
            $max_coordinate = pow(2, $zoom) - 1;
            for($x = 0; $x <= $max_coordinate; $x ++){
                for($y = 0; $y <= $max_coordinate; $y ++){
                    $points[] = [
                        'zoom' => $zoom,
                        'x' => $x,
                        'y' => $y,
                    ];
                }
            }
        }
        foreach($points as $point){
            $json_src = $tile_url . $point['zoom']. '/'. $point['x']. '/'. $point['y']. '.json';
            $directory_path = storage_path() . '/app/public/labels/'. $point['zoom']. '/'. $point['x'];
            $file_path = $directory_path . '/' . $point['y']. '.json';
            if(!file_exists($file_path))
            {
                File::makeDirectory($directory_path, 0777, true, true);
                $json_file = file_get_contents($json_src); 
                file_put_contents($file_path, $json_file);
            }
            var_dump('label_'. $point['zoom']. '_'. $point['x']. '_'. $point['y']);
        }
        dd('map labels downloaded');
    }
}
