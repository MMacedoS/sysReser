<?php

use Carbon\Carbon;

function ukDate($datetime = null, $timestamp = false)
{
    $datetime = $datetime ? $datetime : Carbon::now();
    $format = $timestamp ? 'd/m/Y H:i' : 'd/m/Y';
    $timestamp = $timestamp ? 'Y-m-d H:i:s' : 'Y-m-d';
    return Carbon::createFromFormat($format, $datetime)->format($timestamp);
}


function brDate($datetime = null, $timestamp = false)
{
    $datetime = $datetime ? $datetime : Carbon::now();
    $timestamp = $timestamp ? 'd/m/Y H:i' : 'd/m/Y';
    return Carbon::parse($datetime)->format($timestamp);
}

function moeda($get_valor)
{
    if (!$get_valor) return 0;

    $source = array('.', ',');
    $replace = array('', '.');
    $valor = str_replace($source, $replace, $get_valor);
    return $valor;
}

function money($get_valor)
{
    $valor = number_format($get_valor, 2, ',', '.');
    return $valor;
}

function area($get_valor)
{
    $valor = str_replace(',', '.', $get_valor);

    return $valor;
}

function clean($string)
{
    return preg_replace('/[^A-Za-z0-9]/', '', $string);
}

function days()
{
    $days = array(
        1 => 'Domingo',
        'Segunda-Feira',
        'Terça-Feira',
        'Quarta-Feira',
        'Quinta-Feira',
        'Sexta-Feira',
        'Sábado'
    );
    return $days;
}

function isBase64($base64)
{
    $explode = explode(',', $base64);
    $allow = ['png', 'jpg', 'svg', 'jpeg'];
    $format = str_replace(
        [
            'data:image/',
            ';',
            'base64',
        ],
        [
            '', '', '',
        ],
        $explode[0]
    );

    // check file format
    if (!in_array($format, $allow)) {
        return false;
    }

    // check base64 format
    if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
        return false;
    }

    return true;
}


function formatter($value)
{
    $source = array(',', '.');
    $replace = array('', '.');
    $valor = str_replace($source, $replace, $value);
    return $valor;
}

function user()
{
    $user = auth()->user();
    $firstName = explode(' ', $user->people->name);
    return $firstName[0];
}

function getFormat($type, $image)
{
    $explode = explode(',', $image);
    $format = str_replace(
        [
            'data:' . $type . '/',
            ';',
            'base64',
        ],
        [
            '', '', '',
        ],
        $explode[0]
    );

    return $format;
}

function formatHour($datetime = null, $timestamp = false)
{
    $datetime = $datetime ? $datetime : Carbon::now();
    $timestamp = 'H:i';
    return Carbon::parse($datetime)->format($timestamp);
}

if (!function_exists('carbon')) {
    /**
     * Retornar instância de data.
     *
     * @param mixed $date
     * @return Carbon\Carbon
     */
    function carbon($date = null)
    {
        if (!empty($date)) {
            if ($date instanceof DateTime) {
                return Carbon::instance($date);
            }

            return Carbon::parse(date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date))));
        }

        return Carbon::now();
    }
}





function code($number)
{
    return sprintf('%08d', $number);
}


if (!function_exists('getDatesPeriod')) {
    function getDatesPeriod($period): array
    {
        switch ($period) {
            case 1:
                $dates = [
                    now()->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')
                ];
                break;
            case 2:
                $dates = [
                    now()->subMonths(2)->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')
                ];
                break;
            case 3:
                $dates = [
                    now()->subMonths(5)->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')
                ];
                break;
            case 4:
                $dates = [
                    now()->subMonths(11)->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')
                ];
                break;
            default:
                $dates = [
                    now()->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')
                ];
                break;
        }
        return $dates;
    }
}

if (!function_exists('colors')) {
    function colors()
    {
        return  ['163A64',  'F13D3D', '5DBD45', '3AD29F', '5C00A4', 'FF00E5'];
    }
}

if (!function_exists('months')) {
    function months()
    {
        return   array(
            1 => 'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        );
    }
}

if (!function_exists('carbon')) {
    /**
     * Retornar instância de data.
     *
     * @param mixed $date
     * @return Carbon\Carbon
     */
    function carbon($date = null)
    {
        if (!empty($date)) {
            if ($date instanceof DateTime) {
                return Carbon::instance($date);
            }

            return Carbon::parse(date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date))));
        }

        return Carbon::now();
    }
}


if (!function_exists('removeMask')) {
    /**
     * Remover máscara.
     *
     * @param string $str
     * @return string
     */
    function removeMask(string $str)
    {
        return preg_replace('/[^A-Za-z0-9]/', '', $str);
    }
}

if (!function_exists('insertMask')) {
    /**
     * Remover máscara.
     *
     * @param string $str
     * @return string
     */
    function insertMask(string $str, string $mask)
    {
        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;
    }
}

if (!function_exists('phoneMask')) {
    /**
     * Remover máscara.
     *
     * @param string $str
     * @return string
     */
    function phoneMask(string $str)
    {
        $mask = '(##) #####-####';

        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;
    }
}

if (!function_exists('nifMask')) {
    /**
     * Remover máscara.
     *
     * @param string $str
     * @return string
     */
    function nifMask(string $str)
    {
        if (strlen($str) == 11) {
            $mask = '###.###.###-##';
        } else {
            $mask = '##.###.###/####-##';
        }

        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;
    }
}

if (!function_exists('floatToMoney')) {
    /**
     * Transforma float do banco em reais.
     *
     * @param string $str
     * @return string
     */
    function floatToMoney($value)
    {
        return number_format($value, 2, ',', '.');
    }
}

if (!function_exists('moneyToFloat')) {
    /**
     * Converte reais para float.
     *
     * @param string $str
     * @return string
     */
    function moneyToFloat($value)
    {
        if (!$value) return 0;

        $source = array('.', ',');
        $replace = array('', '.');
        return str_replace($source, $replace, $value);
    }
}

if (!function_exists('settings')) {

    function settings($key = null, $default = null)
    {
        if ($key === null) {
            return app(App\Models\Settings::class);
        }

        return app(App\Models\Settings::class)->get($key, $default);
    }
}

/**
 * Converts a number to its roman presentation.
 **/
function numberToRoman($num)
{
    // Be sure to convert the given parameter into an integer
    $n = intval($num);
    $result = '';

    // Declare a lookup array that we will use to traverse the number:
    $lookup = array(
        'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
        'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
        'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
    );

    foreach ($lookup as $roman => $value) {
        // Look for number of matches
        $matches = intval($n / $value);

        // Concatenate characters
        $result .= str_repeat($roman, $matches);

        // Substract that from the number
        $n = $n % $value;
    }

    return $result;
}
