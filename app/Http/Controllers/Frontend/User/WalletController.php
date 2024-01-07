<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\User\Invoice;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WalletController extends Controller
{

    public function index(Request $request)
    {
        if(!$request->ajax())
            return view('frontend.user_panel.wallet.index');

        $user = auth()->user();

        $data = Invoice::where('client_id', $user->id)->with('service', 'provider');

        return DataTables::of($data)
            ->addColumn('action', function($data){
                return [
                ];
            })
            ->addColumn('service', function ($data){
                $service =  $data->service;
                return [
                    'serviceTitle' => $service ? $service->title : 'None',
                    'serviceUrl' => $service ? route('service.show', $service->id) : '#',
                ];
            })
            ->addColumn('provider', function ($data){
                $provider =  $data->provider;
                return [
                    'profileUrl' => $provider ? url($provider->getProfileUrl()) : '#',
                    'name' => $provider ? $provider->fullName() : 'Dotworks'
                ];
            })
            ->addColumn('date', function ($data){
                return time_stamps_to_date($data->created_at);
            })
            ->make(true);
    }

    public function showDepositAmount()
    {
        return view('frontend.user_panel.wallet.deposit.amount');
    }

    public function showDepositPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1|max:10000000'
        ]);
        $amount = $request->amount;
        return view('frontend.user_panel.wallet.deposit.payment', compact('amount'));
    }

    public function showWithdraw()
    {
        return view('frontend.user_panel.wallet.withdraw');
    }

}
