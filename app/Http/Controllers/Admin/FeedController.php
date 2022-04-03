<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedRequest;
use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        try {
            $feeds = Feed::get();

            if ($feeds) {
                return $feeds;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create(FeedRequest $request)
    {
        try {
            
            // $feed = new Feed();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function add(FeedRequest $request)
    {
        try {
            $department = new Feed();
            $department->title = $request->title;
            $department->desc = $request->desc;
            $department->photo = $request->photo;
            $department->dept_id = $request->dept_id;
            $department->save();
            return back()->with('success', 'Feed Created Successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(FeedRequest $request)
    {
        try {
            $department = Feed::find($request->id);
            if ($department) {
                $department->title = $request->title;
                $department->desc = $request->desc;
                $department->photo = $request->photo;
                $department->dept_id = $request->dept_id;
                $department->save();

                return back()->with('success', 'Feed Updated Successfully.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
