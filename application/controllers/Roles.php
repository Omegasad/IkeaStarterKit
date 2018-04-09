<?php

class Roles extends Application
{
    public function actor($role = ROLE_GUEST)
    {
        $this->set_role($role);
        redirect('/');
    }
}