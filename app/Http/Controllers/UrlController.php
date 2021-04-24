<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        return view('main');
    }

    public function statistics()
    {
        return view('statistics', [
            'urls' => Auth::user()->urls->reverse()
        ]);
    }

    public function redirect($token)
    {
        $url = Url::where('token', $token)->first();

        if (!$url) return redirect()->route('home');

        $url->increment('hits');
        return redirect()->away($url->base_url);
    }

    public function token()
    {
        $token = Str::random(7);
        $url = Url::where('token', $token)->first();

        if ($url) return $this->token();

        return $token;
    }

    public function store(Request $request)
    {
        $request->validate([
            'base_url' => ['required']
        ]);

        $base_url = parse_url($request->base_url);
        if (!isset($base_url['host'])) return redirect()->back()->withErrors(['error' => 'The URL must be valid !']);

        $url = Url::create([
            'user_id' => Auth::id(),
            'base_url' => $request->base_url,
            'token' => $this->token()
        ]);

        return redirect()->route('statistics')->with('token', $url->token);
    }
}
