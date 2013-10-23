<?php

class HomeController extends BaseController {

	public function index()
	{
		$welcome = 'You just got booted up';
		$this->layout->content = View::make('home', compact('welcome'));
	}
}