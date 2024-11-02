<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    private static $client;
    public static function createClient($name)
    {
        self::$client = new Client();
        self::$client->full_name = $name;
        self::$client->save();
        return self::$client->id;
    }
    public static function updateClient($id, $request)
    {
        self::$client = Client::find($id);
        self::$client->full_name = $request->full_name;
        self::$client->save();
    }
    public function educations(): HasMany
    {
        return $this->hasMany(ClientEducation::class, 'client_id');
    }
}
