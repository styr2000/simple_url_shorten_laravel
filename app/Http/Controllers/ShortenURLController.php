<?php

namespace App\Http\Controllers;

use App\Models\Shorten;
use Illuminate\Http\Request;

class ShortenURLController extends Controller
{
    
    public function shortenUrl(Request $request){
        $validate = $request->validate([
            'url' => 'url'
        ]);

        try {
    
            $shorten = Shorten::create([
                'original_url' => $validate['url'],
                'shorten_code' => $this->generateCode()
            ]);

            session()->flash('success', 'URL has been shortened');
            session()->flash('shortenCode', $shorten->shorten_code);

            return redirect()->route('home');

        } catch (\Exception $e) {
            report($e->getMessage());
        }
    }

    public function generateCode($len = 7){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';

        do {
            $code = '';
            for ($i = 0; $i < $len; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
        } while (Shorten::where('shorten_code', $code)->exists());

        return $code;
    }
    
    public function render(){
        return view('welcome');
    }
}
