<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class MapLabels extends Command
{
    protected $signature = 'map:labels';

    protected $description = 'download map labels';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $max_zoom = 7;
        $init_zoom = 0;
        $iran_coordinates = [[0.50, 0.75], [0.35, 0.45]];
        $label_url = 'https://tiles.windy.com/labels/v1.3/en/';
        $points = [];
        for($zoom = $init_zoom; $zoom <= $max_zoom; $zoom ++){
            $max_coordinate = pow(2, $zoom) - 1;

            $iran_x_min = intval(floor($iran_coordinates[0][0] * $max_coordinate));
            $iran_x_max = intval(ceil($iran_coordinates[0][1] * $max_coordinate));
            $iran_y_min = intval(floor($iran_coordinates[1][0] * $max_coordinate));
            $iran_y_max = intval(ceil($iran_coordinates[1][1] * $max_coordinate));

            for($x = $iran_x_min; $x <= $iran_x_max; $x ++){
                for($y = $iran_y_min; $y <= $iran_y_max; $y ++){
                    $points[] = [
                        'zoom' => $zoom,
                        'x' => $x,
                        'y' => $y,
                    ];
                }
            }
        }
        $i = count($points);
        foreach($points as $point){
            $json_src = $label_url . $point['zoom'] . '/' . $point['x'] . '/' . $point['y'] . '.json';
            $directory_path = storage_path() . '/app/public/labels/' . $point['zoom'] . '/' . $point['x'];
            $file_path = $directory_path . '/' . $point['y'] . '.json';
            if(! file_exists($file_path))
            {
                File::makeDirectory($directory_path, 0777, true, true);
                $json_file = file_get_contents($json_src);
                file_put_contents($file_path, $json_file);
            }
            $i --;
            var_dump($i . '_label_' . $point['zoom'] . '_' . $point['x'] . '_' . $point['y']);
        }
        dd('map labels downloaded');
    }
}
