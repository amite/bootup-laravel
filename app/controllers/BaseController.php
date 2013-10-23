<?php

class BaseController extends Controller {

	/**
	 * The default layout
	 * 
	 * @var string
	 */
	public $layout = 'layouts.default';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			
			// Default layout data
			$this->layout->head = new stdClass;
			$this->layout->head->title = '';
			$this->layout->content = '';
		}
	}
}