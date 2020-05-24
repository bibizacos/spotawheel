<?php
/**
 * Created by PhpStorm.
 * User: bibiz
 * Date: 24-May-20
 * Time: 12:04 PM
 */

namespace App\Http\Controllers;


use App\Client;
use App\Payment;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    /**
     * Show all clients.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clients()
    {
        $columns = [
            'ID',
            'Name',
            'Surname',
            'Created At',
            'Updated At',
            'Operations',
        ];
        return view('clients', ['clients' => Client::all(), 'columns' => $columns]);
    }


    /**
     *Show client profile & search for payments.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function client(Request $request, $id)
    {
        $clientPayments=[];
        $requested=false;
        if (!is_null($request->get('daterange'))) {
            $requested=true;
            $dateRange = explode(" - ", $request->get('daterange'));
            $tstampFrom = $dateRange[0];
            $tstampTo = $dateRange[1];
            $payments = Payment::where('user_id', $id)
                ->where('created_at', '>=', $tstampFrom)
                ->where('created_at', '<=', $tstampTo)
                ->orderBy('id', 'desc')
                ->get();
            $clientPayments = $payments->all();
        }
        return view('client', [ 'id' => $id, 'clientPayments' => $clientPayments,'requested'=>$requested]);
    }

}