package com.balmis.librosh2jpa.repository;

import com.balmis.librosh2jpa.model.Libro;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


public interface LibroRepository extends JpaRepository<Libro, Integer> {

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
    @Query(value = "SELECT * FROM libros", nativeQuery = true)
    List<Libro> findSqlAll();
    
    // Consulta con SQL con Objetos (Object[])
    @Query(value = "SELECT * FROM libros WHERE id = :id", nativeQuery = true)
    Libro findSqlById(@Param("id") int userId);

    // Consulta con SQL con Objetos (Object[])
    @Query(value = "SELECT COUNT(*) as libros FROM libros", nativeQuery = true)
    Long countSql();    

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM libros WHERE id > :id", nativeQuery = true)
    List<Libro> findSqlByIdGrThan(@Param("id") int userId);
}
