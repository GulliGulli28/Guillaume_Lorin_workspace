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
		
		GenericSafe<Emerald> coffre = new GenericSafe<Emerald>(3);
		Emerald Gus = new Emerald(50);
		Emerald Boy = new Emerald(30);
		Emerald Dude = new Emerald(40);
		coffre.addGem(Gus);
		coffre.addGem(Boy);
		coffre.addGem(Dude);
		System.out.println(coffre.getMyContent());


	}

}