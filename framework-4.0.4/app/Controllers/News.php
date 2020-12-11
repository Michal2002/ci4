<?php namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();
    
        $data = [
            'news'  => $model->getNews(),
            'title' => 'Archiwum aktualności',
        ];
    
        // echo view('templates/header', $data);
        echo view('news/overview', $data);
        // echo view('templates/footer', $data);
    }
    public function view($slug = NULL)
    {
        $model = new NewsModel();
    
        $data['news'] = $model->getNews($slug);
    
        if (empty($data['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }
    
        $data['title'] = $data['news']['title'];
    
        // echo view('templates/header', $data);
        echo view('news/view', $data);
        // echo view('templates/footer', $data);
    }
    public function create()
{
    $model = new NewsModel();

    if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ]))
    {
        $model->save([
            'title' => $this->request->getPost('title'),
            'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
            'body'  => $this->request->getPost('body'),
        ]);
        echo view('templates/header', ['title' => 'Dodano wiadomości']);
        echo view('news/success');
        echo view('templates/footer');

    }
    else
    {
        echo view('templates/header', ['title' => 'Dodaj wiadomość']);
        echo view('news/create');
        echo view('templates/footer');
    }
}
    public function delete($slug = null)
    {
        $model = new NewsModel();
        if ($this->request->getMethod()==='post')
        {
            $id = $this->request->getPost('id');
           // $data['news'] = $model->get($id);
            $model->delete(['id'=>$id]);
            echo view('news/delsuccess', ['id' => $id]);
        } 
        else {
            $data['news'] = $model->getNews($slug);
            if (empty($data['news']))
                {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
                }
                $data['title'] = $data['news']['title'];
    
                echo view('templates/header', $data);
                echo view('news/delform', $data);
                echo view('templates/footer', $data);

        }

    }
    public function update($slug = false)
    {
        $model = new NewsModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ]))       
        {
            $id = $this->request->getPost('id');
            $data= [
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
                'body'  => $this->request->getPost('body'),
            ];
            $model->update($id, $data);
            echo view('news/updateok', ['slug' => $data['slug']]);
        } 
        else {
            $data['news'] = $model->getNews($slug);
            if (empty($data['news']))
                {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
                }
                $data['title'] = $data['news']['title'];
    
                echo view('templates/header', $data);
                echo view('news/update', $data);
                echo view('templates/footer', $data);

        }

    }

}