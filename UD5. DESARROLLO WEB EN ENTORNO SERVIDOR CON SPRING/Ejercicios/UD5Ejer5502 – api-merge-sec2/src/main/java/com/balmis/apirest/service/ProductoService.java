
package com.balmis.apirest.service;

import com.balmis.apirest.model.Producto;
import java.util.List;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import com.balmis.apirest.repository.ProductoRepository;
import java.math.BigDecimal;
import org.springframework.beans.factory.annotation.Autowired;


@Service
public class ProductoService {
    
    @Autowired
    public ProductoRepository prodRepository;
    
    // ************************
    // CONSULTAS
    // ************************  
    @Transactional(readOnly = true) 
    public List<Producto> findAll() {
        return prodRepository.findSqlAll();
    }
    
    @Transactional(readOnly = true) 
    public Producto findById(int prodId) {
        return prodRepository.findSqlById(prodId);
    }

    @Transactional(readOnly = true) 
    public Long count() {
        return prodRepository.count();
    }    
    
    @Transactional(readOnly = true) 
    public List<Producto> findByIdGrThan(int prodId) {
        return prodRepository.findSqlByIdGrThan(prodId);
    }
    
    // ************************
    // ACTUALIZACIONES
    // ************************  

    @Transactional
    public Producto save(Producto prod) {
        return prodRepository.save(prod);
    }
    
    @Transactional
    public Producto update(int id, Producto prodUpdate) {
        Producto producto = prodRepository.findById(id)
            .orElseThrow(() -> new RuntimeException("Producto no encontrado"));
        
        if (prodUpdate.getDescrip() != null) {
            producto.setDescrip(prodUpdate.getDescrip());
        }
        if (prodUpdate.getPrecio().compareTo(new BigDecimal("0.00")) < 0 )  {
            producto.setPrecio(prodUpdate.getPrecio());
        }
        
        return prodRepository.save(producto);
    }
    
    @Transactional
    public void deleteById(int id) {
        if (!prodRepository.existsById(id)) {
            throw new RuntimeException("Producto no encontrado");
        }
        prodRepository.deleteById(id);
    }        
}
