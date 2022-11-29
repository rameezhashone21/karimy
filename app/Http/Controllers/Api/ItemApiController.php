<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Category;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{
  /**
   * Get featured items
   *
   */
  public function getFeaturedItems()
  {
    $site_prefer_country_id = app('site_prefer_country_id');
    $subscription_obj = new Subscription();
    $paid_items_query = Item::query();

    // get paid users id array
    $paid_user_ids = $subscription_obj->getPaidUserIds();

    $paid_items_query->where("items.item_status", Item::ITEM_PUBLISHED)
      ->where(function ($query) use ($site_prefer_country_id) {
        $query->where('items.country_id', $site_prefer_country_id)
          ->orWhereNull('items.country_id');
      })
      ->where('items.item_featured', Item::ITEM_FEATURED)
      ->where(function ($query) use ($paid_user_ids) {

        $query->whereIn('items.user_id', $paid_user_ids)
          ->orWhere('items.item_featured_by_admin', Item::ITEM_FEATURED_BY_ADMIN);
      });

    $paid_items_query->orderBy('items.created_at', 'DESC')->distinct('items.id');

    $paid_items = $paid_items_query->with('state')
      ->with('city')
      ->with('user')
      ->take(6)
      ->get();

    // Add base url to images url
    $paid_items->transform(function ($q) {
      $q->item_image = env('APP_URL') . '/storage/item/' . $q->item_image;
      $q->item_image_medium = env('APP_URL') . '/storage/item/' . $q->item_image_medium;
      $q->item_image_small = env('APP_URL') . '/storage/item/' . $q->item_image_small;
      $q->item_image_tiny = env('APP_URL') . '/storage/item/' . $q->item_image_tiny;

      return $q;
    });

    $result = $paid_items->shuffle();

    if ($result) {
      return response()->json([
        'result'  => $result,
        'count'   => count($result),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Get featured items
   *
   */
  public function getRecentItems()
  {
    $site_prefer_country_id = app('site_prefer_country_id');

    /**
     * get first 6 latest items
     */
    $latest_items = Item::latest('created_at')
      ->where(function ($query) use ($site_prefer_country_id) {
        $query->where('items.country_id', $site_prefer_country_id)
          ->orWhereNull('items.country_id');
      })
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->with('state')
      ->with('city')
      ->with('user')
      ->take(6)
      ->get();

    // Add base url to images url
    $latest_items->transform(function ($q) {
      $q->item_image = env('APP_URL') . '/storage/item/' . $q->item_image;
      $q->item_image_medium = env('APP_URL') . '/storage/item/' . $q->item_image_medium;
      $q->item_image_small = env('APP_URL') . '/storage/item/' . $q->item_image_small;
      $q->item_image_tiny = env('APP_URL') . '/storage/item/' . $q->item_image_tiny;

      return $q;
    });

    if ($latest_items) {
      return response()->json([
        'result'  => $latest_items,
        'count'   => count($latest_items),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Get featured items
   *
   */
  public function getNearbyItems(Request $request)
  {
    // Validate data
    $validator = Validator::make($request->all(), [
      'latitude'  => 'required',
      'longitude' => 'required',
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $site_prefer_country_id = app('site_prefer_country_id');

    // Get nearby items
    $nearbyItems = Item::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( item_lat ) ) * cos( radians( item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( item_lat ) ) ) ) AS distance', [$request->latitude, $request->longitude, $request->latitude])
      ->where('country_id', $site_prefer_country_id)
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->orderBy('distance')
      ->orderBy('created_at', 'DESC')
      ->with('state')
      ->with('city')
      ->with('user')
      ->take(9)->get();

    $nearbyItems = $nearbyItems->shuffle();

    // Add base url to images url
    $nearbyItems->transform(function ($q) {
      $q->item_image = env('APP_URL') . '/storage/item/' . $q->item_image;
      $q->item_image_medium = env('APP_URL') . '/storage/item/' . $q->item_image_medium;
      $q->item_image_small = env('APP_URL') . '/storage/item/' . $q->item_image_small;
      $q->item_image_tiny = env('APP_URL') . '/storage/item/' . $q->item_image_tiny;

      return $q;
    });

    if ($nearbyItems) {
      return response()->json([
        'result'  => $nearbyItems,
        'count'   => count($nearbyItems),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Get items by state
   *
   */
  public function getItemsByState(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'state_id'  => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $site_prefer_country_id = app('site_prefer_country_id');

    // Get items by state
    $latest_items = Item::latest('created_at')
      ->where(function ($query) use ($site_prefer_country_id) {
        $query->where('items.country_id', $site_prefer_country_id)
          ->orWhereNull('items.country_id');
      })
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->where('state_id', $request->state_id)
      ->with('state')
      ->with('city')
      ->with('user')
      ->get();

    // Add base url to images url
    $latest_items->transform(function ($q) {
      $q->item_image = env('APP_URL') . '/storage/item/' . $q->item_image;
      $q->item_image_medium = env('APP_URL') . '/storage/item/' . $q->item_image_medium;
      $q->item_image_small = env('APP_URL') . '/storage/item/' . $q->item_image_small;
      $q->item_image_tiny = env('APP_URL') . '/storage/item/' . $q->item_image_tiny;

      return $q;
    });

    if ($latest_items) {
      return response()->json([
        'result'  => $latest_items,
        'count'   => count($latest_items),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }
  /**
   * Get items by category
   *
   */
  public function getItemsByCategory(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'category_id'  => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $site_prefer_country_id = app('site_prefer_country_id');

    $category = Category::where('id', $request->category_id)->first();

    $category_obj = new Category();
    $all_child_categories = collect();
    $all_child_categories_ids = array();
    $category->allChildren($category, $all_child_categories);
    foreach ($all_child_categories as $key => $all_child_category) {
      $all_child_categories_ids[] = $all_child_category->id;
    }

    $item_ids = $category_obj->getItemIdsByCategoryIds($all_child_categories_ids);

    // Paid user listings
    $subscription_obj = new Subscription();
    $paid_user_ids = $subscription_obj->getPaidUserIds();
    $paid_items_query = Item::query();

    $paid_items_query->whereIn('id', $item_ids);

    $paid_items_query->where("items.item_status", Item::ITEM_PUBLISHED)
      ->where(function ($query) use ($site_prefer_country_id) {
        $query->where('items.country_id', $site_prefer_country_id)
          ->orWhereNull('items.country_id');
      })
      ->where('items.item_featured', Item::ITEM_FEATURED)
      ->where(function ($query) use ($paid_user_ids) {

        $query->whereIn('items.user_id', $paid_user_ids)
          ->orWhere('items.item_featured_by_admin', Item::ITEM_FEATURED_BY_ADMIN);
      });

    $paid_items_query->orderBy('items.created_at', 'DESC')
      ->distinct('items.id')
      ->with('state')
      ->with('city')
      ->with('user');

    $paidItems =  $paid_items_query->get();

    // Add base url to images url
    $paidItems->transform(function ($q) {
      $q->item_image = env('APP_URL') . '/storage/item/' . $q->item_image;
      $q->item_image_medium = env('APP_URL') . '/storage/item/' . $q->item_image_medium;
      $q->item_image_small = env('APP_URL') . '/storage/item/' . $q->item_image_small;
      $q->item_image_tiny = env('APP_URL') . '/storage/item/' . $q->item_image_tiny;

      return $q;
    });

    $resultPaidItems = $paidItems->shuffle();
    // END / Paid user listings

    // Free user listings
    $free_items_query = Item::query();
    $free_user_ids = $subscription_obj->getActiveUserIds();
    $free_items_query->whereIn('id', $item_ids);
    $free_items_query->where("items.item_status", Item::ITEM_PUBLISHED)
      ->where(function ($query) use ($site_prefer_country_id) {
        $query->where('items.country_id', $site_prefer_country_id)
          ->orWhereNull('items.country_id');
      })
      ->where('items.item_featured', Item::ITEM_NOT_FEATURED)
      ->where('items.item_featured_by_admin', Item::ITEM_NOT_FEATURED_BY_ADMIN)
      ->whereIn('items.user_id', $free_user_ids);

    /**
     * Start filter sort by for free listing
     */
    $filter_sort_by = empty($request->filter_sort_by) ? Item::ITEMS_SORT_BY_NEWEST_CREATED : $request->filter_sort_by;
    if ($filter_sort_by == Item::ITEMS_SORT_BY_NEWEST_CREATED) {
      $free_items_query->orderBy('items.created_at', 'DESC');
    } elseif ($filter_sort_by == Item::ITEMS_SORT_BY_OLDEST_CREATED) {
      $free_items_query->orderBy('items.created_at', 'ASC');
    } elseif ($filter_sort_by == Item::ITEMS_SORT_BY_HIGHEST_RATING) {
      $free_items_query->orderBy('items.item_average_rating', 'DESC');
    } elseif ($filter_sort_by == Item::ITEMS_SORT_BY_LOWEST_RATING) {
      $free_items_query->orderBy('items.item_average_rating', 'ASC');
    } elseif ($filter_sort_by == Item::ITEMS_SORT_BY_NEARBY_FIRST) {
      $free_items_query->selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( item_lat ) ) * cos( radians( item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( item_lat ) ) ) ) AS distance', [$this->getLatitude(), $this->getLongitude(), $this->getLatitude()])
        ->where('items.item_type', Item::ITEM_TYPE_REGULAR)
        ->orderBy('distance', 'ASC');
    }
    /**
     * End filter sort by for free listing
     */

    $free_items_query->distinct('items.id')
      ->with('state')
      ->with('city')
      ->with('user');

    $freeItems =  $free_items_query->get();

    // Add base url to images url
    $freeItems->transform(function ($q) {
      $q->item_image = env('APP_URL') . '/storage/item/' . $q->item_image;
      $q->item_image_medium = env('APP_URL') . '/storage/item/' . $q->item_image_medium;
      $q->item_image_small = env('APP_URL') . '/storage/item/' . $q->item_image_small;
      $q->item_image_tiny = env('APP_URL') . '/storage/item/' . $q->item_image_tiny;

      return $q;
    });

    $resultFreeItems = $freeItems->shuffle();
    // END / Free user listings

    if ($resultPaidItems) {
      return response()->json([
        'paid_items'       => $resultPaidItems,
        'count_paid_items' => count($resultPaidItems),
        'free_items'        => $resultFreeItems,
        'count_free_items' => count($resultFreeItems),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Get item categories
   *
   */
  public function getItemCategories()
  {
    $site_prefer_country_id = app('site_prefer_country_id');
    $subscription_obj = new Subscription();

    $active_user_ids = $subscription_obj->getActiveUserIds();
    $categories = Category::withCount(['allItems' => function ($query) use ($active_user_ids, $site_prefer_country_id) {
      $query->whereIn('items.user_id', $active_user_ids)
        ->where('items.item_status', Item::ITEM_PUBLISHED)
        ->where(function ($query) use ($site_prefer_country_id) {
          $query->where('items.country_id', $site_prefer_country_id)
            ->orWhereNull('items.country_id');
        });
    }])
      ->where('category_parent_id', null)
      ->orderBy('all_items_count', 'desc')
      ->get();

    // Add base url to images url
    $categories->transform(function ($q) {
      if ($q->category_image === "0" || $q->category_image == null) {
        $q->category_image = null;
      } else {
        $q->category_image = env('APP_URL') . '/storage/category/' . $q->category_image;
      }

      if ($q->category_header_background_image == 0 || $q->category_header_background_image == null) {
        $q->category_header_background_image = null;
      } else {
        $q->category_header_background_image = env('APP_URL') . '/storage/category/' . $q->category_header_background_image;
      }
    
        
      return $q;
    });

    if ($categories) {
      return response()->json([
        'result'  => $categories,
        'count'   => count($categories),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Get item subcategories
   *
   */

  public function getItemSubcategories(Request $request)
  {
    // Validate data
    $validator = Validator::make($request->all(), [
      'category_slug' => 'required',
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $category = Category::where('category_slug', $request->category_slug)->first();
    // get one level down sub-categories
    $subcategories = $category->children()->orderBy('category_name')->get();

    // Add base url to images url
    $subcategories->transform(function ($q) {
      if ($q->category_image === "0" || $q->category_image == null) {
        $q->category_image = null;
      } else {
        $q->category_image = env('APP_URL') . '/storage/category/' . $q->category_image;
      }

      if ($q->category_header_background_image == 0 || $q->category_header_background_image == null) {
        $q->category_header_background_image = null;
      } else {
        $q->category_header_background_image = env('APP_URL') . '/storage/category/' . $q->category_header_background_image;
      }

      return $q;
    });

    if ($subcategories) {
      return response()->json([
        'result'  => $subcategories,
        'count'   => count($subcategories),
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Check item status
   *
   */
  public function checkItemStatus(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'item_id'  => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $item = Item::where('id', $request->item_id)->first();

    if ($item->hasOpened()) {
      $result = "Now open";
    } else {
      $result = "Closed";
    }

    if ($result) {
      return response()->json([
        'result'  => $result,
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Get item
   *
   */
  public function getItem(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'item_id'  => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $result = Item::where('id', $request->item_id)->first();

    // Add base url to images url
    $result->item_image = env('APP_URL') . '/storage/item/' . $result->item_image;
    $result->item_image_medium = env('APP_URL') . '/storage/item/' . $result->item_image_medium;
    $result->item_image_small = env('APP_URL') . '/storage/item/' . $result->item_image_small;
    $result->item_image_tiny = env('APP_URL') . '/storage/item/' . $result->item_image_tiny;


    if ($result) {
      return response()->json([
        'result'  => $result,
        'message' => 'success',
        'status'  => 1
      ], 200);
    } else {
      return response()->json([
        'message' => 'Something went wrong during order.',
        'status'  => 0
      ], 400);
    }
  }

  /**
   * Send validation errors
   *
   */
  public function sendError($message)
  {
    $message = $message->all();
    $response['error'] = "validation_error";
    $response['message'] = implode('', $message);
    $response['status'] = "0";
    return response()->json($response, 422);
  }
}
