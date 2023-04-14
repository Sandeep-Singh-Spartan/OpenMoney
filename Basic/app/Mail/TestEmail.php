<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function  build(){
        //dd($this->data,"asdfghjkl");
        $subject = $this->data['subject'];
        if($subject=="Your Registration is Successful"){
            return $this->subject($subject)->view('emails.post',
                ['username' => $this->data['name'],'email' => $this->data['email'],'mobile_number' => $this->data['mobile_number'],
                    'login_url'=> 'http://127.0.0.1:8000/login'

                ]);
        }else{
            return $this->subject($subject)->view('emails.virtualAccountCreation',
                ['VANumber' => $this->data['VANumber'],'login_url' => 'http://127.0.0.1:8000/api/open-testing/getVirtualAccountBalance','mobile_number' => $this->data['mobile_number']

                ]);
        }

    }


}
