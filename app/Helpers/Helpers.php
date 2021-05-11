<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Psr\Container\ContainerInterface;

class Helpers
{
    public static function addDays($days)
    {
        return new \DateTime(" +{$days} days");
    }

    public static function buscarToken($headers){
       $authorization = isset($headers['Authorization']) ? $headers['Authorization'] : $headers['authorization'];
       return self::decodeToken(str_replace('Bearer ', '', $authorization)[0]);
    }

    public static function formatarData(string $data){
       $data = new \DateTime($data);
       return $data->format('d/m/Y H:i:s');
    }

    public static function formatarAnoMesDia(string $data){
        $data = new \DateTime($data);
        return $data->format('d/m/Y');
    }

    public static function decodeToken($token)
    {
        return JWT::decode(
            $token,
            JWT_SECRET,
            ['HS256']
        );
    }

    public static function buscarService(string $uf, string $classe, ContainerInterface $container)
    {
        try {
            $classeEstado = $classe . strtoupper($uf) . 'ServiceImpl';
            $uf = strtoupper($uf);

            return $container->get("App\Application\Services\\" . $uf . "\\" . $classeEstado);

        } catch (\Exception $exception) {
            $classe = $classe . 'Padrao' . 'ServiceImpl';
            return $container->get("App\Application\Services\Padrao\\" . $classe);
        }
    }

    public static function validarData($data): bool
    {
        return !empty($data) && ($data != '0000-00-00') && ($data !== '0000-00-00 00:00:00');
    }

    public static function apenasNumeros($str)
    {
        return preg_replace('/[^0-9]/', '', $str);
    }

    public static function retornarDateComFusoHorario($uf): \DateTime
    {
        $fusoHorario = Helpers::retornarFusoHorario()[strtoupper($uf)];
        return new \DateTime('', new \DateTimeZone($fusoHorario));
    }

    public static function errorValidationMsg($errors)
    {
        $msgs = [];
        foreach ($errors as $error) {
            array_push($msgs, $error['property']);
        }
        return json_encode(['erros' => $msgs]);
    }

    public static function retornarFusoHorario()
    {
        return array(
            'AC' => 'America/Rio_branco',
            'AL' => 'America/Maceio',
            'AP' => 'America/Belem',
            'AM' => 'America/Manaus',
            'BA' => 'America/Bahia',
            'CE' => 'America/Fortaleza',
            'DF' => 'America/Sao_Paulo',
            'ES' => 'America/Sao_Paulo',
            'GO' => 'America/Sao_Paulo',
            'MA' => 'America/Fortaleza',
            'MT' => 'America/Cuiaba',
            'MS' => 'America/Campo_Grande',
            'MG' => 'America/Sao_Paulo',
            'PR' => 'America/Sao_Paulo',
            'PB' => 'America/Fortaleza',
            'PA' => 'America/Belem',
            'PE' => 'America/Recife',
            'PI' => 'America/Fortaleza',
            'RJ' => 'America/Sao_Paulo',
            'RN' => 'America/Fortaleza',
            'RS' => 'America/Sao_Paulo',
            'RO' => 'America/Porto_Velho',
            'RR' => 'America/Boa_Vista',
            'SC' => 'America/Sao_Paulo',
            'SE' => 'America/Maceio',
            'SP' => 'America/Sao_Paulo',
            'TO' => 'America/Araguaia',
        );
    }
}
