<?php

require_once(APPROOT . "/librairies/Controller.php");

class Pages extends Controller
{
    public function index()
    {
        if (isLoggedIn()) {
            redirect("patients");

        }
    }

    public function about()
    {
        redirect("about");
    }
}