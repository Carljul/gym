<?php

namespace App\Http\Controllers;

use App\Models\MembershipType;
use App\Providers\SubscribersProvider;
use App\Http\Requests\SubscriberRequest;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = SubscribersProvider::list(request()->all());
        return view('pages.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subscriptions = MembershipType::all();
        return view('pages.subscribers.create', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriberRequest $request)
    {
        $result = SubscribersProvider::create($request);

        if ($result['success']) {
            return redirect()->route('subscriber.index')->with(['msg' => $result['message']]);
        }

        return redirect()->back()->withErrors(['msg' => $result['message']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriberRequest $request, string $id)
    {
        $result = SubscribersProvider::update($request, $id);

        if ($result['success']) {
            return redirect()->route('subscriber.index');
        }

        return redirect()->back()->with(['msg' => $result['message']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
