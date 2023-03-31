<?php 

class accountModel
{
    public $id;
    public $email;
    public $hashPass;
    public $role;
    public $verify;
    public function __construct($id, $email, $hashPass, $role, $verify)
    {
        $this->id = $id;
        $this->email = $email;
        $this->hashPass = $hashPass;
        $this->role = $role;
        $this->verify = $verify;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of hashPass
     */ 
    public function getHashPass()
    {
        return $this->hashPass;
    }

    /**
     * Set the value of hashPass
     *
     * @return  self
     */ 
    public function setHashPass($hashPass)
    {
        $this->hashPass = $hashPass;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of verify
     */ 
    public function getVerify()
    {
        return $this->verify;
    }

    /**
     * Set the value of verify
     *
     * @return  self
     */ 
    public function setVerify($verify)
    {
        $this->verify = $verify;

        return $this;
    }
}