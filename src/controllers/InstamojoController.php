<?php

namespace IlyasKazi\Instamojo\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use IlyasKazi\Instamojo\Models\InstamojoPayment;

class InstamojoController extends Controller
{
    public function index()
    {
        echo "InstaMojo Installed!!!";
        exit;
    }
}
