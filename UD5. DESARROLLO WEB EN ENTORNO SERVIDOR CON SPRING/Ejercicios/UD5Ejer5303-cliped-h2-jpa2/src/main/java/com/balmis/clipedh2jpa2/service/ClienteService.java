package com.balmis.clipedh2jpa2.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.balmis.clipedh2jpa2.model.Cliente;
import com.balmis.clipedh2jpa2.repository.ClienteRepository;


@Service
public class ClienteService {
    
    @Autowired
    public ClienteRepository clienteRepository;
    
    // ************************
    // Métodos públicos
    // ************************  
    public List<Cliente> findAll() {
        return clienteRepository.findSqlAll();
    }
    
    public Cliente findById(int clienteId) {
        return clienteRepository.findSqlById(clienteId);
    }

    public Long count() {
        return clienteRepository.count();
    }    
    
    public List<Cliente> findByIdGrThan(int clienteId) {
        return clienteRepository.findSqlByIdGrThan(clienteId);
    }    
}


