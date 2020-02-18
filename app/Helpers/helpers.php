<?php

class Helpers
{
    public static function uploadFile($nameInput, $folder, $request)
    {
        $ext = $request->$nameInput->getClientOriginalExtension();
        $name = rand() . '_' . time() . '.' . $ext;
        return $request->$nameInput->storeAs($folder, $name, 'public');
    }
}
