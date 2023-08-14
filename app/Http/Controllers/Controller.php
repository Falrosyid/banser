<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Carbon\Carbon;
use View;
use App\Anggota;
use App\Ranting;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

    	setlocale(LC_TIME, 'nl_NL.utf8');
        Carbon::setLocale('id');

        $now = Carbon::now();

    	$notifanggota = Anggota::where('user_id', null)->orderBy('created_at', 'DESC')->get();

        View::share ( 'notifanggota', $notifanggota );
        View::share ( 'now', $now );
    }
}
