<?php 

namespace App\Classes;

use App\Models\Retailer;
use App\Models\User;

class RetailerClass extends UserClass
{
	private $dealername;
	private $dealernumber;

	public function __construct(){

	}

	public function getUsersData(){
		$currUser = auth()->user();

		if ($currUser['isRetailer']) {
			$users = User::all();

			return $users;
		}

		return ['message' => 'You have no permission for this action'];
	}

	public function displayRetailerInfo(){
		$currUser = auth()->user();

		if ($currUser['isRetailer']) {

			return $currUser;
		}

		return ['message' => 'You have no permission for this action'];
	}
}