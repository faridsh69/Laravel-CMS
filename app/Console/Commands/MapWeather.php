<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use File;

class MapWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'download map weather';

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
        $date = Carbon::now();
        $weather_url = 'https://ims.windy.com/ecmwf-hres/';
        $hours = ['00', '03', '06', '09', '12', '15', '18', '21'];
        
        // #1 types for weather statics
        $types = [ 
            'wind',
            'temp',
            'rh',
            'cloudtop',
            'pressure',
            // 'hclouds',
            // 'cbase',
        ];
        // #2 height
        $heights = ['surface', '100m', '950h',
            // '925h', '900h', '850h', '800h', '700h', '600h', '500h', '400h', '300h', 
            '250h', '200h', '150h'
        ];
        // #3 year
        $years = [$date->year];
        $years = ['2019'];
        // #4 month
        $months = [$date->month]; // should set zero before number
        $months = ['12'];
        // #5 day
        $days = [$date->day, $date->day + 1, $date->day + 2,  $date->day + 3];
        $days = ['02'];
        // #6 hour
        $hours = ['00', '03', '06', '09', '12', '15', '18', '21'];
        $hours = ['12'];
        // #7 zooms: 257w2 -> zoom ta 4 - 257w3 -> zoom ta 7 
        $zooms = [
            '257w2' => 3,
            '257w3' => 7,
            // '257w4' => 15,
        ];
        $points = [];
        foreach($types as $type){
            foreach($heights as $height){
                if($type === 'temp' && $height === '100m'){continue;}
                if($type === 'rh' && $height === '100m'){continue;}
                if($type === 'hclouds' && $height !== 'surface'){continue;}
                if($type === 'cloudtop' && $height !== 'surface'){continue;}
                if($type === 'cbase' && $height !== 'surface'){continue;}
                if($type === 'pressure' && $height !== 'surface'){continue;}
                foreach($years as $year){
                    foreach($months as $month){
                        foreach($days as $day){
                            foreach($hours as $hour){
                                foreach($zooms as $zoom => $max_coor){

                                    $iran = [[0.50, 0.75], [0.35, 0.45]];
                                    $iran_x_min = intval(floor($iran[0][0] * $max_coor));
                                    $iran_x_max = intval(ceil($iran[0][1] * $max_coor));
                                    $iran_y_min = intval(floor($iran[1][0] * $max_coor));
                                    $iran_y_max = intval(ceil($iran[1][1] * $max_coor));

                                    for($x = $iran_x_min; $x <= $iran_x_max; $x ++){
                                        for($y = $iran_y_min; $y <= $iran_y_max; $y ++){
                                            $points[] = [
                                                'type' => $type,
                                                'height' => $height,
                                                'year' => $year,
                                                'month' => $month,
                                                'day' => $day,
                                                'hour' => $hour,
                                                'zoom' => $zoom,
                                                'x' => $x,
                                                'y' => $y,
                                            ];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $i = count($points);
        foreach($points as $point){
            $passwand = '.jpg';
            if($point['type'] === 'pressure'){$passwand = '.png';}
            $image_src = $weather_url . 
                $point['year']. '/'. $point['month']. '/'. $point['day']. '/'.
                $point['hour']. '/'. $point['zoom']. '/'. $point['y']. '/'. $point['x']. '/'. 
                $point['type']. '-'. $point['height'] . $passwand;

            $directory_path = storage_path() . '/app/public/ecmwf-hres/'. 
                $point['year']. '/'. $point['month']. '/'. $point['day']. '/'.
                $point['hour']. '/'. $point['zoom']. '/'. $point['y']. '/'. $point['x'];

            $file_path = $directory_path . '/' . $point['type']. '-'. $point['height'] . $passwand;
            if(!file_exists($file_path))
            {
                File::makeDirectory($directory_path, 0777, true, true);
                $image_file = file_get_contents($image_src); 
                file_put_contents($file_path, $image_file);
            }
            $i --;
            var_dump($i . '_weather_'. 
                $point['year']. '_'. $point['month']. '_'. $point['day']. '_'.
                $point['hour']. '_'. $point['zoom']. '_'. $point['y']. '_'. $point['x']. '_'. 
                $point['type']. '_'. $point['height']);
        }
        dd('map weather downloaded');
    }
}
