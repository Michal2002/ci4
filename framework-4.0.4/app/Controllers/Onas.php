<?php namespace App\Controllers;

use App\Models\UsersModel;


class Onas extends BaseController
{
	public function index()
	{
		$model = new UsersModel();
		$data = [
			'users' => $model->getUsers(),
			'title' => 'O nas',
		];
		echo view('templates/header', $data);
		echo view('users/onas_lista', $data);
		echo view('templates/footer', $data);
	}
	public function view($login = NULL)
    {
        $model = new UsersModel();
    
        $data['users'] = $model->getUsers($login);
    
        if (empty($data['users']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $login);
		}    
		echo view('templates/header_users', $data);
        echo view('users/onas_view', $data);
        echo view('templates/footer', $data);
    }

	//--------------------------------------------------------------------

}
