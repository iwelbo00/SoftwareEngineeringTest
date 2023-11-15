<?php
//response object used to send json body back to response
class JSONResponse {
    //sends passed in data in the response
    public function render($data) {
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>