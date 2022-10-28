<?php

namespace App\Service;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Client;

class ClientService
{
    public function store(StoreReservationRequest $request): ?Client
    {
        $client = new Client();
        $client->firstname = $request->input('firstname');
        $client->secondname = $request->input('secondname');
        $client->email = $request->input('email');
        $client->save();

        return $client;
    }
}
