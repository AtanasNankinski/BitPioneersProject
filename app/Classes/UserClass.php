<?php

namespace App\Classes;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserClass
{
	private $email;
	private $password;
	private $firstName;
	private $lastName;
	private $birthdate;

	public function __construct(){

	}

	public function login(){
		$user = User::where('email', $this->email)->first();

    	if (!$user || $this->password !== $user['password']) {
    		return response(['message' => 'Wrong password']);
    	}

    	$token = $user->createToken('myapptoken')->plainTextToken;
    	$response = [
    		'token' => $token
    	];

    	return response($response);
	}

	public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password) {
    	$this->password = $password;
        return $this;
    }
}