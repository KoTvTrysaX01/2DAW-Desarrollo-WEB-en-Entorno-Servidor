package com.balmis.transportistas.service;

import com.balmis.transportistas.model.Vehiculo;
import com.balmis.transportistas.repository.VehiculoRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class VehiculoService {
    @Autowired
    public VehiculoRepository vehiculoRepository;

    // ************************
    // CONSULTAS
    // ************************
    @Transactional(readOnly = true)
    public List<Vehiculo> findAll() {
        return vehiculoRepository.findSqlAll();
    }

    @Transactional(readOnly = true)
    public Vehiculo findById(int depId) {
        return vehiculoRepository.findSqlById(depId);
    }

    @Transactional(readOnly = true)
    public Vehiculo findByMatricula(String matricula) {
        return vehiculoRepository.findSqlByMatricula(matricula);
    }

    @Transactional(readOnly = true)
    public Long count() {
        return vehiculoRepository.count();
    }

    // ************************
    // ACTUALIZACIONES
    // ************************

    @Transactional
    public Vehiculo save(Vehiculo veh) {
        return vehiculoRepository.save(veh);
    }

    @Transactional
    public Vehiculo update(int id, Vehiculo vehDetails) {
        Vehiculo veh = vehiculoRepository.findSqlById(id);
        if (veh == null) {
            throw new RuntimeException("Vehiculo no encontrado");
        }

        if (vehDetails.getMatricula() != null) {
            veh.setMatricula(vehDetails.getMatricula());
        }

        if (vehDetails.getTipo() != null) {
            veh.setTipo(vehDetails.getTipo());
        }

        veh.setCapacidad_carga(vehDetails.getCapacidad_carga());

        return vehiculoRepository.save(veh);
    }

    @Transactional
    public void deleteById(int id) {
        if (!vehiculoRepository.existsById(id)) {
            throw new RuntimeException("Vehiculo no encontrado");
        }
        vehiculoRepository.deleteById(id);
    }
}
