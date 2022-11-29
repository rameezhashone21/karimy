<?php 

namespace App\Http\Controllers\Api;

use App\Category;
use App\City;
use App\Country;
use App\CustomField;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemFeature;
use App\ItemHour;
use App\ItemHourException;
use App\ItemSection;
use App\ItemSectionCollection;
use App\Product;
use App\SettingItem;
use App\State;
use App\Mail\Notification;
use App\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ApiController extends Controller
{
    
     public function demoApiFunction(Request $request){
         return response()->json([
            'success'=>true, 
            'message'=>'demo message', 
        ]);
     }
}

?>