<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\UserClass;
use App\Classes\BookingClass;
use App\Classes\RetailerClass;

class MainController extends Controller
{


    public function userLogin(Request $req) {
    	$fields = $req->validate([
    		'email' => 'required|string',
    		'password' => 'required|required',
    	]);

    	$email = $fields['email'];
    	$password = $fields['password'];

    	$user1 = new UserClass();
    	$user1->setEmail($email);
    	$user1->setPassword($password);

    	$user1->login();

        return $user1->login();
    }

    public function booking(Request $req){
        $fields = $req->validate([
            'uuid' => 'required|string|unique:bookings,uuid',
            'orderedStartTime' => 'required|string',
            'orderedEndTime' => 'required|string',
            'recordedStartTime' => '',
            'recordedEndTime' => '',
            'canceled' => ''
        ]);

        //Validating if booking end date is before the start date
        if ($fields['orderedStartTime'] > $fields['orderedEndTime']) {
            return ['message' => 'It is called START DATE for a reason!!!'];
        }

        $booking = new BookingClass();

        //A lot of validation for the datetime fields i know, but boy ... am i bad at using datetime
        if ($fields['recordedStartTime'] == null) {
            $booking->setRecordedStartTime(null);
            $booking->setRecordedEndTime(null);
        }
        else {
            $booking->setRecordedStartTime(date("Y-m-d H:i:s", strtotime($fields['recordedStartTime'])));
            $booking->setRecordedEndTime(date("Y-m-d H:i:s", strtotime($fields['recordedEndTime'])));
        }

        if ($fields['canceled'] == null) {
            $booking->setCanceled(null);
        }
        else {
            $booking->setCanceled(date("Y-m-d H:i:s", strtotime($fields['canceled'])));
        }
        $booking->setUuid($fields['uuid']);
        $booking->setOrderedStartTime(date("Y-m-d H:i:s", strtotime($fields['orderedStartTime'])));
        $booking->setOrderedEndTime(date("Y-m-d H:i:s", strtotime($fields['orderedEndTime'])));

        return $booking->makeBooking();
    }

    public function logout() {
    	auth()->user()->tokens()->delete();

    	return ['message' => 'Logged Out'];
    }

    public function getData(){
        $retailer = new RetailerClass();
        return $retailer->getUsersData();
    }

    public function getRetailer(){
        $retailer = new RetailerClass();
        return $retailer->displayRetailerInfo();
    }
}
