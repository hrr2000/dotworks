<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Service\OrderPaymentRequest;
use App\Models\Order\Order;
use App\Models\Order\OrderState;
use App\Models\Service\ServicePackage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service\Service;

class ServiceViewController extends Controller
{

    /**
     * Show the Service Data BY id
     *
     * @param int $id (Service Id)
     * @return View (the Service view)
     */

    public function show(int $id): View
    {
        $service =  Service::where('id', $id)->with(['packages', 'packages.orders', 'packages.orders.client'])->first();
        $service_rate = 0;
        $orders_pending = 0;
        $orders_completed = 0;
        $clients = [];
        foreach($service->packages as $package) {
            $service_rate += $package->orders->sum('client_given_rate');
            $orders_completed += $package->orders->where('state_id', OrderState::COMPLETE)->count();
            $orders_pending += $package->orders->where('state_id', OrderState::PENDING)->count();
            foreach($package->orders as $order) {
                if(!$order->provider_given_rate) continue;
                $order->client->rate_date = $order->updated_at;
                $order->client->feedback = $order->provider_given_feedback;
                $clients[] = $order->client;
            }
        }
        $service_rate /= $orders_completed;
        return view('frontend.service', compact('service', 'service_rate', 'orders_completed', 'orders_pending', 'clients'));
    }


    /**
     * Show the Service Data BY id
     *
     * @param int $id (Service Id)
     * @param string $packageType (service package type)
     * @return View (the order view)
     */
    public function viewOrderInformation($id, $packageType): View
    {

        $service =  Service::findOrFail($id);

        $package = ServicePackage::where('service_id', $id)->where('type', $packageType)->get()->first();

        $tax = 5;

        if(!$package || !$package->state)
            abort(404);

        return view('frontend.service_order.order_information', compact('service', 'package', 'tax'));

    }

    /**
     * Confirm Payment page for the service
     *
     * @param OrderPaymentRequest $request
     * @param int $id (Service Id)
     * @param string $packageType (service package type)
     */
    public function viewOrderPayment(OrderPaymentRequest $request, int $id, string $packageType)
    {

        $service =  Service::findOrFail($id);

        $package = ServicePackage::where('service_id', $id)->where('type', $packageType)->get()->first();

        if(!$package || !$package->state)
            abort(404);

        $tax = 5;

        $amount = $request->order_amount;

        $totalPrice = $package->price * $amount;
        $totalPrice += $totalPrice * $tax / 100;

        $user = auth()->user();

        $enough = ($totalPrice <= $user->balance);

        if($request->method() === 'GET')
            return view('frontend.service_order.order_payment', compact('service', 'amount', 'package', 'tax', 'enough', 'totalPrice'));

        if($enough) {
            $order = new Order();
            $order->client_id = $user->id;
            $order->provider_id = $service->user_id;
            $order->package_id = $package->id;
            $order->state_id = 1;
            $order->price = $totalPrice;
            $order->amount = $amount;

            $user->balance = $user->balance - $totalPrice;

            if($order->save()) {
                if ($user->save()) {
                    return redirect(route('service.order.complete', $order->id));
                }
                $order->delete();
            }

            return redirect()->back();

        }

        return redirect()->back();

    }

    /**
     * Service buying complete page
     *
     * @param Request $request
     * @param int $id (Service Id)
     * @param string $packageType (service package type)
     */
    public function viewOrderComplete(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $package = $order->package;
        $service = $package->service;
        $amount = $order->amount;
        $tax = 5;
        $totalPrice = $order->price;
        return view('frontend.service_order.order_complete', compact('order', 'service', 'amount', 'package', 'tax', 'totalPrice'));
    }

}
