<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
  public function index(Request $request)
  {
    $sheets = Sheet::all();
    return view('user.sheet.index', compact('sheets'));
  }    
}