<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinishedBooking extends Mailable
{
    use Queueable, SerializesModels;

    private $userEmail;
    private $firstName;
    private $lastName;
    private $birthdate;
    private $startDate;
    private $endDate;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userEmail, $firstName, $lastName, $birthdate, $startDate, $endDate)
    {
        $this->userEmail = $userEmail;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.email')
                    ->with(['userEmail' => $this->userEmail,
                            'firstName' => $this->firstName,
                            'lastName' => $this->lastName,
                            'birthdate' => $this->birthdate,
                            'startDate' => $this->startDate,
                            'endDate' => $this->endDate
                    ]);
    }
}
