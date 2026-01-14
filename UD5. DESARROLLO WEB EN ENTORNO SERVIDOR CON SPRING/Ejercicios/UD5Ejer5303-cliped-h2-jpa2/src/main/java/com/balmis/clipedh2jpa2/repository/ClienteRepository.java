package com.balmis.clipedh2jpa2.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.balmis.clipedh2jpa2.model.Cliente;

public interface ClienteRepository extends JpaRepository<Cliente, Integer> {

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

    // Consulta con SQL 
    @Query(value = "SELECT * FROM Clientes", nativeQuery = true)
    List<Cliente> findSqlAll();

    // Consulta con SQL 
    @Query(value = "SELECT * FROM Clientes WHERE id = :id", nativeQuery = true)
    Cliente findSqlById(@Param("id") int userId);

    // Consulta con SQL 
    @Query(value = "SELECT COUNT(*) as Clientes FROM Clientes", nativeQuery = true)
    Long countSql();    

    // Consulta con SQL 
    @Query(value = "SELECT * FROM Clientes WHERE id > :id", nativeQuery = true)
    List<Cliente> findSqlByIdGrThan(@Param("id") int clienteId);
}