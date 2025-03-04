<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function search($search)
    {
        return self::where('title', 'LIKE', '%' . $search . '%')->orwhere('category', 'LIKE', '%' . $search . '%')->get();
    }

    // public static function search($search)
    // {
    //     return self::join('categories', 'posts.category_id', '=', 'categories.id')
    //         ->where('posts.title', 'LIKE', '%' . $search . '%')
    //         ->orWhere('categories.name', 'LIKE', '%' . $search . '%')
    //         ->select('posts.*', 'categories.name as category_name')
    //         ->get();
    // }

    // public static function getOrderSummary()
    // {
    //     return DB::table('orders')
    //         ->join('users', 'orders.user_id', '=', 'users.id')
    //         ->select('users.name', DB::raw('SUM(orders.quantity) as total_quantity'))
    //         ->groupBy('users.name')
    //         ->get();
    // }
}
