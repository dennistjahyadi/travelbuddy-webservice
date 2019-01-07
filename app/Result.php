<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    
    public static function ok($data = []){
    	return response()->json([
    			'success' => 1,
    			'data' => $data], 201);
    }

    public static function fail($errors = []){
    	return response()->json([
    			'success' => 0,
    			'errors' => $errors], 401);
    }
}
