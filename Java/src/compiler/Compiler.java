
package compiler;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 * @author  hexnor yokeshrana
 */
public class Compiler {

    public static void main(String[] args) {
        try {
            try {
                 int p=0;
                 String logd="############################################\n#### Cossco Codercup Compiler Server ####### \n############################################ ";
                 
                 while(p<logd.length())
                 {  Thread.sleep(10);
                     System.out.print(logd.charAt(p));
                     p++;
                 }
} catch(InterruptedException ex) {
    Thread.currentThread().interrupt();
}
           
             System.out.println("");
            System.out.println("######## Yokesh Rana  ######\n############################################");
          Scanner sc=new Scanner(System.in);
            //Opening a server port
            String password=sc.nextLine();
            if(password.equals("yokeshrana"))
            {
            
            System.out.println("Enter the port no for server //specified port in php is 3029");
            int port;
            
           port=sc.nextInt();
            int requestno=1;
            
            //now creating a object of server socket
            ServerSocket server=new ServerSocket(port);
            System.out.println("Socket created");
            for(;;){
                //accepting any incoming connetion
                Socket socket=server.accept();
                //now accepting the request and making a seprate thread for managing that request
              Newrequest newrequest=new Newrequest(socket,requestno);
                //now starting the Newrequest newrequest object
                newrequest.start();
               
                
            }
            }else{
                System.out.println("Wrong Password Contact Administrator");
            }
        } catch (IOException ex) {
            ex.printStackTrace();
        
        }
      
        
    }
    
}
