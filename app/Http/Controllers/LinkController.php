<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::where('user_id', auth()->id())->get();

        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(StoreLinkRequest $request)
    {

        Link::create($request->validated());

        return redirect()->route('links.index');
    }

    public function visit($link)
    {
        $link = Link::where('short_url', $link)->firstOrFail();
        $link->increment('visit_counter');

        return redirect($link->original_url);
    }
}
