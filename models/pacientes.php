<?php
require_once 'conexion.php';

class paciente extends Conexion
{
    public $paciente_id;
    public $pac_nombre1;
    public $pac_nombre2;
    public $pac_apellido1;
    public $pac_apellido2;
    public $pac_dpi;
    public $pac_sexo;
    public $pac_referido;
    public $paciente_situacion;


    public function __construct($args = [])
    {
        $this->paciente_id = $args['paciente_id'] ?? null;
        $this->pac_nombre1 = $args['pac_nombre1'] ?? '';
        $this->pac_nombre2= $args['pac_nombre2'] ?? '';
        $this->pac_apellido1 = $args['pac_apellido1'] ?? '';
        $this->pac_apellido2 = $args['pac_apellido2'] ?? '';
        $this->pac_dpi = $args['pac_dpi'] ?? '';
        $this->pac_sexo = $args['pac_sexo'] ?? '';
        $this->pac_referido = $args['pac_referido'] ?? '';
        $this->paciente_situacion = $args['paciente_situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO paciente(pac_nombre1, pac_nombre2, pac_apellido1, pac_apellido2, pac_dpi, pac_sexo, pac_referido, paciente_situacion) values('$this->pac_nombre1', '$this->pac_nombre2','$this->pac_apellido1', '$this->pac_apellido2','$this->pac_dpi','$this->pac_sexo','$this->pac_referido','$this->paciente_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT * from paciente where paciente_situacion = 1 ";

        if ($this->pac_nombre1 != '') {
            $sql .= " and pac_nombre1 like '%$this->pac_nombre1%' ";
        }

        if ($this->pac_nombre2 != '') {
            $sql .= " and pac_nombre2 like '%$this->pac_nombre2%' ";
        }


        if ($this->pac_apellido1 != '') {
            $sql .= " and pac_apellido1  like '%$this->pac_apellido1%' ";
        }

        if ($this->pac_apellido2 != '') {
            $sql .= " and pac_apellido2  like '%$this->pac_apellido2%' ";
        }

        if ($this->pac_dpi != '') {
            $sql .= " and pac_dpi = %$this->pac_dpi% ";
        }

        if ($this->pac_sexo != '') {
            $sql .= " and pac_sexo = %$this->pac_sexo% ";
        }

        if ($this->pac_referido != '') {
            $sql .= " and pac_referido = %$this->pac_referido% ";
        }

        if ($this->paciente_id != null) {
            $sql .= " and paciente_id = $this->paciente_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE paciente SET pac_nombre1 = '$this->pac_nombre1', pac_nombre2 = '$this->pac_nombre2', pac_apellido1 = '$this->pac_apellido1', pac_apellido2 ='$this->pac_apellido2' pac_dpi = '$this->pac_dpi', pac_sexo = '$this->pac_sexo', pac_referido = $this->pac_referido   where paciente_id = $this->paciente_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE paciente SET paciente_situacion = 0 where paciente_id = $this->paciente_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscarPacientes()
    {
        $sql = " SELECT  TRIM(pac_nombre1) ||  ' ' TRIM(pac_nombre2) ||  ' ' TRIM(pac_apellido1) || ' ' TRIM(pac_apellido2) || ' ' AS nombre1S, paciente_id FROM paciente where paciente_situacion = 1";

        $resultado = self::servir($sql);


        return $resultado;
    }
}
