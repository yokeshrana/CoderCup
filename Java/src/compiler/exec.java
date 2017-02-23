
package compiler;

/**
 *
 * @author  hexnor yokeshrana
 */
abstract class exec {

	public boolean timedout = false;
        // method to override when executing a program
	public abstract void execute(); 
        // method to override when compiling a program
	public abstract void compile(); 
	
    
}
