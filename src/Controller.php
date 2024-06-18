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
    //route "/"
    public function index()
    {
        $data_response = $this->getFileContent();
        $json_response = json_encode($data_response);
        header('Content-Type: application/json');
        echo $json_response;
    }
    //route "/home"
    // public function home(){
    //     require_once $dir . "/"
    // }
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
            die("The file is not writable.");
        }
        file_put_contents($this->json_file, $json_response);
        header('Content-Type: application/json');
        echo $json_response;
    }
}

$controller = new Controller();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $controller->index();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->store();
}
