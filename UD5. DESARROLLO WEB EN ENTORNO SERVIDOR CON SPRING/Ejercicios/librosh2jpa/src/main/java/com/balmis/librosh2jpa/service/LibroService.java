package com.balmis.librosh2jpa.service;

import com.balmis.librosh2jpa.model.Libro;
import com.balmis.librosh2jpa.repository.LibroRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


@Service
public class LibroService {
    
    @Autowired
    public LibroRepository userRepository;
    
    // ************************
    // Métodos públicos
    // ************************  
    public List<Libro> findAll() {
        return userRepository.findSqlAll();
    }
    
    public Libro findById(int libroId) {
        return userRepository.findSqlById(libroId);
    }

    public Long count() {
        return userRepository.count();
    }    
    
    public List<Libro> findByIdGrThan(int libroId) {
        return userRepository.findSqlByIdGrThan(libroId);
    }
}
