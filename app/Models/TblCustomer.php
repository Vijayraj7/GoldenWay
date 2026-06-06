<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblCustomer extends Model
{
    protected $table = 'tblCustomer';
    // ... other model properties and methods

    public static function addCustomer(string $name, string $address, string $email, string $phone, string $password, string $confirmPassword): string
    {
        $errorMsg = "";

        $existingEmail = self::where('csEmail', $email)->count();
        $existingPhone = self::where('csPhone', $phone)->count();

        if ($existingEmail > 0) {
            $errorMsg = 'Email is already registered!';
        } else if ($existingPhone > 0) {
            $errorMsg = 'Mobile number is already registered!';
        } else {
            $customer = new self;
            $customer->csName = strtoupper($name);
            $customer->csAddress = strtoupper($address);
            $customer->csEmail = strtolower($email);
            $customer->csPhone = $phone;
            $customer->csPWD = md5(trim($password));
            $customer->csTPWD = sha1(trim($confirmPassword));
            $customer->csStatus = 0;
            $customer->save();

            $errorMsg = null;
        }

        return $errorMsg;
    }
}
