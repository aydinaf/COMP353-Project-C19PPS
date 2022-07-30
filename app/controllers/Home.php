<?php

class Home extends Controller
{
    public function index()
    {
        $allArticles = $this->model('branches');
        $this->view('Home/index', ['branches' => $allArticles->get()]);
    }
}
