<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rfid;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class microController extends Controller
{
    public static function keIndonesia($tgl) {
        $dt = new  \Carbon\Carbon($tgl);
        setlocale(LC_TIME, 'IND');
            
        return $dt->formatLocalized('%A, %e %B %Y');
    } 
    
    
    public static function keIndonesia_w_time($tgl) {
        $dt = new  \Carbon\Carbon($tgl);
        setlocale(LC_TIME, 'IND');
            
        return $dt->formatLocalized('%A, %e %B %Y %H:%M:%S'); // Senin, 3 September 2018 00:00:00
    } 

    
    public function index()
    {
        return view('micro.index');
    }

    public function getData()
    {
        if(isset($_GET['add']))
        {
            $data = $_GET['add'];
            /* ========== cek ======== */
            
            $cek = rfid::where('rfid', $data)->whereDay('created_at', date('d'))->count();
            if($cek >= 1)
            {
                    $update = rfid::where('rfid', $data)->whereday('created_at', date('d'))->first();
                    $update->updated_at = Carbon::now();
                    $update->save();
            }
            else
            {
                /*========================= */
                $sim = new rfid();
                $sim->rfid = $data;
                $sim->save();
                 /*========================= */
            }
            $sim = new rfid();
                $sim->rfid = $data;
                $sim->save();
            
        }else{
            dd('kick');
        }
    }

    public function hasil()
    {
        $data = rfid::all();

        return view('micro.hasil', compact('data'));
    }

    public function waktu()
    {
        Date::setLocale('id');//id kode untuk indonesia
        $tgl_hari_ini = Date::now()->format('j F Y H:i:s');
        $date = new Date('2019-12-1');
        // echo $date->format('j F Y H:i:s');
        // echo '<br>';
        $jam1 = strtotime('07:00:00');
        $jam2 = strtotime('07:45:00');
        $jam3 = strtotime('08:30:00');

        $waktu_skr = strtotime('05:00:01');
        //echo date('i',$waktu_skr);
        // echo 'jam1 =' .$jm1 = floor(($jam1 - $waktu_skr)/60) . ' menit';
        // echo '<br>';
        // echo 'jam2 ='. $jm2 = ($jam2 - $waktu_skr)/60;
        // echo '<br>';
        // echo 'jam3 ='. $jm3 = ($jam3 - $waktu_skr)/60;
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';

        // if($jm1 >= -45 AND $jm1 < 15)
        // {
        //     echo 'jam1';
        // }else if($jm2 >= -15 AND $jm2 <= 45)
        // {
        //     echo 'jam2';
        // }else if($jm2 >= -15 AND $jm3 <= 45)
        // {
        //     echo 'jam3';
        // }else{
        //     echo 'pengabsenan kelas belum di mulai';
        // }
        $jm1 = floor(($jam1 - $waktu_skr)/60);
        $jm2 = ($jam2 - $waktu_skr)/60;
        $jm3 = ($jam3 - $waktu_skr)/60;

        $jam = array($jm1,$jm2,$jm3);
        switch($jam)
            {
                case ($jm1 >= -45 && $jm1 < 15): echo "Jam 1";break;
                case ($jm2 >= -15 && $jm2 <= 45): echo "Jam 2";break;
                case ($jm3 >= -15 && $jm3 <= 45): 
                    return view('micro.test');
                break;
                case($jam <-45 || $jam  > 45): echo "jancok";break;
            };
        //return view('micro.test');
    }
}
