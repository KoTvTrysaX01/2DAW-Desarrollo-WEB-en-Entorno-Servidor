package com.balmis.transportistas.repository;

import com.balmis.transportistas.model.Vehiculo;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface VehiculoRepository extends JpaRepository<Vehiculo, Integer> {

    @Query(value = "SELECT * FROM vehiculos", nativeQuery = true)
    List<Vehiculo> findSqlAll();

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM vehiculos WHERE id = :id", nativeQuery = true)
    Vehiculo findSqlById(@Param("id") int depId);

    @Query(value = "SELECT * FROM vehiculos WHERE matricula = :matricula", nativeQuery = true)
    Vehiculo findSqlByMatricula(@Param("matricula") String matricula);

    // Consulta con SQL mapeado
    @Query(value = "SELECT COUNT(*) as vehiculos FROM vehiculos", nativeQuery = true)
    Long countSql();
}
