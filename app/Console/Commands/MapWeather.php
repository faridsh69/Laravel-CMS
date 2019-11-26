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
        $years = [$date->year];
        $months = [$date->month]; // should set zero before number
        $days = [$date->day, $date->day + 1, $date->day + 2];  // should set zero before number
        $hours = ['00', '03', '06', '09', '12', '15', '18', '21'];
        $zooms = [
            '257w2' => 3, 
            '257w3' => 7,
            // '257w4' => 15,
        ]; // 257w2 -> zoom ta 4 // 257w3 -> zoom ta 7  
        $hights = ['surface', '100', 
            // '950h', '925h', '900h', '850h', '800h', '700h', '600h', '500h', '400h', '300h', 
            // '250h', '200h', '150h'
        ];
        $types = [
            'wind',
            // 'temp',
            // 'pressure',
            // 'cloudsrain',
        ];
        $years = ['2019'];
        $months = ['07'];
        $days = ['01'];
        $hours = ['12'];
        $points = [];
        foreach($hights as $height){
            foreach($years as $year){
                foreach($months as $month){
                    foreach($days as $day){
                        foreach($hours as $hour){
                            foreach($zooms as $zoom => $max_coordinate){
                                for($x = 0; $x <= $max_coordinate; $x ++){
                                    for($y = 0; $y <= $max_coordinate; $y ++){
                                        foreach($types as $type){
                                            $points[] = [
                                                'year' => $year,
                                                'month' => $month,
                                                'day' => $day,
                                                'hour' => $hour,
                                                'zoom' => $zoom,
                                                'x' => $x,
                                                'y' => $y,
                                                'height' => $height,
                                                'type' => $type,
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
        foreach($points as $point){
            $image_src = $weather_url . 
                $point['year']. '/'. $point['month']. '/'. $point['day']. '/'.
                $point['hour']. '/'. $point['zoom']. '/'. $point['x']. '/'. $point['y']. '/'. 
                $point['type']. '-'. $point['height'] . '.jpg';

            $directory_path = storage_path() . '/app/public/ecmwf-hres/'. 
                $point['year']. '/'. $point['month']. '/'. $point['day']. '/'.
                $point['hour']. '/'. $point['zoom']. '/'. $point['x']. '/'. $point['y'];

            $file_path = $directory_path . '/' . $point['type']. '-'. $point['height'] . '.jpg';
            if(!file_exists($file_path))
            {
                File::makeDirectory($directory_path, 0777, true, true);
                $image_file = file_get_contents($image_src); 
                file_put_contents($file_path, $image_file);
            }
            var_dump('weather_'. $point['year']. '_'. $point['month']. '_'. $point['day']. '_'.
                $point['hour']. '_'. $point['zoom']. '_'. $point['x']. '_'. $point['y']. '_'. 
                $point['type']. '_'. $point['height']);
        }
        dd('map weather downloaded');
    }
}
