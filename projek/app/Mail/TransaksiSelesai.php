<?php

namespace App\Mail;

use App\Models\dtranssewa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransaksiSelesai extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    //  protected $id;
    //  public $to1;
    public function __construct($id,$to1)
    {
        $this->id = $id;
        $this->to1 = $to1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dtrans = dtranssewa::where('id',$this->id)->first();
        if ($this->to1 == "0"){
            return $this->from("gradyhermawan@gmail.com")->markdown('emails.user_selesai',['dtrans'=>$dtrans]);
        }
        else{
            return $this->from("gradyhermawan@gmail.com")->markdown('emails.pegawai_selesai',['dtrans'=>$dtrans]);
        }
    }
}
