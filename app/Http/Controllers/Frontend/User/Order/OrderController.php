<?php

namespace App\Http\Controllers\Frontend\User\Order;

use App\Http\Requests\User\Order\AskForFileResubmissionRequest;
use App\Http\Requests\User\Order\ConfirmDeliveryFilesRequest;
use App\Http\Requests\User\Order\FeedbackAsClientRequest;
use App\Http\Requests\User\Order\FeedbackAsProviderRequest;
use App\Http\Requests\User\Order\OrderResponseRequest;
use App\Http\Requests\User\Order\ShowDeliveryRequest;
use App\Http\Requests\User\Order\StartDeliveryRequest;
use App\Models\Order\Order;
use App\Models\Order\OrderFile;
use App\Models\Order\OrderState;
use App\Models\Service\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        if(!$request->ajax())
            return view('frontend.user_panel.orders.index');

        $user = auth()->user();
        $data = Order::where('provider_id', $user->id)->orWhere('client_id', $user->id)->with('state', 'client', 'provider', 'package', 'package.service');

        return DataTables::of($data)
            ->addColumn('action', function($data){
                return [
                    'viewUrl' => route('frontend.order.show', $data->id)
                ];
            })
            ->addColumn('order_status', function($data){
                return $data->state;
            })
            ->addColumn('service', function ($data){
                $package =  $data->package;
                return [
                    'serviceTitle' => $package->service->title,
                    'serviceUrl' => route('service.show', $package->service->id),
                    'packageType' => $package->type,
                ];
            })
            ->addColumn('client', function ($data){
                $client = $data->client;
                return [
                    'profileUrl' => url($client->getProfileUrl()),
                    'name' => $client->fullName()
                ];
            })
            ->addColumn('date', function ($data){
                return time_stamps_to_date($data->created_at);
            })
            ->rawColumns(['action', 'order_status', 'service', 'client'])
            ->make(true);
    }


    /**
     * Respond to the received order.
     *
     * @param OrderResponseRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function respond(OrderResponseRequest $request, $id) : RedirectResponse
    {
        $order = Order::findOrFail($id);

        if($order->state_id != 1)
            return redirect()->back()->withErrors(['error_message' => 'There is something wrong']);

        $isAccepted = $request->order_response;

        if($isAccepted) {
            $order->state_id = OrderState::PROGRESS;
            $order->accepted_at = date(now());
        } else {
            $order->state_id = OrderState::CANCELED;
        }

        if($order->save())
            return redirect()->route('frontend.order.show', $id);

        return redirect()->back()->withErrors(['error_message' => 'There is something wrong']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : \Illuminate\Http\JsonResponse
    {


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $order = Order::findOrFail($id);
        $remainingTime = max(0, $order->package->duration * 24 * 60 * 60 + strtotime($order->accepted_at) - strtotime(date(now())));
        $tax = 5;
        return view('frontend.user_panel.orders.show', compact('order', 'tax', 'remainingTime'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function destroy(Request $request, int $id)
    {

    }

    /**
     * show the delivery page
     * @param ShowDeliveryRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|RedirectResponse|View
     */
    public function showDelivery(showDeliveryRequest $request, int $id) {
        $order = Order::findOrFail($id);
        $tax = 5;
        return view('frontend.user_panel.orders.deliver', compact('order', 'tax'));
    }

    public function startDelivery(StartDeliveryRequest $request, int $id)
    {
        $order = Order::findOrFail($id);
        if($order->state->name !== 'progress')
            return redirect()->back();
        if($order->start_delivery) return response()->json(['error' => 'You have already started the delivery process.'], 422);
        $order->start_delivery = true;
        if($order->save())
            return response()->json(['success' => 'You have started the delivery process successfully!']);
        return response()->json(['error' => 'Error! The delivery process hasn\'t started'], 500);
    }

    public function confirmDeliveryFiles(ConfirmDeliveryFilesRequest $request, int $id) {

        $files = $request['file_names[]'];

        if(count($files) > 5) {
            return response()->json([
                'error' => 'You cannot upload more than 5 files'
            ], 422);
        }

        try {
            foreach ($files as $file) {
                if($file['newName'] === 'error')
                    return response()->json([
                        'error' => 'Please remove failure files'
                    ], 422);
            }
            $order = Order::find($id);

            if($order->state->name !== 'progress')
                return redirect()->back();

            if(!$order->start_delivery)
                return response()->json([
                    'error' => 'you must confirm starting the delivery process first',
                ], 422);

            $order['files_uploaded'] = true;
            $order->save();

            foreach ($files as $file) {
                Storage::move(get_temp_path() . '/' . $file['newName'], OrderFile::path() . $file['newName']);
                $orderFile = new OrderFile();
                $orderFile['file_name'] = $file['newName'];
                $orderFile['order_id'] = $id;
                $orderFile->save();
            }

            return response()->json([
                'success' => 'Files Are Confirmed Successfully'
            ]);

        } catch (\Exception $exception) {

            return response()->json([
                'error' => 'An Error Has Occurred'
            ], 500);

        }

    }

    public function feedbackAsClient(FeedbackAsClientRequest $request, $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        if($order->provider_given_rate) abort(404);
        $order->update([
            'provider_given_rate' => $request->rating,
            'provider_given_feedback' => $request->feedback,
        ]);
        return redirect()->back()->with(['success' => 'the order is completed.']);
    }

    public function feedbackAsProvider(FeedbackAsProviderRequest $request, $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        if(!$order->provider_given_rate || $order->state_id === OrderState::COMPLETE) abort(404);
        $order->update([
            'client_given_rate' => $request->rating,
            'client_given_feedback' => $request->feedback,
            'state_id' => OrderState::COMPLETE
        ]);
        return redirect()->route('frontend.order.show', $order->id)->with(['success' => 'the order is completed.']);
    }

    public function askForFileResubmission(AskForFileResubmissionRequest $request, $id): JsonResponse
    {
        $order = Order::findOrFail($id);
        if(!$order->files_uploaded) return response()->json(['error' => 'Files are not submitted yet !!']);
        $order->files_uploaded = false;
        return response()->json($order->save() ? ['success' => 'request has been sent successfully!'] : ['error' => 'There was an error when completing your request !!']);
    }

}
