
package com.balmis.user.repository;

import com.balmis.user.model.User;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


public interface UserRepository extends JpaRepository<User, Integer> {

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

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM users", nativeQuery = true)
    List<User> findSqlAll();
    
    // Consulta con SQL con Objetos (Object[])
    @Query(value = "SELECT * FROM users WHERE id = :id", nativeQuery = true)
    User findSqlById(@Param("id") int userId);

    // Consulta con SQL con Objetos (Object[])
    @Query(value = "SELECT COUNT(*) as users FROM users", nativeQuery = true)
    Long countSql();    

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM users WHERE id > :id", nativeQuery = true)
    List<User> findSqlByIdGrThan(@Param("id") int userId);

    @Query(value = "SELECT * FROM users WHERE age < :age", nativeQuery = true)
    List<User> findByAgeLessThan(@Param("age") int userAge);
    
    @Query(value = "SELECT * FROM users WHERE UPPER(name) LIKE CONCAT('%', UPPER(:cadena), '%')", nativeQuery = true)
    List<User> findByNameContaining(@Param("cadena") String cadena);

    @Query(value = "SELECT * FROM users WHERE UPPER(email) LIKE CONCAT('%@', UPPER(:valor), '.%')", nativeQuery = true)
    List<User> findByEmailContaining(@Param("valor") String valor);
}
