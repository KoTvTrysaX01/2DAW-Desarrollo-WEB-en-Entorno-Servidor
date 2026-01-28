package com.balmis.transportistas.service;

import com.balmis.transportistas.model.Vehiculo;
import com.balmis.transportistas.model.Transportista;
import com.balmis.transportistas.repository.VehiculoRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import com.balmis.transportistas.repository.TransportistaRepository;

@Service
public class TransportistaService {
    @Autowired
    public TransportistaRepository transportistaRepository;

    @Autowired
    public VehiculoRepository vehiculoRepository;

    // ************************
    // CONSULTAS
    // ************************
    @Transactional(readOnly = true)
    public List<Transportista> findAll() {
        return transportistaRepository.findSqlAll();
    }

    @Transactional(readOnly = true)
    public Transportista findById(int transportistaId) {
        return transportistaRepository.findSqlById(transportistaId);
    }

    @Transactional(readOnly = true)
    public Transportista findByMatricula(String matricula) {
        return transportistaRepository.findSqlByMatricula(matricula);
    }

    @Transactional(readOnly = true)
    public List<Transportista> findLikeNombre(String transportistaNombre) {
        return transportistaRepository.findSqlLikeNombre(transportistaNombre);
    }

    @Transactional(readOnly = true)
    public Long count() {
        return transportistaRepository.count();
    }

    // ************************
    // ACTUALIZACIONES
    // ************************

    @Transactional
    public Transportista save(Transportista transportista) {
        return transportistaRepository.save(transportista);
    }

    @Transactional
    public Transportista update(int id, Transportista transportistaDetails) {
        Transportista transportista = transportistaRepository.findSqlById(id);
        if (transportista == null) {
            throw new RuntimeException("Transportista no encontrado");
        }

        if (transportistaDetails.getNombre() != null) {
            transportista.setNombre(transportistaDetails.getNombre());
        }

        if (transportistaDetails.getTipo_licencia() != null) {
            transportista.setTipo_licencia(transportistaDetails.getTipo_licencia());
        }

        if (transportistaDetails.getExperiencia() >= 0) {
            transportista.setExperiencia(transportistaDetails.getExperiencia());
        }

        return transportistaRepository.save(transportista);
    }

    @Transactional
    public void deleteById(int id) {
        if (!transportistaRepository.existsById(id)) {
            throw new RuntimeException("Transportista no encontrado");
        }
        transportistaRepository.deleteById(id);
    }

    @Transactional
    public Transportista asignarDepartamento(int tranId, int vehId) {
        Transportista tran = transportistaRepository.findSqlById(tranId);

        Vehiculo veh = vehiculoRepository.findSqlById(vehId);

        if ((tran != null) && (veh != null)) {
            tran.setVehiculo(veh);
            return transportistaRepository.save(tran);
        } else {
            return null;
        }
    }

    @Transactional
    public Transportista desasignarDepartamento(int tranId) {
        Transportista tran = transportistaRepository.findSqlById(tranId);

        if (tran != null) {
            tran.setVehiculo(null);
            return transportistaRepository.save(tran);
        } else {
            return null;
        }
    }
}
