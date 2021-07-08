<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Http\Resources\BankResource;

class BankController extends Controller
{
    public function index()
    {

        $banks = Bank::all();
        return response([ 'banks' => BankResource::collection($banks), 'message' => 'Retrieved successfully'], 200);
    }
}
