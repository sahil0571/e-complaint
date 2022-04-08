<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedRequest;
use App\Models\Department;
use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeedController extends Controller
{
    public function index()
    {
        try {
            $feeds = Feed::with('department')->get();

            return view('pages.admin.feeds.listFeeds', ['feeds' => $feeds]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        try {

            $depts = Department::where('status', 1)->get();

            return view('pages.admin.feeds.makePost', ['depts' => $depts]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function add(FeedRequest $request)
    {
        try {

            $feed = new Feed();
            $feed->title = $request->title;
            $feed->sub_title = $request->sub_title;
            $feed->slug = $request->slug;
            $feed->desc = $request->desc;

            $image = $request->file('photo');
            $uploadFile = $image->storeAs('public/feeds/', $request->slug . '.' . $image->getClientOriginalExtension());
            if ($uploadFile) {
                $feed->photo = $request->slug . '.' . $image->getClientOriginalExtension();
            }

            $feed->status = $request->status;
            $feed->dept_id = $request->dept_id;
            $feed->save();

            return back()->with('success', 'Feed Created Successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {

            $feed = Feed::find($id);
            $depts = Department::where('status', 1)->get();

            if ($feed) {
                return view('pages.admin.feeds.editPost', ['feed' => $feed, 'depts' => $depts]);
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(FeedRequest $request)
    {
        try {
            $feed = Feed::find($request->id);
            if ($feed) {

                $feed->title = $request->title;
                $feed->sub_title = $request->sub_title;
                $feed->slug = $request->slug;
                $feed->desc = $request->desc;

                if(File::exists('storage/feeds/', $feed->photo)) {
                    File::delete('storage/feeds/', $feed->photo);
                }
                if($request->file('photo')){

                    $image = $request->file('photo');
                    $uploadFile = $image->storeAs('public/feeds/', $request->slug . '.' . $image->getClientOriginalExtension());
                    if ($uploadFile) {
                        $feed->photo = $request->slug . '.' . $image->getClientOriginalExtension();
                    }
                }

                $feed->status = $request->status;
                $feed->dept_id = $request->dept_id;
                $feed->save();

                return back()->with('success', 'Feed Updated Successfully.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function preview($slug)
    {
        try {

            $feed = Feed::with('department')->where('slug', $slug)->first();

            $recents = Feed::with('department')->take(6)->get()->except($feed->id);


            if ($feed) {
                return view('pages.admin.feeds.previewPost', ['feed' => $feed , 'recents' => $recents]);
            } else {
                return redirect()->back()->with('failed', 'Feed post not found.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
