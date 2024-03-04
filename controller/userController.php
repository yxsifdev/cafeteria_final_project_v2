<?php
class userController
{
    private $model;

    public function __construct()
    {
        require_once('../../models/userModel.php');
        $this->model = new userModel();
    }

    public function show($id)
    {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location: ../../views/profile/show.php");
    }

    public function update($id, $nombre, $apellido, $dni, $fechaNa, $telefono, $perfil)
    {
        return ($this->model->update($id, $nombre, $apellido, $dni, $fechaNa, $telefono, $perfil)) ? true : false;
    }
}
