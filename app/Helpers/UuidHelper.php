<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class UuidHelper
{
    // Encode id jadi UUID "semu"
    public static function encodeIdToUuid($id)
    {
        // UUID acak
        $uuid = Str::uuid()->toString(); // contoh: 550e8400-e29b-41d4-a716-446655440000

        // Hilangkan tanda strip (-)
        $uuid = str_replace('-', '', $uuid); // jadi 32 karakter

        $idStr = (string) $id;
        $len = str_pad(strlen($idStr), 2, '0', STR_PAD_LEFT); // panjang ID, 2 digit

        // Ambil 24 char pertama + len + id
        $encoded = substr($uuid, 0, 24) . $len . $idStr;

        // Format kembali jadi UUID-like (36 char)
        return substr($encoded, 0, 8) . '-' .
            substr($encoded, 8, 4) . '-' .
            substr($encoded, 12, 4) . '-' .
            substr($encoded, 16, 4) . '-' .
            substr($encoded, 20);
    }


    /**
     * Decode UUID ke ID integer asli
     */
    public static function decodeUuidToId($uuid)
    {
        // bersihkan strip
        $raw = str_replace('-', '', $uuid);

        // panjang ID disimpan di posisi 24–25
        $len = (int) substr($raw, 24, 2);

        // Ambil ID
        $idStr = substr($raw, 26, $len);

        return (int) $idStr;
    }
}