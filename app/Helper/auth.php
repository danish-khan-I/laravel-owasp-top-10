<?php 
function authCheck(){
    return request()->cookie('auth');
}
function getUser(){
    
    return json_decode(base64_decode(request()->cookie('auth')));
}