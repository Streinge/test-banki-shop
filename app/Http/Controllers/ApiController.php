<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel as ModelsContactModel;

class ApiController extends Controller
{
    public function returnsJsonAll()
    {
        $contact = new ModelsContactModel();

        return view('api', ['data' => json_encode($contact->all())]);
    }

    public function returnsJsonId(string $id = '')
    {
        $contact = new ModelsContactModel();

        return (json_encode($contact->find((int) $id)) === "null")
            ? view('api', ['data' => json_encode(['message' => 'Not Found!'], 404)])
            : view('api', ['data' => json_encode($contact->find((int) $id))]);
    }
}
