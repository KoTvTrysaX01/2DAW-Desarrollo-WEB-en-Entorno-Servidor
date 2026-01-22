package com.balmis.frutas.service;

import com.balmis.frutas.model.Fruta;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import com.balmis.frutas.repository.FrutaRepository;

@Service
public class FrutaService {
    @Autowired
    public FrutaRepository frutaRepository;

    @Transactional(readOnly = true)
    public List<Fruta> findAll() {
        return frutaRepository.findSqlAll();
    }

    @Transactional(readOnly = true)
    public Fruta findById(int frutaId) {
        return frutaRepository.findSqlById(frutaId);
    }

    @Transactional(readOnly = true)
    public List<Fruta> findLikeNombre(String frutaNombre) {
        return frutaRepository.findSqlLikeNombre(frutaNombre);
    }

    @Transactional(readOnly = true)
    public Long count() {
        return frutaRepository.count();
    }

    @Transactional
    public Fruta save(Fruta fruta) {
        return frutaRepository.save(fruta);
    }

    @Transactional
    public Fruta update(int id, Fruta frutaDetails) {
        Fruta fruta = frutaRepository.findSqlById(id);
        if (fruta == null) {
            throw new RuntimeException("Empleado no encontrado");
        }

        if (frutaDetails.getNombre() != null) {
            fruta.setNombre(frutaDetails.getNombre());
        }

        if (frutaDetails.getKg() <= 0) {
            fruta.setKg(frutaDetails.getKg());
        }

        if (frutaDetails.getPrecio() <= 0) {
            fruta.setPrecio(frutaDetails.getPrecio());
        }
        return frutaRepository.save(fruta);
    }

    @Transactional
    public void deleteById(int id) {
        if (!frutaRepository.existsById(id)) {
            throw new RuntimeException("Fruta no encontrado");
        }
        frutaRepository.deleteById(id);
    }
}
