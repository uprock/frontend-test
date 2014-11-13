<?php

class RESTController extends SController
{
    private function _getStatusCodeMessage($status)
    {
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    public function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
    {

        if ($body != '') {
            echo $body;
        } else {
            $message = '';
            switch ($status) {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }
            $signature = '';
            $body = '
						<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
						<html>
						<head>
						    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						    <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
						</head>
						<body>
						    <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
						    <p>' . $message . '</p>
						    <hr />
						    <address>' . $signature . '</address>
						</body>
						</html>';

            echo $body;
        }
        Yii::app()->end();
    }
}