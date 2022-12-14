<?php

namespace App\Service;

use App\Http\Requests\ReservationRequest;
use App\Models\Client;

class ClientService
{
    public function store(ReservationRequest $request): ?Client
    {
        $client = new Client();
        $client->firstname = $request->input('firstname');
        $client->secondname = $request->input('secondname');
        $client->email = $request->input('email');
        $client->save();

        return $client;
    }
}
