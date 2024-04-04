<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 获取query参数；
        $tag = request() -> tag;
        $search = request() -> search;

        $listing = Listing::query()
            ->where('tags', 'LIKE', '%' . $tag . '%')
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('listing.index', [
            'posts' => $listing
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('listing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title' => ['required', 'string'],
            // listings表的company字段是unique的
            'company' => ['required', 'string', Rule::unique('listings', 'company')],
            'location' => ['required'],
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'website' => ['required'],
            'tags' => ['required'],
            'description' => ['required']
        ]);

        // 如果用户上传了logo
        // 则会将logo放进storage/app/public/logos文件夹（如果没有此文件夹，则会创建），并且设置为public资源；
        // 并且listings表中的logo字段的值则是指向此存储的logo之后的路径；
        if($request->hasFile('logo')){
            $data['logo'] = $request -> file('logo') -> store('logos', 'public');
        }

        $createdPost = Listing::create($data);

//        return to_route('listing.show', $createdPost)->with('message', 'Post created');
        return redirect('/listing')->with('message', 'Post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listing.show', [
            'post' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('listing.edit', [
            'post' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $data = $request -> validate([
            'title' => ['required', 'string'],
            // listings表的company字段是unique的
            'company' => ['required', 'string', Rule::unique('listings', 'company')],
            'location' => ['required'],
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'website' => ['required'],
            'tags' => ['required'],
            'description' => ['required']
        ]);

        // 如果用户上传了logo
        // 则会将logo放进storage/app/public/logos文件夹（如果没有此文件夹，则会创建），并且设置为public资源；
        // 并且listings表中的logo字段的值则是指向此存储的logo之后的路径；
        if($request->hasFile('logo')){
            $data['logo'] = $request -> file('logo') -> store('logos', 'public');
        }

        $listing -> update($data);

        return to_route('listing.show', $listing) -> with('message', 'Post updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
