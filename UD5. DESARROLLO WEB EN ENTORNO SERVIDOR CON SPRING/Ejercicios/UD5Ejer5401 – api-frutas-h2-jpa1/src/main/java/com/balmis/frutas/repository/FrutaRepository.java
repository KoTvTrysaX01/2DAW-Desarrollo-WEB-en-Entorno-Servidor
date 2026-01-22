package com.balmis.frutas.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.balmis.frutas.model.Fruta;

public interface FrutaRepository extends JpaRepository<Fruta, Integer> {

    @Query(value = "SELECT * FROM frutas", nativeQuery = true)
    List<Fruta> findSqlAll();

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM frutas WHERE id = :id", nativeQuery = true)
    Fruta findSqlById(@Param("id") int frutas);

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM frutas WHERE LOWER(nombre) LIKE LOWER(CONCAT('%',:nombre,'%'))", nativeQuery = true)
    List<Fruta> findSqlLikeNombre(@Param("nombre") String frutaNombre);

    // Consulta con SQL mapeado
    @Query(value = "SELECT COUNT(*) as frutas FROM frutas", nativeQuery = true)
    Long countSql();
}
