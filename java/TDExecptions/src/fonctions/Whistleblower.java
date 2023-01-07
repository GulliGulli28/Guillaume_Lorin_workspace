package fonctions;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;

/**
 * Une classe qui lance des alertes (des exceptions)
 * @author ceichler
 *
 */
public class Whistleblower {
	
	/**
	 * Une liste 
	 */
	ArrayList<Integer> list = new ArrayList<Integer>(10);
	
	/**
	 * Un entier qui servira à lancer des exceptions
	 */
	int ref;

	public Whistleblower(){}
	
	public Whistleblower(int ref){
		this.ref = ref;
	}

	/**
	 * Ecrit bonjour dans un fichier dont le nom est passé en paramètre
	 */
	public void readWrite(String fileName){
		
		boolean ok = false;
		int i = 0;

		File file = new File(fileName);
		/*
		FileWriter fileWriter=new FileWriter(file, true);
		fileWriter.write("Bonjour fichier");
		fileWriter.close();
		*/


	}
	
	/**
	 * Initialise list
	 * list.get(i) = i pour firstIndex -1 < i < size
	 * @param firstIndex
	 */
	public void listInit(int firstIndex){
		for(int i = firstIndex; i< list.size(); i++) list.set(i, i);
	}
}
