<?php namespace Cornford\Googlmapper\Models;

use Cornford\Googlmapper\Contracts\ModelingInterface;
use Illuminate\View\Factory as View;

class Marker implements ModelingInterface {

	/**
	 * Options.
	 *
	 * @var array
	 */
	protected $options = [];

	/**
	 * Public constructor.
	 *
	 * @param array $parameters
	 */
	public function __construct(array $parameters = [])
	{
		$this->options['latitude'] = isset($parameters['latitude']) ? $parameters['latitude'] : null;
		$this->options['longitude'] = isset($parameters['longitude']) ? $parameters['longitude'] : null;
		$this->options['user'] = isset($parameters['user']) ? $parameters['user'] : null;
		$this->options['marker'] = isset($parameters['marker']) ? $parameters['marker'] : null;
		$this->options['center'] = isset($parameters['center']) ? $parameters['center'] : null;
		$this->options['ui'] = isset($parameters['ui']) ? $parameters['ui'] : null;
		$this->options['zoom'] = isset($parameters['zoom']) ? $parameters['zoom'] : null;
		$this->options['type'] = isset($parameters['type']) ? $parameters['type'] : null;
		$this->options['tilt'] = isset($parameters['tilt']) ? $parameters['tilt'] : null;
		$this->options['map'] = isset($parameters['markers']['map']) ? $parameters['markers']['map'] : null;
		$this->options['title'] = isset($parameters['markers']['title']) ? $parameters['markers']['title'] : null;
		$this->options['content'] = isset($parameters['markers']['content']) ? $parameters['markers']['content'] : null;
		$this->options['icon'] = isset($parameters['markers']['icon']) ? $parameters['markers']['icon'] : null;
		$this->options['place'] = isset($parameters['markers']['place']) ? $parameters['markers']['place'] : null;
		$this->options['animation'] = isset($parameters['markers']['animation']) ? $parameters['markers']['animation'] : null;
		$this->options['symbol'] = isset($parameters['markers']['symbol']) ? $parameters['markers']['symbol'] : null;
		$this->options['scale'] = isset($parameters['markers']['scale']) ? $parameters['markers']['scale'] : null;
	}

	/**
	 * Render the model item.
	 *
	 * @param integer $identifier
	 * @param View    $view
	 *
	 * @return string
	 */
	public function render($identifier, View $view)
	{
		return $view->make('googlmapper::marker')
			->withOptions($this->options)
			->withId($identifier)
			->render();
	}

}
