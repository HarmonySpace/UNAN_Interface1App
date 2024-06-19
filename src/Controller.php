<?php

class Controller
{
    public $dir;
    public $json_file;
    //personal functions
    private function getFileContent()
    {
        if (!file_exists($this->json_file)) {
            die("JSON file not found at path: $this->json_file");
        }
        $json_data = file_get_contents($this->json_file);
        $data_file = json_decode($json_data, true);
        return $data_file;
    }
    private function generateId()
    {
        return hexdec(uniqid());
    }

    public function __construct()
    {
        $this->dir = __DIR__ . '/..';
        $this->json_file = $this->dir . "/assets/file.json";
    }
    // views
    //route "/"
    public function index()
    {
        $view_path = $this->dir . "/src/views/home.html";
        if (file_exists($view_path)) {
            require_once $view_path;
        } else {
            echo "File not found: $view_path";
        }
    }
    //route "/create"
    public function create()
    {
        $view_path = $this->dir . "/src/views/create.html";
        if (file_exists($view_path)) {
            require_once $view_path;
        } else {
            echo "File not found: $view_path";
        }
    }
    //route "/edit"
    public function edit($id)
    {
        $view_path = $this->dir . "/src/views/edit.html";
        if (file_exists($view_path)) {
            require_once $view_path;
        } else {
            echo "File not found: $view_path";
        }
    }
    //data functions
    //route "/get"
    public function get()
    {
        $data_response = $this->getFileContent();
        $json_response = json_encode($data_response);
        header('Content-Type: application/json');
        echo $json_response;
    }
    //route "/store"
    public function store()
    {
        date_default_timezone_set('America/Managua');
        $data_new = array(
            'id' => intval($this->generateId()),
            'codfac' => $_POST['codfac'],
            'tipo_beca' => $_POST['tipo_beca'],
            'monto' => intval($_POST['monto']),
            'id_regimen' => intval($_POST['id_regimen']),
            'fecha_cre' => date('y-m-d'),
            'hora_cre' => date('H:i'),
            'usuario' => 'manuel',
            'anyo' => intval($_POST['anyo'])
        );
        $data_file = $this->getFileContent();
        $data_file[] = $data_new;
        $json_response = json_encode($data_file);
        if (!is_writable($this->json_file)) {
            $json_response = [
                "res" => "error: THE FILE IS NOT WRITABLE"
            ];
            $json_response = json_encode($json_response);
        }
        file_put_contents($this->json_file, $json_response);
        header('Content-Type: application/json');
        echo $json_response;
    }
    //route "/update"
    public function update($id)
    {
        $data_file = $this->getFileContent();
        $index = array_search($id, array_column($data_file, 'id'));
        if ($index !== false) {
            $data_file[$index]['codfac'] = $_POST['codfac'];
            $data_file[$index]['tipo_beca'] = $_POST['tipo_beca'];
            $data_file[$index]['monto'] = $_POST['monto'];
            $data_file[$index]['id_regimen'] = $_POST['id_regimen'];
            $data_file[$index]['anyo'] = $_POST['anyo'];
            $json_response = json_encode($data_file);
            if (!is_writable($this->json_file)) {
                $json_response = [
                    "res" => "error: THE FILE IS NOT WRITABLE"
                ];
                $json_response = json_encode($json_response);
            }
            file_put_contents($this->json_file, $json_response);
            $json_response = [
                "res" => "success: OBJECT SAVED"
            ];
            $json_response = json_encode($json_response);
        } else {
            $json_response = [
                "res" => "error: OBJECT NOT FOUND"
            ];
            $json_response = json_encode($json_response);
        }
        header('Content-Type: application/json');
        echo $json_response;
    }
    //route "/find"
    public function find($id)
    {
        $data_file = $this->getFileContent();
        $object = array_filter($data_file, function ($obj) use ($id) {
            return $obj['id'] == $id;
        });
        if (!empty($object)) {
            $object = array_values($object)[0];
            $json_response = json_encode($object);
        } else {
            $json_response = [
                "res" => "error: OBJECT NOT FOUND"
            ];
            $json_response = json_encode($json_response);
        }
        header('Content-Type: application/json');
        echo $json_response;
    }
}
