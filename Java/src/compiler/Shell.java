
package compiler;

/**
 *
 * @author hexnor yokeshrana
 */
class Shell extends Thread {

	exec parent;
	Process p;
	long time;
	
	public Shell(exec parent, Process p, long time){
		this.parent = parent;
		this.p = p;
		this.time = time;
	}
	
	public void run() {
		try {
			sleep(time);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
		try {
			p.exitValue();
			parent.timedout = false;
		} catch (IllegalThreadStateException e) {
			parent.timedout = true;
			p.destroy();
		}
	}
   
    
}
