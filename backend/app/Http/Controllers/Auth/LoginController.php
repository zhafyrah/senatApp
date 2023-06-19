<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class LoginController extends Controller {

    public function __invoke(Request $request) {
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'email'     => 'required',
                    'password'  => 'required'
                ],
                [
                    'email.required'     => 'Email Kosong',
                    'password.required'  => 'Password Kosong'
                ]
            ));

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                throw new \Exception("Email atau Password Tidak Terdaftar", 404);
            }

            return $this->successResponse(Auth::user());
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
