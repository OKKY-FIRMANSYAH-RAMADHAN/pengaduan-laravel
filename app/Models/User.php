<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'user';
    public $primaryKey = 'id_user';

    // Insert Data
    public function insertData($requestData)
    {
        $user = new User;

        if (isset($requestData['identitas_user'])) {
            $identitas = $requestData['identitas_user'];
            $identitasName = Str::random(20) . '.' . $identitas->getClientOriginalExtension();
            $identitas->storeAs('public/identitas', $identitasName);
            $user->identitas_user = $identitasName;
        }

        $user->nama_user = $requestData['nama_user'];
        $user->username = $requestData['username'];
        $user->email_user = $requestData['email_user'];
        $user->foto_user = rand(1, 7) . '.jpg';
        $user->password_user = Hash::make($requestData['password_user']);
        $user->save();

        return $user;
    }

    // Auth
    public function authenticate($usernameOrEmail, $password)
    {
        $user = User::where('email_user', $usernameOrEmail)->orWhere('username', $usernameOrEmail)->first();

        if ($user) {
            if (Hash::check($password, $user->password_user)) {
                return $user;
            }
        }

        return null;
    }
}
