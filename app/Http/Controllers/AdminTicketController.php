<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Maatwebsite\Excel;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Carbon::setLocale('it');
        $email = trim($request->get('email')); // uso trim para evitar problemas con los espacios ...
        $won = $request->get('won');

        $tickets = Ticket::orderBy('updated_at','DESC')->email($email)->won($won)->paginate();

        return view('admin.index', compact('tickets'));
    }

    public function image($nome_img) {
        return view('admin.image',compact('nome_img'));
    }
}

