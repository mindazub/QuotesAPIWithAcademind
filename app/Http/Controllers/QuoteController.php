<?php

namespace App\Http\Controllers;


use App\Quote;
use JWTAuth;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function postQuote(Request $request)
    {

        // if(! $user = \JWTAuth::parseToken()->authenticate())
        // {
        //     return response()->json(['message' => 'User not found'],404);
        // }

        $quote = new Quote();
        $quote->content = $request->input('content');
        $quote->save();

        return response()->json(['quote' => $quote], 201);
    }

    public function getQuotes()
    {
        $quotes = Quote::orderBy('created_at', 'desc')->get();
        $response = [
            'quotes' => $quotes
        ];
        return response()->json($response, 200);
    }

    public function putQuote(Request $request, $id)
    {
        $quote = Quote::find($id);
        if(!$quote)
        {
            return response()->json(['message' => ' Document Not Found'], 404);
        }
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote' => $quote], 200);
    }

    public function deleteQuote($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return response()->json(['message' => 'Quote deleted'], 200);
    }


}
