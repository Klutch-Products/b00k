<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

/**
 *
 */
class SubscriptionController extends Controller
{
    /**
     * @param Request $request
     * @param Publisher $publisher
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request, Publisher $publisher)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::firstOrCreate(['email' => $request->email]);

        if (!$publisher->subscribers()->where('user_id', $user->id)->exists()) {
            $subscriptionCode = $this->generateSubscriptionCode($user, $publisher);

            $publisher->subscribers()->attach($user, ['subscription_code' => $subscriptionCode]);

            // Send email
            Mail::to($user->email)->send(new SubscriptionConfirmation($user, $publisher, $subscriptionCode));

            return response()->json(['message' => 'Subscription successful', 'subscription_code' => $subscriptionCode]);
        }

        return response()->json(['message' => 'Already subscribed']);
    }

    /**
     * @param $user
     * @param $publisher
     * @return string
     */
    private function generateSubscriptionCode($user, $publisher)
    {
        $salt = Str::random(16);
        return Hash::make($user->id . $publisher->id . $salt);
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadPdf(Request $request, Book $book)
    {
        $request->validate([
            'subscription_code' => 'required',
        ]);

        $subscriber = $book->publisher->subscribers()
            ->where('subscription_code', $request->subscription_code)
            ->first();

        if ($subscriber) {
            return response()->download(storage_path('app/' . $book->pdf_path));
        }

        return response()->json(['message' => 'Invalid subscription code'], 403);
    }
}
