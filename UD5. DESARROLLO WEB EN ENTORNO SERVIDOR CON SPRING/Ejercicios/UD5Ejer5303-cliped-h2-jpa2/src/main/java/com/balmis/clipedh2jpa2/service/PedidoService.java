package com.balmis.clipedh2jpa2.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.balmis.clipedh2jpa2.model.Pedido;
import com.balmis.clipedh2jpa2.repository.PedidoRepository;


@Service
public class PedidoService {
    
    @Autowired
    public PedidoRepository pedidoRepository;
    
    // ************************
    // Métodos públicos
    // ************************  
    public List<Pedido> findAll() {
        return pedidoRepository.findSqlAll();
    }
    
    public Pedido findById(int pedidoId) {
        return pedidoRepository.findSqlById(pedidoId);
    }

    public Long count() {
        return pedidoRepository.count();
    }    
    
    public List<Pedido> findByIdGrThan(int pedidoId) {
        return pedidoRepository.findSqlByIdGrThan(pedidoId);
    }
    
    
}