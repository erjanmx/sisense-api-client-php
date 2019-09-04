<?php


namespace Sisense;

/**
 * Trait JsonEncodeDecoder
 *
 * @package Sisense
 */
trait JsonEncodeDecoder
{
    /**
     * Error strings if json is invalid.
     */
    private static $jsonErrors = array(
        JSON_ERROR_NONE => 'No error has occurred',
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
        JSON_ERROR_SYNTAX => 'Syntax error',
    );

    /**
     * @param mixed $data
     *
     * @return array
     */
    private function encodeData($data = null)
    {
        if (is_array($data)) {
            return json_encode($data);
        }

        return [];
    }

    /**
     * Decodes json response.
     *
     * Returns $json if no error occurred during decoding but decoded value is
     * null.
     *
     * @param string $json
     *
     * @return array|string
     */
    public function decode($json)
    {
        if ('' === $json) {
            return '';
        }
        $decoded = json_decode($json, true);
        if (null !== $decoded) {
            return $decoded;
        }
        if (JSON_ERROR_NONE === json_last_error()) {
            return $json;
        }
        return self::$jsonErrors[json_last_error()];
    }
}
