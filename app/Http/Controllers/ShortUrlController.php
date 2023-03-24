<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
class ShortUrlController extends Controller
{
    //

    public function index()
    {
        $shortUrls = ShortUrl::latest()->take(1)->get();

   
        return view('shortenUrl', ['shortUrls' => $shortUrls]);

    }
     
  
    public function store(Request $request)
    {
        $request->validate([
           'url' => 'required|url'
        ]);
   
        $input['url'] = $request->url;
        $input['code'] = Str::random(6);
   
        ShortUrl::create($input);
  
        return redirect('generate-shorten-url')
             ->with('success', 'Shorten url Generated Successfully!');
    }
   
   
    public function shortenUrl($code)
    {
        $find = ShortUrl::where('code', $code)->first();
   
        if ($find) {
            return redirect($find->url);
        }
    
         
        return redirect('/')->with('error', 'Sorry, the requested page was not found.');
    }
}
