<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BudgetController extends Controller
{
    public function index()
    {
        return Inertia::render('Budget/Index');
    }

    public function create()
    {
        return Inertia::render('Budget/Create');
    }
}
