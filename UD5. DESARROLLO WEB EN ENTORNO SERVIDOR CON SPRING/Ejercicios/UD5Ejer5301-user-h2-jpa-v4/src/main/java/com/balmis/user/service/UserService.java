
package com.balmis.user.service;

import com.balmis.user.model.User;
import com.balmis.user.repository.UserRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


@Service
public class UserService {
    
    @Autowired
    public UserRepository userRepository;
    
    // ************************
    // Métodos públicos
    // ************************  
    public List<User> findAll() {
        return userRepository.findSqlAll();
    }
    
    public User findById(int userId) {
        return userRepository.findSqlById(userId);
    }

    public Long count() {
        return userRepository.count();
    }    
    
    public List<User> findByIdGrThan(int userId) {
        return userRepository.findSqlByIdGrThan(userId);
    }

    public List<User> findByAgeLessThan(int userAge) {
        return userRepository.findByAgeLessThan(userAge);
    }
    
    public List<User> findByNameContaining(String cadena) {
        return userRepository.findByNameContaining(cadena);
    }

    public List<User> findByEmailContaining(String valor) {
        return userRepository.findByEmailContaining(valor);
    }
}
