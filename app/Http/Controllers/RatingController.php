<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function showRatingPage(User $user)
    {
        return view('Pages.Rating.index', compact('user'));
    }

    public function submitRating(Request $request, User $user)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:500',
        ]);

        Rating::create([
            'user_id' => $user->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

         return view('Pages.ThankYou.index', [
            'message' => 'Thank you for your rating!'
    ]);
    }

    public function getUserRate()
    {
        $user = auth()->user();
        $ratings = Rating::where('user_id', $user->id)->get();

        $averageRating = $ratings->avg('rating');  
        $ratingCount = $ratings->count();  

        return view('dashboard', compact('user', 'ratings', 'averageRating', 'ratingCount'));
    }



    
}
