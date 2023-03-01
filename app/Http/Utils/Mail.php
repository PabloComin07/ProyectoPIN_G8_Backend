<?php

namespace App\Http\Utils;


use App\Mail\EnviarCorreoMailable;
use Illuminate\Support\Facades\Mail;

class EnvioEmail 
{

    /**
     * Enviar de correo.
     */
    public function enviarEmail(string $emailDestinatario)
    {
        $correo = new EnviarCorreoMailable();
        Mail::to($emailDestinatario)->send($correo);
    }
}

