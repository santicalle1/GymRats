<?php

namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\ProfesoresModel;
use App\Models\UserModel;
use App\Models\RutinaModel;
use App\Models\SolicitudModel;
use App\Models\DescripcionRutina;

class Panel extends BaseController
{

    public function panel()
    {

        session();
        $tipo = session()->get('tipo');
        if ($tipo == 0) {
            $rutinaModel = new RutinaModel();
            $DescripcionRutina = new DescripcionRutina();
            $id_usuario = session()->get('id');
            $id_profesor = $rutinaModel->obteneridprofe($id_usuario);
            // Obtén los detalles del profesor comprado   

            $profesorModel = new ProfesoresModel();
            $data['profesor'] = $profesorModel->find($id_profesor);
            // Obtén los datos del usuario (reemplaza esto con la lógica real según tu implementación)
            $userModel = new UserModel();
            $data['userData'] = $userModel->find($id_usuario);

            $session = session();
            $session->set('id_profesor', $id_profesor);
            $session->set('profesor_comprado', $data['profesor']);

            if ($id_profesor){
                $id_rutina = $rutinaModel
                ->where('id', $id_usuario)
                ->where('id_profesor', $id_profesor)
                ->first()['id_rutina'];
            
            $builder = $DescripcionRutina->select('detalle_rutina.*')
                ->join('rutinas', 'rutinas.id_rutina = detalle_rutina.id_rutina')
                ->where('rutinas.id_rutina', $id_rutina);
            
            $resultados = $builder->get()->getResult();
            $data['detalleRutina'] = $resultados;
            
            // Consolidar todos los datos en un solo array
            $dataToSend = array_merge($data, ['resultados' => $resultados]);
            
                return view('panel_cliente', $dataToSend);
            
            }else{
                return view('panel_cliente');
            
           

}
        } elseif ($tipo == 1) {
            return view('panel_admin');
        } else {

            $solicitudModel = new SolicitudModel();
            $profesoresModel = new ProfesoresModel();
            $usuariosModel = new Usuarios();

            // Obtén el id de la sesión
            $id_p = session()->get('id');

            // Obtener id_profesor
            $profesor = $profesoresModel->select('id_profesor')->where('id', $id_p)->get()->getRow();
            $id_profesor = ($profesor) ? $profesor->id_profesor : null;

            // Obtener información de los usuarios
            $usuarios = $usuariosModel
                ->select('clientes.id, clientes.usuario')
                ->join('solicitud', 'solicitud.id = clientes.id') 
                ->where('solicitud.id_profesor', $id_profesor)
                ->findAll();

            $usuarios = array_map(function ($usuario) {
                return (object) $usuario;
            }, $usuarios);

            // Almacenar los datos en un array
            $datos = [
                'id_profesor' => $id_profesor,
                'usuarios' => $usuarios,
            ];

            // Cargar la vista y pasarle los datos
            return view('panel_profesores', $datos);
        }
    }
    public function index($id)
    {
        // Carga el modelo de usuario
        $usuarioModel = new Usuarios();

        // Lógica para obtener el usuario según el $id
        $usuario = $usuarioModel->obtenerUsuarioPorId($id);

        // Pasa la variable $usuario a la vista
        return view('armar_rutinas', ['usuario' => $usuario]);


    }

    public function armarrutina()
    {
        $id_usuario = $this->request->getPost('id');
        var_dump($id_usuario);
        $ejercicios = $this->request->getPost('ejercicio');
        $pesos = $this->request->getPost('peso');
        $series = $this->request->getPost('series');
        $repeticiones = $this->request->getPost('repeticiones');
        $dificultad = $this->request->getPost('dificultad');
        $id_p = session()->get('id');

        $detallerutina = new DescripcionRutina();
        $solicitudModel = new SolicitudModel();
        $rutinaModel = new RutinaModel();
        $profesoresModel = new ProfesoresModel();

        $profesor = $profesoresModel->select('id_profesor')->where('id', $id_p)->get()->getRow();
        $id_profesor = ($profesor) ? $profesor->id_profesor : null;


        $id_rutina = $rutinaModel
            ->where('id', $id_usuario)
            ->where('id_profesor', $id_profesor)
            ->first()['id_rutina'];

        // Obtener el id de la solicitud que deseas eliminar
        $id_solicitud = $solicitudModel->where('id', $id_usuario)->first()['id_solicitud'];

        $solicitudModel->delete($id_solicitud);

        foreach ($ejercicios as $key => $ejercicio) {
            $data = [
                'id_rutina' => $id_rutina,
                'ejercicios' => $ejercicio,
                'repeticiones' => $repeticiones[$key],
                'series' => $series[$key],
                'peso' => $pesos[$key],
            ];

            $detallerutina->insert($data);
        }

        return redirect()->to('inicio');
    }

    public function eliminar()
    {
        // Asegúrate de cargar el modelo DescripcionRutina
        $DescripcionRutina = new DescripcionRutina();
    
        // Obtén el id_detalle_rutina del formulario enviado
        $id_detalle_rutina = $this->request->getPost('id_detalle_rutina');
    
        // Elimina el registro de la tabla detalle_rutina
        $DescripcionRutina->delete($id_detalle_rutina);
    
        // Redirige a donde sea necesario después de la eliminación
        return redirect()->to('inicio');
    }
    

    

}
