
package com.balmis.apirest.repository;

import com.balmis.apirest.model.Producto;
import java.util.List;
import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


public interface ProductoRepository extends JpaRepository<Producto, Integer> {

    // ****************************
    // Métodos HEREDADOS
    // ****************************
    /*
        findAll()
        findById(id)

        count()
        delete(User)
        deleteById(id)
        deleteAll()

        equals(User)
        exist(User)
        existById(id)
     */
    
    // **********************************************************
    // Obtener datos (find y count)
    // **********************************************************

    // Consulta con DQM 
    Optional<Producto> findByDescrip(String descrip);
    
    // Consulta con SQL 
    @Query(value = "SELECT * FROM productos", nativeQuery = true)
    List<Producto> findSqlAll();
    
    // Consulta con SQL 
    @Query(value = "SELECT * FROM productos WHERE id = :id", nativeQuery = true)
    Producto findSqlById(@Param("id") int userId);

    // Consulta con SQL 
    @Query(value = "SELECT COUNT(*) as cantidad FROM productos", nativeQuery = true)
    Long countSql();    

    // Consulta con SQL 
    @Query(value = "SELECT * FROM productos WHERE id > :id", nativeQuery = true)
    List<Producto> findSqlByIdGrThan(@Param("id") int userId);
    
    
    
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
