package com.balmis.apirest.service;

import com.balmis.apirest.model.Usuario;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;
import com.balmis.apirest.repository.UsuarioRepository;
import java.util.ArrayList;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.transaction.annotation.Transactional;


@Service
public class CustomUserDetailsService implements UserDetailsService {

    @Autowired
    private final UsuarioRepository userRepository;

    public CustomUserDetailsService(UsuarioRepository userRepository) {
        this.userRepository = userRepository;
    }

    @Override
    @Transactional(readOnly = true)
    public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
        Usuario usuario = userRepository.findByUsername(username)
                .orElseThrow(() -> new UsernameNotFoundException("Usuario no encontrado con username: " + username));

        // ****************************
        // Crear el UserDetails
        // ****************************
        
        if (!usuario.isActivado()) {
            throw new UsernameNotFoundException("Usuario no encontrado con username: " + username);   
        }
        
        ArrayList<String> rolesArray = new ArrayList<>();
        
        if (usuario.isAdministrador()) {
            rolesArray.add("ADMIN");
        }
        if (usuario.isUsuario()) {
            rolesArray.add("USER");
        }
        if (usuario.isInvitado()) {
            rolesArray.add("GUEST");
        }

        UserDetails userH2 = User
                .withUsername(usuario.getUsername())
                .password(usuario.getPassword())
                .roles(rolesArray.toArray(new String[rolesArray.size()]))
                .build();

        if (userH2!=null) {
            System.out.println();
            System.out.println("Username:"+userH2.getUsername());
            System.out.println("Password:"+userH2.getPassword());
            System.out.println("Roles...:"+rolesArray.toArray().toString());
        } 
        
        return userH2;

    }

    public PasswordEncoder passwordEncoder() {
        return new BCryptPasswordEncoder();
    }
}
