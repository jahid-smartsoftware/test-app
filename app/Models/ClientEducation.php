<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientEducation extends Model
{
    private static $education;
    public static function addEducation($clientId, $info)
    {
        self::$education = new ClientEducation();
        self::$education->client_id = $clientId;
        self::$education->degree = $info['degree'];
        self::$education->institute = $info['institute'];
        self::$education->result = $info['result'];
        self::$education->year = $info['year'];
        self::$education->save();
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
