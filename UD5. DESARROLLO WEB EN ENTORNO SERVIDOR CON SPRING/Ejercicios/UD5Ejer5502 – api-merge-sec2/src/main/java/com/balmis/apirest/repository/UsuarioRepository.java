
package com.balmis.apirest.repository;

import com.balmis.apirest.model.Usuario;
import java.util.List;
import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


public interface UsuarioRepository extends JpaRepository<Usuario, Integer> {

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
    Optional<Usuario> findByUsername(String username);
    
    // Consulta con SQL 
    @Query(value = "SELECT * FROM users_security", nativeQuery = true)
    List<Usuario> findSqlAll();
    
    // Consulta con SQL 
    @Query(value = "SELECT * FROM users_security WHERE id = :id", nativeQuery = true)
    Usuario findSqlById(@Param("id") int userId);

    // Consulta con SQL 
    @Query(value = "SELECT COUNT(*) as cantidad FROM users_security", nativeQuery = true)
    Long countSql();    

    // Consulta con SQL 
    @Query(value = "SELECT * FROM users_security WHERE id > :id", nativeQuery = true)
    List<Usuario> findSqlByIdGrThan(@Param("id") int userId);
    
    
    
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
