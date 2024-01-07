<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests\User\Service\DestroyServiceRequest;
use App\Http\Requests\User\Service\UpdateServiceRequest;
use App\Http\Requests\User\Service\StoreServiceRequest;
use App\Models\Service\Service;
use App\Models\Service\Category;
use App\Models\Service\ServiceImage;
use App\Models\Service\ServicePackage;
use App\Models\Service\ServicePackageOffer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        if(!$request->ajax())
            return view('frontend.user_panel.services.index');

        $user = auth()->user();

        $data = Service::where('user_id', $user->id)
            ->where('state_id', '!=', 4)
            ->with(['images']);

        return DataTables::of($data)
            ->addColumn('action', function($data){
                return [
                    'id' => $data->id,
                    'editUrl' => route('frontend.service.edit', $data->id),
                ];
            })
            ->addColumn('service_status', function($data){
                return $data->state;
            })
            ->addColumn('service_image', function ($data){
                return $data->images->first()->url();
            })
            ->addColumn('date', function ($data){
                return time_stamps_to_date($data->created_at);
            })
            ->rawColumns(['action', 'service_image', 'service_status', 'service_rate'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('frontend.user_panel.services.create',[
            'categories' => Category::all(),
            'guaranteeList' => [

            ],
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServiceRequest $request
     * @return JsonResponse
     */
    public function store(StoreServiceRequest $request) : JsonResponse
    {

        $images = $request->images;

        // Images number limitation
        if(count($images) > 5)  return response()->json(['errors' => ['images' => 'Please choose at most 5 images.']], 422);

        // Saving service main details
        $service = new Service([
            'title' => $request['title'],
            'overview' => $request['overview'],
            'description' => $request['description'],
            'guarantee' => $request['guarantee'],
            'price' => $request['price'],
            'category_id' => $request['category'],
            'state_id' => 1,
            'user_id' => Auth::user()->id
        ]);

        if(!$service->save())
            return response()->json(['error_message' => 'There was a problem. Service is not created.'], 422);

        if(!$this->saveImages($service, $images)) {

            $service->delete();

            return response()->json(['error_message' => 'There was a problem when uploading images.'], 422);

        }

        $packages = [
            'basic',
            'standard',
            'premium'
        ];

        // Saving Empty Packages
        foreach ($packages as $package) {

            $servicePackage = new ServicePackage([
                'type' => $package,
                'service_id' => $service->id
            ]);

            if (!$servicePackage->save()) {

                $service->delete();

                return response()->json(['error_message' => 'There was a problem. Service is not created.'], 422);

            }

        }

        if(!$this->savePackages($service, $request)){

            $service->delete();

            return response()->json(['error_message' => 'There was a problem.'], 422);

        }

        return response()->json(['success_message'=>'Service Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Response
     */
    public function show(Service $service): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @param int $id
     * @return View
     */
    public function edit(Service $service, int $id) : View
    {
        $service = Service::with(['images', 'packages'])->findOrFail($id);
        if(auth()->user()->id != $service->user_id) redirect(route('frontend.dashboard'));
        $countOffers = 0;
        foreach($service->packages as $package)
            foreach($package->offers as $offer)
                $countOffers = $offer->id;
        return view('frontend.user_panel.services.edit',['categories' => Category::all(), 'service' => $service, 'countOffers' => $countOffers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServiceRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateServiceRequest $request, int $id): JsonResponse
    {
        $service = Service::findOrFail($id);
        $service->title = $request->get('title');
        $service->overview = $request->get('overview');
        $service->description = $request->get('description');
        $service->guarantee = $request->get('guarantee');
        $service->price = $request->get('price');
        $service->category_id = $request->get('category');

        if(!$service->save())
            return response()->json(['error_message' => 'There was a problem. Service is not created.'], 422);

        $images = $request->images;

        // Images number limitation
        if(count($images) > 5)  return response()->json(['errors' => ['images' => 'Please choose at most 5 images.']], 422);


        if(!$this->saveImages($service, $images))
            return response()->json(['error_message' => 'There was a problem when uploading images.'], 422);

        if(!$this->savePackages($service, $request))
            return response()->json(['error_message' => 'There was a problem.'], 422);

        return response()->json(['success_message'=>'Service Saved Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyServiceRequest $request
     * @param int $id
     */
    public function destroy(DestroyServiceRequest $request, int $id)
    {
        $service = Service::findOrFail($id);
        $service->state_id = 4;
        $service->save();
        return redirect()->back()->with(['success_message'=>'Service Deleted Successfully']);
    }

    /**
     * Store Service Image into storage.
     *
     * @param Request $request
     */
    public function uploadImage(Request $request) {

        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:5000'
        ]);

        $image = $request->file('image');
        $imageName = ServiceImage::generateRecordName($image);
        $path = $image->storeAs(get_temp_path(), $imageName);

        if(!$path)
            return response()->json(['error_message' => 'There was a problem when uploading image.'], 422);
        return response()->json(['imageURL' => Storage::url($path), 'imageName' => $imageName]);

    }

    /**
     * Store Service Images
     *
     * @param Service $service
     * @param ServiceImage[] $serviceImages
     */
    private function saveImages(Service $service, Array $serviceImages): bool
    {

        $oldImages = $service->images()->get();

        foreach($oldImages as $oldImage) {
            $found = false;
            foreach ($serviceImages as $image) {
                if($oldImage->name == $image) {
                    $found = true;
                    break;
                }
            }
            if(!$found) {
                    Storage::delete(ServiceImage::path() . $oldImage->name);
                $oldImage->delete();
            }
        }

        foreach($serviceImages as $image) {
            $found = false;
            foreach ($oldImages as $oldImage) {
                if($oldImage->name == $image) {
                    $found = true;
                    break;
                }
            }
            if($found) continue;

            $yesterday = Storage::exists('temp/' . date('Y-m-d', strtotime("-1 days")) . '/' . $image);
            $today = Storage::exists('temp/' . date('Y-m-d') . '/' . $image);

            // Check if images isn't found neither in yesterday's nor today's folder or the saving process is failed.
            if(!$yesterday && !$today || !$service->images()->save(new ServiceImage(['name' => $image])))
                return false;

            // Check if the image is exist in the today's storage to move it.
            if($today)
                Storage::move('temp/' . date('Y-m-d') . '/' . $image, ServiceImage::path() . $image);

            // check if the image is exist in the yesterday's storage to move it.
            if($yesterday)
                Storage::move('temp/' . date('Y-m-d', strtotime("-1 days")) . '/' . $image, ServiceImage::path() . $image);

        }

        return true;

    }

    private function savePackages(Service $service, Request $request) {
        $packages = $service->packages()->get();

        foreach($packages as $package) {

            if(!$request[$package->type . '_switch']) {
                $package->state = 0;
                if(!$package->save()) return false;
                continue;
            }

            // Saving service package
            $package->title = $request[$package->type . '_package_title'];
            $package->price = $request[$package->type . '_package_price'];
            $package->state = !!$request[$package->type . '_switch'];
            $package->description = $request[$package->type . '_package_desc'];
            $package->duration = $request[$package->type . '_package_duration'];
            $package->reviews = $request[$package->type . '_package_reviews'];
            $package->service_id = $service->id;

            if(!$package->save()) return false;

            $offers = $request[$package->type . '_offers'];

            if(!$offers) continue;

            ServicePackageOffer::where('service_package_id', $package->id)->delete();

                foreach($offers as $offer) {
                    if(!array_key_exists('value', $offer)) continue;

                    $servicePackageOffer = new ServicePackageOffer([
                        'name' => $offer['value'],
                        'is_main' => array_key_exists('type', $offer),
                        'service_package_id' => $package->id
                    ]);

                    if(!$servicePackageOffer->save()) return false;

                }

        }

        return true;
    }

}
