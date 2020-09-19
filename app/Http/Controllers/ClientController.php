<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource( User::class );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('read users');

        return view('client.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create users');

        return view('client.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $client
     *
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $client)
    {
        $this->authorize('update users');

        return view('client.edit', [
            'client' => $client,
        ]);
    }
}
