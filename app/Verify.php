<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Result;
use App\Utils;
use Illuminate\Support\Facades\Validator;

class Verify extends Model
{
    //
	public static function check(Request $request){
		$validator = Validator::make($request->all(),
            [
                'api_token' => 'required'
            ],
            [
                'api_token.required' => 'Not Permitted.'
            ]
        );

        if ($validator->fails()) {
            $response = $validator->errors();
            return Result::fail($response);
        }

        if($request->input('api_token')!=Utils::$api_token){
        	$response = ['Rejected.'];
            return Result::fail($response);
        }
	}
}
