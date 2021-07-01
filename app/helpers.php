<?php


use Illuminate\Support\Facades\Auth;

function getUserPermissions(){
    return Auth::user()->permissions;
}