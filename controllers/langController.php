<?php
class langController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {}

    public function set($lang) {
        $_SESSION['lang'] = $lang;
        header("Location: ".BASE_URL);
    }

}