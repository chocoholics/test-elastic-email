<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Test;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
  public function test(Request $request)
  {
    Mail::to($request->input('email'))
        ->send(new Test());

    if (Mail::failures()) {
      $message = 'Error: Mail failed to send email.';
    } else {
      $message = 'Success: Email Successfully sent.';
    }
    return view('welcome')->withMessage($message);
  }
}
