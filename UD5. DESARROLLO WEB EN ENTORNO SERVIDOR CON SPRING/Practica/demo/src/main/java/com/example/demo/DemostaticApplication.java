package com.example.demo;
import java.util.HashMap;
import java.util.Map;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.stereotype.Controller;
// import org.springframework.web.bind.annotation.GetMapping;
// import org.springframework.web.bind.annotation.ResponseBody;

@SpringBootApplication
public class DemostaticApplication {
 public static void main(String[] args) {
 Map<String, Object> props = new HashMap<>();
 props.put("server.port", "8081");
 props.put("server.servlet.context-path", "/demostaticport2");
 SpringApplication app = new SpringApplication(DemostaticApplication.class);
 app.setDefaultProperties(props);
 app.run(args);
 }
}

//@Controller
// public class DemoApplication {

// 	@ResponseBody
// 	@GetMapping("/hola")
// 	public String hola(){
// 		return "Hola Mundo!";
// 	}

// 	public static void main(String[] args) {
// 		SpringApplication.run(DemoApplication.class, args);
// 	}

// }
