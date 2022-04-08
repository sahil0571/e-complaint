<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index($slug){
        try {
            $feed = Feed::with('department')->where('slug', $slug)->first();

            $recents = Feed::with('department')->where('dept_id',Auth::user()->dept_id)->take(6)->get()->except($feed->id);


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
