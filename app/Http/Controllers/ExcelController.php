<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Ticket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        Excel::create(
            'tickets',
            function ($excel) {

                $excel->sheet(
                    'tickets',
                    function ($sheet) {

                        $tickets = Ticket::select('email')->get();
                        $sheet->fromArray($tickets);

                    }
                );
            }
        )->export('xls');

    }
}