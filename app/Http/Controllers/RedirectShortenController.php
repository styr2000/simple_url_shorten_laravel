<?php

namespace App\Http\Controllers;

use App\Models\Shorten;
use Illuminate\Http\Request;

class RedirectShortenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $q = Shorten::where('shorten_code', $request->shortenCode);
        if(!$q->exists()){
            abort(404, 'Not Found');
        }
        
        $target = $q->first();
        return redirect($target->original_url);
    }
}
