<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\User;
use Response;
use File;
use Illuminate\Http\Request;
use PDF;
class TestController extends Controller
{

    public function index()
    {
        $filename = 'SeatPlan.pdf';
        $file = public_path("/seat/{$filename}");
        if (File::exists($file))
        {
            unlink($file);
        }
        $users = User::all();
        event(new TestEvent($users));
        $html = '';
        $html.='
            <a href="/download">Download Pdf</a>
        ';
        return $html;
    }

    public function download()
    {
        $file= public_path(). "/seat/SeatPlan.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'SeatPlan.pdf', $headers);
    }
    public function pdf($users)
    {

        if (! file_exists(public_path('fonts'))) {
            mkdir(public_path('fonts'), 0777);
        }
        if (! file_exists(public_path('seat'))) {
            mkdir(public_path('seat'), 0777);
        }
        $filename = 'SeatPlan.pdf';
        $file = public_path("/seat/{$filename}");
        if (File::exists($file))
        {
            unlink($file);
        }
        PDF::loadView('pdf',compact('users'))->save(public_path().'/seat/'.$filename);


    }

    public function dummy()
    {

    }
}
