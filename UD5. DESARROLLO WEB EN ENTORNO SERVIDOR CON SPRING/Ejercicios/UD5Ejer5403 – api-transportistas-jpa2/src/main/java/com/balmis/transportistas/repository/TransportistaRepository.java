package com.balmis.transportistas.repository;

import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import com.balmis.transportistas.model.Transportista;

public interface TransportistaRepository extends JpaRepository<Transportista, Integer>  {

    @Query(value = "SELECT * FROM transportistas", nativeQuery = true)
    List<Transportista> findSqlAll();

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM transportistas WHERE id = :id", nativeQuery = true)
    Transportista findSqlById(@Param("id") int transportistaId);

    // Consulta con SQL mapeado
    @Query(value = "SELECT transportistas.* FROM transportistas, vehiculos WHERE transportistas.vehiculo_id=vehiculos.id AND LOWER(vehiculos.matricula) = LOWER(:matricula)", nativeQuery = true)
    Transportista findSqlByMatricula(@Param("matricula") String transportistaVeh);

    // Consulta con SQL mapeado
    @Query(value = "SELECT * FROM transportistas WHERE LOWER(nombre) LIKE LOWER(CONCAT('%',:nombre,'%'))", nativeQuery = true)
    List<Transportista> findSqlLikeNombre(@Param("nombre") String transportistaNombre);

    // Consulta con SQL mapeado
    @Query(value = "SELECT COUNT(*) as transportistas FROM transportistas", nativeQuery = true)
    Long countSql();

}
