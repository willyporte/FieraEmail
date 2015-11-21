<?php

namespace App\Http\Controllers;

use App\Parameter;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TicketRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use \DB;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index');
    }

    public function store(TicketRequest $request)
    {

        $name = $request->name;
        $email = $request->email;
        // averiguo la cantidad de records
        $parametri = DB::table('parametri')->select('id','omaggi_ogni','gadget_ogni','time')->first();
        $gadget_ogni = $parametri->gadget_ogni;
        $omaggi_ogni = $parametri->omaggi_ogni;
        $time = $parametri->time;
        //$total_number = Ticket::all()->count();
        // test
        $total_number = 50;
        // fin test

        if(($total_number % $omaggi_ogni == 0) AND $total_number > 0) {
            $img = Image::make('images/omaggio.jpg');
            // use callback to define details
            $img->text(
                $name,
                50,
                370,
                function ($font) {
                    $font->file('arial.ttf');
                    $font->size(15);
                    $font->color('#000');
                    // $font->align('center');
                    //$font->valign('top');
                    //$font->angle(45);
                }
            );

            $img->text(
                $email,
                50,
                395,
                function ($font) {
                    $font->file('arial.ttf');
                    $font->size(15);
                    $font->color('#000');
                    // $font->align('center');
                    //$font->valign('top');
                    //$font->angle(45);
                }
            );

            //return $img->response('jpg');
            $nome_img = 'images/'.time().'-omaggio.jpg';
            $img->save($nome_img);
            //salvar en tabla tickets omaggio e link imagen
            $ticket = new Ticket();
            $ticket->name = $name;
            $ticket->email = $email;
            $ticket->won = 'omaggio';
            $ticket->image = $nome_img;
            $ticket->save();

            return view('biglietto',compact('nome_img','time'));

        }
        elseif (($total_number % $gadget_ogni == 0) AND $total_number > 0) {
            $img = Image::make('images/gadget.jpg');
            // use callback to define details
            $img->text(
                $name,
                50,
                370,
                function ($font) {
                    $font->file('arial.ttf');
                    $font->size(15);
                    $font->color('#000');
                    // $font->align('center');
                    //$font->valign('top');
                    //$font->angle(45);
                }
            );

            $img->text(
                $email,
                50,
                395,
                function ($font) {
                    $font->file('arial.ttf');
                    $font->size(15);
                    $font->color('#000');
                }
            );

            //return $img->response('jpg');
            $nome_img = 'images/'.time().'-gadget.jpg';
            $img->save($nome_img);
            // salvar en tabla tickest: gadget e link
            $ticket = new Ticket();
            $ticket->name = $name;
            $ticket->email = $email;
            $ticket->won = 'gadget';
            $ticket->image = $nome_img;
            $ticket->save();

            return view('gadget',compact('nome_img','time'));

        }
        else {
            $ticket = new Ticket();
            $ticket->name = $name;
            $ticket->email = $email;
            $ticket->save();
            return view('spiacenti',compact('name','time'));
        }

    }
}
