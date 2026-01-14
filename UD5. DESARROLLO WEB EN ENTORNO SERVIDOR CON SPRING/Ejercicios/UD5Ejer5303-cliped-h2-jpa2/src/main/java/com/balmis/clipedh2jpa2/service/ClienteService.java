package com.balmis.clipedh2jpa2.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.balmis.clipedh2jpa2.model.Cliente;
import com.balmis.clipedh2jpa2.repository.ClienteRepository;


@Service
public class ClienteService {
    
    @Autowired
    public ClienteRepository roleRepository;
    
    // ************************
    // Métodos públicos
    // ************************  
    public List<Cliente> findAll() {
        return roleRepository.findSqlAll();
    }
    
    public Cliente findById(int userId) {
        return roleRepository.findSqlById(userId);
    }

    public Long count() {
        return roleRepository.count();
    }    
    
    public List<Cliente> findByIdGrThan(int userId) {
        return roleRepository.findSqlByIdGrThan(userId);
    }    
}


