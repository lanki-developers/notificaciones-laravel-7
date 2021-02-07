<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\LiquidacionGeneradaMailable;

class EnviarLiquidacionesGeneradas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'liquidaciones:generadas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar las liquidaciones generadas del proceso de grados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $detalles = [        
            'subject' => "TEST Sistema de Grados",
            'estudiante' => [
                'nombre' => "Armando Casas",
                'email_institucional' => "acasas@miuniclaretiana.edu.co",
                'email_personal' => "armandocasas321@hotmail.com",
                'programa' => 'TRABAJO SOCIAL',
                'cat' => 'CAT MEDELLIN',
            ],        
            'liquidacion' => [
                'id' => "345778",
                'referencia' => "4567891",
                'estado' => "PENDIENTE",
            ],        
        ];
    
        $correo = new LiquidacionGeneradaMailable($detalles);
        Mail::to($detalles['estudiante']['email_institucional'])
            ->cc([
                $detalles['estudiante']['email_personal'],
                //Config::get('custom_vars.rcaEmail'),
            ])
            /* ->bcc([
                Config::get('custom_vars.adminEmail'),
                Config::get('custom_vars.testEmail'),
            ]) */
            ->send($correo);
        return "Mensaje enviado !!!*";

    }
}
