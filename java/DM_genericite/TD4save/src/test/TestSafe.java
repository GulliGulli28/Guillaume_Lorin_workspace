/**
 * 
 */
package test;

import safes.*;
import valuables.*;

/**
 * @author ceichler
 *
 */
public class TestSafe {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		
		//Uncomment to synchronyze system out and err
		//System.setErr(System.out);

		//Let's create a safe with a capacity of 2 gems
		GenericSafe myGenericSafe;
		myGenericSafe = new SafeWithCode(2, 2345);
		myGenericSafe.close();
		((SafeWithCode) myGenericSafe).open(2345);
		System.out.println(myGenericSafe.isOpened());
		
		Gemstone g = new Emerald(6);
		g.expertize();

		Gemstone g2 = new Diamond(2);
		g2.expertize();
		System.out.println(g2.getValue());
		myGenericSafe.addGem(g);
		
		System.out.println(g2);
		
	}

}