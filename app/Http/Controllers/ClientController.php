<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\CreateOrUpdateClientRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.client.index', [
            'clients' => Client::paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.client.createOrEdit');
    }

    public function store(CreateOrUpdateClientRequest $request): RedirectResponse
    {
        $client = Client::create($request->validated());

        session()->flash('message', 'Client created successfully');

        return redirect()->route('admin.clients.edit', ['client' => $client]);
    }

    public function edit(Client $client): Factory|View|Application
    {
        return view('admin.client.createOrEdit', [
            'client' => $client,
        ]);
    }

    public function update(CreateOrUpdateClientRequest $request, Client $client): RedirectResponse
    {
        $active = $request->has('active');

        $client->update(array_merge($request->validated(), ['active' => $active]));

        session()->flash('message', 'Client updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
