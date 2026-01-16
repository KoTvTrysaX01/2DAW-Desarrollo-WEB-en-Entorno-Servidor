
package com.balmis.clipedh2jpa2.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.balmis.clipedh2jpa2.model.Pedido;


public interface PedidoRepository extends JpaRepository<Pedido, Integer> {

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
    @Query(value = "SELECT * FROM Pedidos", nativeQuery = true)
    List<Pedido> findSqlAll();
    
    // Consulta con SQL 
    @Query(value = "SELECT * FROM Pedidos WHERE id = :id", nativeQuery = true)
    Pedido findSqlById(@Param("id") int pedidoId);

    // Consulta con SQL 
    @Query(value = "SELECT COUNT(*) as Pedidos FROM Pedidos", nativeQuery = true)
    Long countSql();    

    // Consulta con SQL 
    @Query(value = "SELECT * FROM Pedidos WHERE id > :id", nativeQuery = true)
    List<Pedido> findSqlByIdGrThan(@Param("id") int Id);
    
}