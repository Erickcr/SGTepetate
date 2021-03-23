<?php

namespace App\Mail;

use App\Pedido;
use App\ProductosPedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pedido=Pedido::orderBy('idPedido','desc')->first();
        $productos= ProductosPedido::where('idPedido',$pedido->idPedido)->get();
        return $this->subject('Nuevo pedido desde página web')->view('emails.pedidomail',['productos'=>$productos,'pedido'=>$pedido]);
    }
}
