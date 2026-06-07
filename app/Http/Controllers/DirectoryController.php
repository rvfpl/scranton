<?php

namespace App\Http\Controllers;

use App\Models\Business; // <--- ADD THIS LINE
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function index(Request $request)
    {
        // Now it will know what Business is
        $businesses = Business::filter($request->only('city', 'type'))->paginate(20);
        
        return view('notnydir', compact('businesses'));
    }
}