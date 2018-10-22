<?php

namespace App\Serializers;


use Illuminate\Http\Resources\Json\ResourceCollection;

trait ResponseSerializer
{

    public function responseSuccess($message = '', $data = null, $meta = null, $exception = null, $code = 200)
    {
        $response = ['status' => true, 'message' => $message];
        if (!is_null($data)) {
            $response['data'] = $data;
        }
        if (!is_null($meta)) {
            $response['meta'] = $meta;
        }
        return response()->json($response, $code);
    }


    public function responseError($message = '', $data = null, $exception = null, $detail = false, $code = 200)
    {
        $response = ['status' => false, 'message' => $message];
        if (!is_null($data)) {
            $response['data'] = $data;
        }
        if (!is_null($exception)) {
            if (config('app.env') == 'local') {
                $response['debug'] = $exception->getTrace();
            }
            if ($detail) {
                $response['detail'] = $this->extractMessage($exception);
            }
        }
        return response()->json($response, $code);
    }

    protected function extractMessage($exception)
    {
        $jsonObj = json_decode($exception->getResponse()->getBody());
        if (isset($jsonObj->message) && !empty($jsonObj->message)) {
            $message = $jsonObj->message;
        } else {
            if (!empty($jsonObj->error)) {
                $message = $jsonObj->error;
            } else {
                $message = $jsonObj;
            }
        }
        return $message;
    }

    public function responseCollectionSuccess($message = '', ResourceCollection $collection)
    {
        return $collection->setStatus(true)->setMessage($message);
    }

}