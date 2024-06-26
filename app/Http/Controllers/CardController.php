<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Card;
use App\Models\CardDetail;

class CardController extends Controller
{
    public function getAll()
    {
        $allCards = Card::all();
        return response()->json(['data' => $allCards], 200);
    }

    public function getCardDetailsByDeckId($deckId)
    {
        // Log::info('method called');

        $cards = Card::where('deck_id', $deckId)->with('details')->get();
        $allCardDetails = [];

        foreach ($cards as $card) {
            $allCardDetails = array_merge($allCardDetails, $card->details->toArray());
        }

        return response()->json(['data' => $allCardDetails], 200);
    }
}
