<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
  public function index(Request $request)
    {
        $query = Expense::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        $expenses = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('home', compact('expenses'));
    }
}
