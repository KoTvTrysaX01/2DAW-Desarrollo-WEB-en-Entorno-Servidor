
package com.balmis.apirest.repository;

import com.balmis.apirest.model.Empleado;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


public interface EmpleadoRepository extends JpaRepository<Empleado, Integer> {

    // **********************************************************
    // Obtener datos (find y count)
    // **********************************************************

    // ****************************
    // Métodos HEREDADOS
    // ****************************
    /*
        findAll()
        findById(id)

        count()

        equals(User)
        exist(User)
        existById(id)
     */
    
    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM empleados", nativeQuery = true)
    List<Empleado> findSqlAll();
    
    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM empleados WHERE id = :id", nativeQuery = true)
    Empleado findSqlById(@Param("id") int empleadoId);    

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM empleados WHERE LOWER(dep) = LOWER(:dep)", nativeQuery = true)
    List<Empleado> findSqlByDep(@Param("dep") String empleadoDep);    
    
    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM empleados WHERE LOWER(nombre) LIKE LOWER(CONCAT('%',:nombre,'%'))", nativeQuery = true)
    List<Empleado> findSqlLikeNombre(@Param("nombre") String empleadoNombre);

    // Consulta con SQL mapeado
    @Query(value = "SELECT COUNT(*) as empleados FROM empleados", nativeQuery = true)
    Long countSql();    

    
    // **********************************************************
    // Actualizaciones
    // **********************************************************
    
    // ****************************
    // Métodos HEREDADOS
    // ****************************
    /*
        delete(User)
        deleteById(id)
        deleteAll()

        save(User)
     */
    
    
}
