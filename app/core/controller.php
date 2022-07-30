<?php

class Controller
{

	public function model($model)
	{
		if (file_exists('app/models/' . $model . '.php')) {
			require_once 'app/models/' . $model . '.php';
			return new $model();
		} else {
			return null;
		}
	}

	protected function view($view, $data = [])
	{
		if (file_exists('app/views/' . $view . '.php')) {
			require_once 'app/views/' . $view . '.php';
		} else {
			echo "Can't load view $view: file not found!";
		}
	}

	protected function makePath($path)
	{
		$folders = explode('/', $path);
		unset($folders[count($folders) - 1]);
		$path = '';
		foreach ($folders as $folder) {
			if ($path != '') {
				$path .= '/';
			}
			$path .= $folder;
			if (!is_dir($path)) {
				mkdir($path);
			}
		}
	}
}
