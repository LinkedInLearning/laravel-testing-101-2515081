<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\CreateOrUpdateClientRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('admin.client.index', [
            'clients' => Client::paginate(15),
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.client.createOrEdit');
    }

    public function store(CreateOrUpdateClientRequest $request): RedirectResponse
    {
        $client = new Client();
        $client->fill($request->validated());

        if ($request->hasFile('photo')) {
            $client->photo = $this->savePhoto($request->file('photo'), $client->name);
        }

        $client->save();

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

        $photo = '';

        if ($request->hasFile('photo')) {
            $photo = $this->updatePhoto($request->file('photo'), $client);
        }

        $client->update(array_merge($request->validated(), [
            'active' => $active,
            'photo' => $photo
        ]));

        session()->flash('message', 'Client updated successfully');

        return back();
    }

    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        session()->flash('message', 'Client deleted successfully');

        return back();
    }

    private function savePhoto(UploadedFile $file, string $clientName = ''): string
    {
        $fileName = $clientName . '_' . rand(0, 1000000) . "." . $file->getClientOriginalExtension();

        Storage::putFileAs('clients', $file, $fileName);

        return $fileName;
    }

    private function updatePhoto(UploadedFile $file, Client $client): string
    {
        $fileName = '';

        if ($client->photo != null) {
            $fileName = $client->photo;

            Storage::delete('clients/' . $fileName);
        }

        return $this->savePhoto($file, $client->name);
    }
}
