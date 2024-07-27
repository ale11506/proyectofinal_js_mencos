<?php
require_once 'conexion.php';

class medico extends Conexion
{
    public $medico_id;
    public $med_nombre1;
    public $med_nombre2;
    public $med_apellido1;
    public $med_apellido2;
    public $med_especialidad;
    public $medico_situacion;


    public function __construct($args = [])
    {
        $this->medico_id = $args['medico_id'] ?? null;
        $this->med_nombre1 = $args['med_nombre1'] ?? '';
        $this->med_nombre2 = $args['med_nombre2'] ?? '';
        $this->med_apellido1 = $args['med_apellido1'] ?? '';
        $this->med_apellido2 = $args['med_apellido2'] ?? '';
        $this->med_especialidad = $args['med_especialidad'] ?? '';
        $this->medico_situacion = $args['medico_situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO medico(med_nombre1, med_nombre2, med_apellido1, med_apellido2, med_especialidad,  medico_situacion) values('$this->med_nombre1', '$this->med_nombre2','$this->med_apellido1', $this->med_apellido2','$this->med_especialidad','$this->medico_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT * from medico where medico_situacion = 1 ";

        if ($this->med_nombre1 != '') {
            $sql .= " and med_nombre1 like '%$this->med_nombre1%' ";
        }

        if ($this->med_nombre2 != '') {
            $sql .= " and med_nombre2 like '%$this->med_nombre2%' ";
        }

        if ($this->med_apellido1 != '') {
            $sql .= " and med_apellido1  like '%$this->med_apellido1%' ";
        }

        if ($this->med_apellido1 != '') {
            $sql .= " and med_apellido1  like '%$this->med_apellido1%' ";
        }

        if ($this->med_apellido2 != '') {
            $sql .= " and med_apellido2  like '%$this->med_apellido2%' ";
        }

        if ($this->med_especialidad != '') {
            $sql .= " and med_especialidad = %$this->med_especialidad% ";
        }


        if ($this->medico_id != null) {
            $sql .= " and medico_id = $this->medico_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE medico SET med_nombre1 = '$this->med_nombre1', med_nombre2 = '$this->med_nombre2', med_apellido1 = '$this->med_apellido1', med_apellido2 = '$this->med_apellido2', med_especialidad = '$this->med_especialidad'  where medico_id = $this->medico_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    
    public function mostrarMedicos (){
        $sql = "SELECT * FROM medico where medico_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;


    }

    public function eliminar()
    {
        $sql = "UPDATE medico SET medico_situacion = 0 where medico_id = $this->medico_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }


}





