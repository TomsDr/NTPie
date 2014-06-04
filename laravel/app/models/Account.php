<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Account 
extends Eloquent
implements UserInterface, RemindableInterface
{
    protected $table = "account";
    
    protected $hidden = ["password"];
    
    protected $guarded = ["id"];
    
    protected $softDelete = true;
    
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    public function getReminderEmail()
    {
        return $this->email;
    }
    
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function orders()
    {
        return $this->hasMany("Order");
    }
    
}

?>
