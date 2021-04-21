<?php

namespace App\Classes;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinishedBooking;

class BookingClass
{
	private $uuid;
	private $orderedStartTime;
	private $orderedEndTime;
	private $recordedStartTime;
	private $recordedEndTime;
	private $canceled;

	public function __construct(){

	}

	//Setters
	public function setUuid($uuid) {
        $this->uuid = $uuid;
        return $this;
    }

    public function setOrderedStartTime($orderedStartTime) {
        $this->orderedStartTime = $orderedStartTime;
        return $this;
    }

    public function setOrderedEndTime($orderedEndTime) {
        $this->orderedEndTime = $orderedEndTime;
        return $this;
    }

    public function setRecordedStartTime($recordedStartTime) {
        $this->recordedStartTime = $recordedStartTime;
        return $this;
    }

    public function setRecordedEndTime($recordedEndTime) {
        $this->recordedEndTime = $recordedEndTime;
        return $this;
    }

    public function setCanceled($canceled) {
        $this->canceled = $canceled;
        return $this;
    }

    //Function checking if there isn't already booking made by the user in this time period
	public function checkBooking($currUser){
		$allBookings = Booking::where('user', $currUser['id'])->get();
		$canBook = true;

		foreach ($allBookings as $Booking) {
			if ($Booking['canceled'] == null) {
				$dbOrderedStart = date("Y-m-d H:i:s", strtotime($Booking['orderedStartTime']));
				$dbOrderedEnd = date("Y-m-d H:i:s", strtotime($Booking['orderedEndTime']));

				if (($this->orderedStartTime >= $dbOrderedStart) && ($this->orderedStartTime <= $dbOrderedEnd)) {
					$canBook = false;
					break;
				}
				if (($this->orderedEndTime >= $dbOrderedStart) && ($this->orderedEndTime <= $dbOrderedEnd)) {
					$canBook = false;
					break;	
				}
			}
			else{
				continue;
			}
		}

		return $canBook;
	}

	//Function for booking itself
	public function makeBooking(){
		$currUser = auth()->user();

		if (self::checkBooking($currUser)) {
			Booking::create([
				'uuid' => $this->uuid,
				'orderedStartTime' => $this->orderedStartTime,
				'orderedEndTime' => $this->orderedEndTime,
				'recordedStartTime' => $this->recordedStartTime,
				'recordedEndTime' => $this->recordedEndTime,
				'canceled' => $this->canceled,
				'user' => $currUser['id']
			]);

			$startDate = date("d-m-Y", strtotime($this->orderedStartTime));
			$endDate = date("d-m-Y", strtotime($this->orderedEndTime));
			$currUser = auth()->user();

			self::sendMail($startDate, $endDate, $currUser);

    		return ['message' => 'Booking created successfully!'];
		}
		else{
    		return ['message' => 'There is already booking in this date!'];
		}
	}

	//
	//Utility functions
	//

	public function sendMail($startDate, $endDate, $currUser){
		$user = User::where('id', $currUser['id'])->get();
		$userFormated = $user[0];

		$birthdate = date("d-m-Y", strtotime($userFormated['birthdate']));

		Mail::to($userFormated['email'])->send(new FinishedBooking($userFormated['email'],
																$userFormated['firstName'],
																$userFormated['lastName'], 
																$birthdate,
																$startDate,
																$endDate));
	}

}