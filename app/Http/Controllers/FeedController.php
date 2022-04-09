<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index(){
        try {
            $feeds = Feed::with('department')->whereIn('dept_id',[Auth::user()->dept_id , 1])->orderBy('created_at')->paginate(4);

            $recents = Feed::with('department')->whereIn('dept_id',[Auth::user()->dept_id , 1])->take(3)->get();

            if ($feeds) {
                return view('pages.user.feeds', ['feeds' => $feeds , 'recents' => $recents]);
            } else {
                return redirect()->back()->with('failed', 'Feed post not found.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function showFeed($slug){
        try {
            $feed = Feed::with('department')->where('slug', $slug)->first();

            $recents = Feed::with('department')->whereIn('dept_id',[Auth::user()->dept_id , 1])->take(6)->get()->except($feed->id);

            if ($feed) {
                return view('pages.user.previewPost', ['feed' => $feed , 'recents' => $recents]);
            } else {
                return redirect()->back()->with('failed', 'Feed post not found.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
