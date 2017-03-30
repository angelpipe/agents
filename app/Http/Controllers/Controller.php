<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;
use App\ZipMatcher;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index ()
    {
        return view('index');
    }

    public function match (Request $request, ZipMatcher $matcher)
    {
        $this->validate($request, [
            'zip-one' => 'required|digits:5',
            'zip-two' => 'required|digits:5',
        ]);

        $result = $matcher->match();

        return view('match')->with(compact('result'));
    }
}
