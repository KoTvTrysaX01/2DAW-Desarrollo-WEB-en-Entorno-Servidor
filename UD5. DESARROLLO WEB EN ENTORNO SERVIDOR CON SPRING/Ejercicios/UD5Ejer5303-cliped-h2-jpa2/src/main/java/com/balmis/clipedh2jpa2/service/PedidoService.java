package com.balmis.clipedh2jpa2.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.balmis.clipedh2jpa2.model.Pedido;
import com.balmis.clipedh2jpa2.repository.PedidoRepository;


@Service
public class PedidoService {
    
    @Autowired
    public PedidoRepository userRepository;
    
    // ************************
    // Métodos públicos
    // ************************  
    public List<Pedido> findAll() {
        return userRepository.findSqlAll();
    }
    
    public Pedido findById(int userId) {
        return userRepository.findSqlById(userId);
    }

    public Long count() {
        return userRepository.count();
    }    
    
    public List<Pedido> findByIdGrThan(int userId) {
        return userRepository.findSqlByIdGrThan(userId);
    }
    
    
}