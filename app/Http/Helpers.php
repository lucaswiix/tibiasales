<?php

function usernick($id) {
    $getnick = \DB::table('users')->where('id', '=', $id)->value('nick');

    return $getnick;
}

function whatsapp($id) {
    $what = \DB::table('users')->where('id', '=', $id)->value('whatsapp');

    return $what;
}

function facebook($id) {
    $face = \DB::table('users')->where('id', '=', $id)->value('facebook');

    return $face;
}