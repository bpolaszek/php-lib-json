<?php

/**
* Copyright 2013 François Kooman <fkooman@tuxed.net>
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

namespace fkooman\Json;

class Json
{
    public function __construct()
    {
    }

    public function encode($data, $prettyPrint = false)
    {
        $p = 0;
        if ($prettyPrint && defined('JSON_PRETTY_PRINT')) {
            $p |= JSON_PRETTY_PRINT;
        }
        $jsonData = @json_encode($data, $p);
        $jsonError = json_last_error();
        if (JSON_ERROR_NONE !== $jsonError) {
            throw new JsonException($jsonError);
        }

        return $jsonData;
    }

    public function decode($jsonData, $asArray = true)
    {
        $data = json_decode($jsonData, $asArray ? true : false);
        $jsonError = json_last_error();
        if (JSON_ERROR_NONE !== $jsonError) {
            throw new JsonException($jsonError);
        }

        return $data;
    }

    public function isJson($jsonData)
    {
        try {
            $data = $this->decode($jsonData);

            return true;
        } catch (JsonException $e) {
            return false;
        }
    }

    public function enc($data, $prettyPrint = false)
    {
        return $this->encode($data, $prettyPrint);
    }

    public function dec($jsonData, $asArray = true)
    {
        return $this->decode($jsonData, $asArray);
    }
}
