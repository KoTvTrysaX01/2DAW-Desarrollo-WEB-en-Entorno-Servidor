
package com.balmis.apirest.service;

import com.balmis.apirest.model.Empleado;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import com.balmis.apirest.repository.EmpleadoRepository;


@Service
public class EmpleadoService {
    
    @Autowired
    public EmpleadoRepository empleadoRepository;
    
    // ************************
    // CONSULTAS
    // ************************  
    @Transactional(readOnly = true) 
    public List<Empleado> findAll() {
        return empleadoRepository.findSqlAll();
    }

    @Transactional(readOnly = true) 
    public Empleado findById(int empleadoId) {
        return empleadoRepository.findSqlById(empleadoId);
    }

    @Transactional(readOnly = true) 
    public List<Empleado> findByDep(String empleadoDep) {
        return empleadoRepository.findSqlByDep(empleadoDep);
    }
    
    @Transactional(readOnly = true) 
    public List<Empleado> findLikeNombre(String empleadoNombre) {
        return empleadoRepository.findSqlLikeNombre(empleadoNombre);
    }

    @Transactional(readOnly = true) 
    public Long count() {
        return empleadoRepository.count();
    }    
    
    // ************************
    // ACTUALIZACIONES
    // ************************  

    @Transactional
    public Empleado save(Empleado empleado) {
        return empleadoRepository.save(empleado);
    }
    
    @Transactional
    public Empleado update(int id, Empleado empleadoDetails) {
        Empleado empleado = empleadoRepository.findSqlById(id);
        if (empleado==null) {
            throw new RuntimeException("Empleado no encontrado");
        }
        
        if (empleadoDetails.getNombre()!= null) {
            empleado.setNombre(empleadoDetails.getNombre());
        }

        if (empleadoDetails.getDep()!= null) {
            empleado.setDep(empleadoDetails.getDep());
        }

        if (empleadoDetails.getEmail()!= null) {
            empleado.setEmail(empleadoDetails.getEmail());
        }

        if (empleadoDetails.getEdad() >= 0) {
            empleado.setEdad(empleadoDetails.getEdad());
        }
        
        return empleadoRepository.save(empleado);
    }
    
    @Transactional
    public void deleteById(int id) {
        if (!empleadoRepository.existsById(id)) {
            throw new RuntimeException("Empleado no encontrado");
        }
        empleadoRepository.deleteById(id);
    }    
}
