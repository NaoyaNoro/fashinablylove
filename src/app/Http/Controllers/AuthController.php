<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $contents= Contact::with('category')->paginate(7);
        return view('auth.admin', compact('contents','categories'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name_email')) {
            $query->where('email', 'LIKE', "%{$request->name_email}%")
            ->orWhere(DB::raw("CONCAT(first_name, last_name)"), 'LIKE', "%{$request->name_email}%");
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $search_results = $query->paginate(7);

        return redirect('/admin')->with('search_results', $search_results);
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}
