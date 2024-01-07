<?php

namespace App\Models\User;

use App\Models\Message;
use App\Models\Order\Order;
use App\Models\Service\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'username' ,
        'email', 'password','user_role_id','language',
        'country', 'job_title', 'phone_number', 'avatar', 'bio',
        'address', 'university', 'response_time', 'registration_ip', 'last_ip', 'last_login',
        'status','api_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Constants
    public static $SKILLS_LIMIT = 20;
    public static $LANGUAGES_LIMIT = 7;
    public static $SLIDES_LIMIT = 5;
    public static $AVATAR_PATH = '/';


    // Relations Methods

    public function languages(){
        return $this->hasMany(UserLanguage::class);
    }

    public function skills(){
        return $this->hasMany(UserSkill::class);
    }

    public function slides()
    {
        return $this->hasMany(UserImage::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'provider_id');
    }

    public function requests()
    {
        return $this->hasMany(Order::class, 'clients_id');
    }

    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // ----------------------------------
    // custom methods

    // check if frontend is online
    public function is_online(): bool
    {
        if(cache()->get('frontend-online-'.$this->id)){
            return true;
        }else{
            return false;
        }
    }

    // check if frontend able to add new languages
    public function isAbleToAddLanguage(string $language = null) : array
    {

        $errorMessage = null;

        if($this->languages()->count() > self::$LANGUAGES_LIMIT)
            $errorMessage = 'You can\'t add more than ' . self::$LANGUAGES_LIMIT . ' languages';

        if($this->languages()->where('name', $language)->get()->count())
            $errorMessage = 'You have added this language before';

        return [
            'error' => $errorMessage,
        ];
    }

    // check if frontend able to add new languages
    public function isAbleToAddSkill(string $skill = null) : array {

        $errorMessage = null;

        if($this->languages()->count() > self::$SKILLS_LIMIT)
            $errorMessage = 'You can\'t add more than ' . self::$SKILLS_LIMIT .  ' skills';

        if($this->languages()->where('name', $skill)->get()->count())
            $errorMessage = 'You have added this skill before';

        return [
            'error' => $errorMessage,
        ];

    }

    // check if frontend able to add new languages
    public function isAbleToAddSlide() : array {
        return $this->slides()->count() <= self::$SLIDES_LIMIT;
    }

    // get all frontend contacts
    public function contacts() {

        $response = null;
        $contacts = [];

        try {
            $response = Http::post(env('SOCKET_URL') . '/contacts/' . $this->id . '/' . $this->access_token);
            $contacts = $response->json();
        } catch(\Exception $exception) {
            return [
                'users' => [],
                'contacts' => []
            ];
        }

        $ids = [];
        $indexes = [];

        foreach($contacts as $idx => $contact) {
            $ids[] = $contact['_id'];
            $indexes[$contact['_id']] = $idx;
        }

        $items = User::whereIn('id', $ids)->get();
        $users = [];

        foreach ($items as $item) {
            $users[$indexes[$item->id]] = $item;
        }

        return [
            'users' => $users,
            'contacts' => $contacts
        ];

    }


    // get the full name
    public function fullName(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    // get the url of frontend profile
    public function getProfileUrl(): string
    {
        $name = strtolower(preg_replace('/\s+/', '-',$this->fullName()));
        return route('frontend.show',['id' => $this->id , 'slug' => $name]);
    }

    // get path of frontend photo
    public static function getPhotoPath(): string
    {
        return self::$AVATAR_PATH;
    }

    public function avatar(): string
    {
        return Storage::url(self::getPhotoPath() . $this->avatar);
    }

    public function afterAuth() {
        $token = JWTAuth::encode(JWTFactory::make([
            'user_id' => $this->id,
            'email' => $this->email
        ]))->get();
        $this->access_token = $token;
        $this->last_login = Carbon::now();
        $this->last_ip = request()->ip();
        if(!$this->save()) {
            Auth::logout();
            return redirect()->back();
        }
        session()->put('locale', $this->language);

        $response = Http::post(env('SOCKET_URL') . '/' . 'login', [
            'user_id' => $this->id,
            'token' => $this->access_token,
        ]);

        if($response->failed()) {
            Auth::logout();
            return redirect()->back();
        }

    }

}







/*

$image = $request->image;
$fileName = time().'-'.$image->getClientOriginalName();
$location = public_path('img/posts/'.$fileName);
*/















