<?php
class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "accesos";

	// Propiedades del objeto
	public $acceso_rahv;  
    public $fecha_rahv;
     public $horae_rahv;
      public $hora_rahv;
	public $expf_rahv; 
	public $labf_rahv; 
	public $foto_ren;
	
  // Genera la conexion a MySql
  public function __construct($db)
	{
		$this->conn = $db;
	}

  // Creacion de los metodos o productos
  function create()  
  {
    // Escribir el Query (La Consulta)
    $query = "insert into ". $this->table_name." values (null, ?, ?, ?, ?, ?, ?)";
         
     $stmt = $this->conn->prepare($query);
    
       $stmt->bindParam(1, $this->fecha_rahv);
              $stmt->bindParam(2, $this->horae_rahv);
       $stmt->bindParam(3, $this->hora_rahv);

     $stmt->bindParam(4, $this->expf_rahv);

            $stmt->bindParam(5, $this->labf_rahv);

       $stmt->bindParam(6, $this->foto_rahv);
	    
      if ($stmt->execute()) {
       	return true;    
      } else {
        return false; 
      }
  }
   
  // Leer Registros
  function readAll($page,$from_record_num,$records_per_page)
  {
    $query="select distinct acc.acceso_rahv, alu.nombre, alu.email, lab.descripcion, lab.capacidad, fecha_rahv, horae_rahv,hora_rahv, foto_ren
            from
            accesos as acc
            inner join
            alumnos as alu
            on acc.expf_rahv = alu.exp 
            inner join
            laboratorios as lab
            where acc.labf_rahv = lab.lab order by acceso_rahv asc limit 
  	       {$from_record_num},{$records_per_page}";
	   
	  $stmt = $this->conn->prepare($query);
    $stmt->execute();
      
      return $stmt;
  }
		
	// Usarlo para paginar registros
  public function countAll()
  {
    $query="select acceso_rahv from ". $this->table_name . "";

	  $stmt = $this->conn->prepare($query);
    $stmt->execute();
     
    $num = $stmt->rowCount();
	  
	  return $num;
  }
	
  // Al darle Actualizar, se llenan los campos con el registro seleccionado
  function readOne()
  {
    $query="select * from " . $this->table_name . " where acceso_rahv= ? limit 0,1";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id_ren);
	   
    $stmt->execute();
         
    // Crea el vinculo con la BD y Muestra los registros existentes    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // En las llaves "[ ]" van los nombres de atributos de BD.
      $this->id_ren = $row['acceso_rahv'];
      $this->fecha_ren = $row['fecha_rahv'];   
      $this->fecha_ren = $row['horae_rahv']; 
      $this->fecha_ren = $row['hora_rahv']; 


    	$this->id_clif = $row['expf_rahv'];
    	$this->id_salf = $row['labf_rahv'];      	
    	$this->foto_ren = $row['foto_rahv'];    
  }
	
  // Funcion para Actualizar los registros en MySql
  function update()
  {
	  $query="update
		   		 " . $this->table_name . "
				  set
					   
					   
					   fecha_rahv = :fechaaccesos,
             horae_rahv = :horaeaccesos,
             hora_rahv = :horaaccesos, 
             labf_rahv = :llavelaboratorios,
					   expf_rahv = :llavealumnos,
					   foto_rahv = :imgaccesos
				  where
					   acceso_rahv = :id";	
						
    $stmt = $this->conn->prepare($query);
          
    $stmt->bindParam(':id', $this->acceso_rahv);
   
    $stmt->bindParam(':fechaaccesos', $this->fecha_rahv);
    $stmt->bindParam(':horaeaccesos', $this->horae_rahv);
    $stmt->bindParam(':horaaccesos', $this->hora_rahv);
    $stmt->bindParam(':llavelaboratorios', $this->labf_rahv);
    $stmt->bindParam(':llavealumnos', $this->expf_rahv);
    $stmt->bindParam(':imgaccesos', $this->foto_rahv);
	      
    // Ejecuta el query 
      if ($stmt->execute()) {
       	return true; 
      } else {
        return false; 
      }
  }
	  
	// Funcion para Eliminar los registros en BD.
  function delete()
  {
    $query="delete from " . $this->table_name . " where	acceso_rahv = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id_ren);
	        
    // Ejecuta el query (la Consulta)
    if ($stmt->execute()) {
     	return true; // falto el ";"
      } else {
      return false; // falto el ";"
      }
     }
  }
?>