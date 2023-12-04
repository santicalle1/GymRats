<?php namespace App\Controllers;
use App\Models\ProfesoresModel;

class Profesores extends BaseController
{
    public function modificar_profesor()
    {
        $model = new ProfesoresModel();
        $data['profesores'] = $model->findAll();
        
        return view('modificar_profesor', $data);
    }

    public function update_profesor($id)
{
    $model = new ProfesoresModel();

    // Proceso para subir la imagen
    $imagen = $this->request->getFile('imagen');
    if ($imagen && !$imagen->hasMoved() && $imagen->isValid()) {
        $newName = $imagen->getRandomName();
        $imagen->move(ROOTPATH . 'public/uploads', $newName);
        $imagenPath = 'uploads/' . $newName; // Aquí obtienes la ruta de la imagen.
    } else {
        $imagenPath = $this->request->getPost('imagen_actual'); // Esto es un supuesto, puedes cambiarlo según tu lógica.
    }
    

    $data = [
        'nombre' => $this->request->getPost('nombre'),
        'especialidad' => $this->request->getPost('especialidad'),
        'fecha_de_contrato' => $this->request->getPost('fecha_de_contrato'),
        'titulos' => $this->request->getPost('titulos'),
        'horarios' => $this->request->getPost('horarios'),
        'coste' => $this->request->getPost('coste'),
        'dificultad' => $this->request->getPost('dificultad'),
        'id_rutina' => $this->request->getPost('id_rutina'),
        'imagen' => $imagenPath
    ];

    $model->update($id, $data);

    return redirect()->to(base_url('modificar_profesor'));
}


    public function delete_profesor($id)
    {
        $model = new ProfesoresModel();
        $model->delete($id);
        
        return redirect()->to(base_url('modificar_profesor'));
    }
    public function edit($id_profesor)
{
    $model = new ProfesoresModel();
    $data['profesor'] = $model->find($id_profesor);

    return view('editar_profesor', $data);
}
}
