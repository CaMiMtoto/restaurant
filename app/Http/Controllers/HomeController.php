<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function welcome()
    {
        $categories = Category::with('items')
            ->whereHas('items.media', fn (Builder $query) => $query->where('is_special', '=', false))
            ->get();
        $specialItems = Item::query()
            ->with('media')
            ->where('is_special', true)
            ->where('status', 'available')
            ->with('categories')
            ->get();

        return view('welcome', [
            'categories' => $categories,
            'specialItems' => $specialItems,
        ]);
    }
}
