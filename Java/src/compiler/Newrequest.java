
package compiler;

import static java.awt.PageAttributes.MediaType.C;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import static java.lang.System.out;
import java.net.Socket;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author hexnor yokeshrana
 */
public class Newrequest extends Thread {
	
	Socket s; 
	int n; 
	File dir; 
	
	public Newrequest(Socket s, int n) {
		this.s=s;
		this.n=n;
		
	}
        
        
	
	public void run() {
		
		try {//taking input from sockety
			BufferedReader in = new BufferedReader(new InputStreamReader(s.getInputStream()));
                        //transferring input taken in bufferreader to string 
                        String username=in.readLine();
                        System.out.println(username);
                        String file = in.readLine();
                        //File user=new File(username);
                        //extracting timedshelltime
			int timeout = Integer.parseInt(in.readLine());
                        
                        //reading what user source code
			String contents = in.readLine().replace("$_n_$", "\n");
                       
			String input = in.readLine().replace("$_n_$", "\n");
                        //System.out.println(""+ contents);
			String lang = in.readLine();
			System.out.println("######## New Request Detected ########\n"+"## Username = "+username+"\n## Language Used ="+lang);
                               	System.out.println("\n## Compiling " + file + "...");
			// create the sample input file
                        
                        dir = new File( username+"/" + n);
                        dir.mkdirs(); 
			PrintWriter writer = new PrintWriter(new FileOutputStream(username+"/" + n +"/in.txt"));
			writer.println(input);
			writer.close();
			exec l = null;
			// create the language specific compiler
			if(lang.equals("c"))
				l = new C(file, timeout, contents, dir.getAbsolutePath());
			else if(lang.equals("cpp"))
				l = new Cpp(file, timeout, contents, dir.getAbsolutePath());
			else if(lang.equals("java"))
				l = new Java(file, timeout, contents, dir.getAbsolutePath());
                        else if(lang.equals("python"))
				l = new Python(file, timeout, contents, dir.getAbsolutePath());
                        else System.out.println("Wrong Language by user "+username);
			l.compile(); // compile the file
			String errors = compileErrors();
                        
                          //now preparing what to reply with context to request
			PrintWriter out = new PrintWriter(s.getOutputStream(), true);
			if(!errors.equals("")) { // check for compilation errors
				out.println("0");
				out.println(errors);
			} else {
				// execute the program and return output
				l.execute();
				if(l.timedout)
					out.println(2);
				else {
					out.println("1");
					out.println(execMsg());
				}
			}
			s.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	public String compileErrors() {
		String line, content = "";
		try {
			BufferedReader fin = new BufferedReader(new InputStreamReader(new FileInputStream(dir.getAbsolutePath() + "/err.txt")));
			while((line = fin.readLine()) != null)
				content += (line + "\n");
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return content.trim();
	}
	
	public String execMsg() {
		String line, content = "";
		try {
			BufferedReader fin = new BufferedReader(new InputStreamReader(new FileInputStream(dir.getAbsolutePath() + "/out.txt")));
			while((line = fin.readLine()) != null)
				content += (line + "\n");
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return content.trim();
	}
        
}
        
        
        
        
        
        
        
        
        
        
      