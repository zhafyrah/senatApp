<?php

namespace App\Http\Controllers;

use App\Traits\TraitApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, TraitApiResponse;

    public function validationException(Validator $validator){
        if ($validator->fails()) {
            $message = '';
            $i       = 0;

            foreach ($validator->errors()->toArray() as $error) {
                $message .= ($i > 0 ? PHP_EOL : '') . $error[0];
                $i++;
            }

            throw new \Exception($message, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
