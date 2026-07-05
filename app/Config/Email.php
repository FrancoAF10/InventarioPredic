<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'erickjhampier2024@gmail.com';  // remitente real
    public string $fromName   = 'Sistema de Asistencia Yonda & Grupo Huaraca';
    public string $recipients = '';

    // Protocolo SMTP
    public string $protocol   = 'smtp';
    public string $SMTPHost   = 'pro.turbo-smtp.com'; // o 'pro.eu.turbo-smtp.com' si prefieres EU
    public string $SMTPUser   = 'erickjhampier2024@gmail.com';
    public string $SMTPPass   = 'duiZrKZG';
    public int    $SMTPPort   = 465; // puedes usar 25, pero 587 es más confiable
    public string $SMTPCrypto = 'ssl'; // usa 'ssl' si decides puerto 465

    public int $SMTPTimeout   = 10;

    public string $mailType   = 'html';
    public string $charset    = 'UTF-8';

    public bool $wordWrap     = true;
    public string $newline    = "\r\n";
    public string $CRLF       = "\r\n";
}
