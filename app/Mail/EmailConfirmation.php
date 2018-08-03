<?php

namespace App\Mail;

use App\FURWEB_CTRL_ACCESO;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $NuevoRegistro;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FURWEB_CTRL_ACCESO $NuevoRegistro)
    {
        $this->NuevoRegistro = $NuevoRegistro;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('SEDESEM.UDITI.SBD@gmail.com')
                    ->subject('[Confirmación] Tarjeta de Descuento Fuerza Joven')
                    ->view('usuario.email.enviar');
    }
}
