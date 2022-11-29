<?php

namespace App\Http\Controllers\Api;

use App\Faq;
use App\Plan;
use App\State;
use App\Setting;
use App\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralApiController extends Controller
{
  /**
   * Get canada states
   *
   */
  public function getCanadaStates()
  {
    // Get all canada states
    $result = State::select('id', 'state_name', 'state_abbr', 'state_slug', 'state_country_abbr')
      ->where('country_id', 102)
      ->get();

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
   * Get faqs
   *
   */
  public function getFaqs()
  {
    // Get all canada states
    $result = Faq::select('faqs_question', 'faqs_answer')
      ->orderBy('faqs_order', 'ASC')
      ->get();

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
   * Get privacy policy
   *
   */
  public function getPrivacyPolicy()
  {
    // Get all canada states
    $result = Setting::select('setting_page_privacy_policy')
      ->where('setting_page_privacy_policy_enable', 1)
      ->get();

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
   * Get about us
   *
   */
  public function getAboutUs()
  {
    // Get all canada states
    $result = Setting::select('setting_page_about')
      ->where('setting_page_about_enable', 1)
      ->get();

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
   * Get plans
   *
   */
  public function getPlans()
  {
    // Get all plans
    $result = Plan::whereIn('plan_type', [Plan::PLAN_TYPE_FREE, Plan::PLAN_TYPE_PAID])
      ->orderBy('plan_type')
      ->orderBy('plan_period')
      ->get();

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
   * Get Blogs
   *
   */
  public function getBlogs()
  {
    // Get all blogs

        // $posts = \Canvas\Post::published()->orderByDesc('published_at')->paginate(10);
        
         $posts = \Canvas\Post::published()->orderByDesc('published_at')->get();
        
        $all_topics = \Canvas\Topic::orderBy('name')->get();
        $all_tags = \Canvas\Tag::orderBy('name')->get();

        $recent_posts = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get();
        
        
         return response()->json([
                'result'  => $posts,
                'all_tags'=>$all_tags,
                'all_topics'=>$all_topics,
                'recent'=>$recent_posts,
                'message' => 'success',
                'status'  => 1
      ], 200);
      
  }
  
  /**
   * Get Single Blog By Id
   *
   */
  public function getBlogById($id)
  {
    // Get Single Blog By Id

        $posts = \Canvas\Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('id', $id);
        
        
         if (optional($post)->published) {
             
              $data = [
                'author' => $post->user,
                'post'   => $post,
                'meta'   => $post->meta,
            ];

            // IMPORTANT: This event must be called for tracking visitor/view traffic
            event(new \Canvas\Events\PostViewed($post));

            $all_topics = \Canvas\Topic::orderBy('name')->get();
            $all_tags = \Canvas\Tag::orderBy('name')->get();

            $recent_posts = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get();

            // used for comment
            $blog_post = BlogPost::published()->get()->firstWhere('id', $id);
            
              return response()->json([
                'result'  => $post,
                'strip_content'=>strip_tags($post->body),
                'all_tags'=>$all_tags,
                'all_topics'=>$all_topics,
                'recent'=>$recent_posts,
                'message' => 'success',
                'status'  => 1
      ], 200);
         } else {
              return response()->json([
                'result'  => NULL,
                'message' => 'Not Found',
                'status'  => 1
      ], 404);
         }
        
        
      
  }
  
  
  
}
