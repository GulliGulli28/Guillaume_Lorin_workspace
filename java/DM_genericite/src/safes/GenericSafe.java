
/**
 * Free to reuse
 */
package safes;
import valuables.Gemstone;
import valuables.NotExpertizeException;
import valuables.Valuable;

import java.util.ArrayList;
import java.util.Iterator;

/**
 * A simple safe
 * @author  ceichler
 */
public class GenericSafe<T extends Valuable> implements Valuable{


	/**
	 * Capacity of the safe (in gemstones)
	 */
	private final int capacity;

	/**
	 * Current number of gems stored in the safe
	 */
	private int currGemNb=0;
	
	/**
	 * Boolean tracking the opened/closed state of the safe
	 */
	protected boolean opened=true;
	
	private int compteur;
	/**
	 * Instantiate a default safe; capacity=1
	 * The safe is built opened and empty
	 */
	public GenericSafe() {
		capacity=1;
		this.compteur = comptage;
		comptage++;
		System.out.println("Default safe constructor");
	}

	int comptage =0;

	public double expertize() throws NotExpertizeException{
		throw new NotExpertizeException(this);
	}
	/**
	 * Instantiate a safe with a specified capacity
	 * The safe is built opened and empty
	 * @param capac capacity of the created safe
	 */
	public GenericSafe(int capac) {
		capacity=capac;
		this.compteur = comptage;
		comptage++;
		System.out.println("Safe constructor with capacity");
	}

	/**
	 * Getter of the property <tt>value</tt>
	 * @return  value the safe's value
	 */

	public double getValue() throws NotExpertizeException{

		double value = 0;
		Iterator<T> iter =myContent.iterator();
		T t =null;
		boolean ex =false;
		while (iter.hasNext()){
			if (t!= null){
				try{
					value += t.getValue();
				}
				catch(NotExpertizeException e){
					t.expertize();
					ex = true;
				}
				if (!ex){
					t = iter.next();
					ex = true;
				}
			}
		}
		return value;
	}
	
	

	/**
	 * Getter of the property <tt>capacity</tt>
	 * @return  capacity the max capacity
	 */
	public int getCapacity() {
		return capacity;
	}

	/**
	 * Getter of the property <tt>opened</tt>
	 * @return  opened
	 */
	public boolean isOpened() {
		return opened;
	}

	/**
	 * Opening the safe
	 */
	public void open(){
		if(opened)System.err.println("Trying to open an opened safe...");
		this.opened=true;
	}
	
	/**
	 * Closing the safe
	 */
	public void close(){
		if(!isOpened())System.err.println("Trying to close a closed safe...");
		this.opened=false;
	}

	/**
	 * Content of the safe
	 */
	private ArrayList<T> myContent = new ArrayList<T>();


	/**
	 * Getter of the property <tt>myContent</tt>
	 * @return  Returns myContent.
	 */
	public ArrayList<T> getMyContent() {
		return myContent;
	}

		
		
	/**
	 * Test wether the safe is full (if it contains a number of stones equal to its capacity)
	 * @return boolean, whether safe is full
	 */
	
	public boolean isFull(){
		return this.currGemNb==this.capacity;			
	}

	/**
	 * Add a gemstone in the safe
	 * @param things the gemstone to add
	 */
	
	public void addGem(T things){
		//Testing whether we can add a things
		//Is the safe opened?
		if(!opened) System.err.println("Impossible to add a things; the safe is closed!");
		//Is it full?
		else if(isFull()) System.err.println("Impossible to add a things; the safe is full!");
		//Is the Gem already in another Safe?
		//else if(things.getMySafe()!=null) System.err.println("Impossible to add a things; it's already in another safe!");
		//Good to go!
		else{
			myContent.add(things);
			//things.setMySafe(this);
			this.currGemNb++;
		}
	}
	
	/**
	 * Removes a gemstone from the safe
	 * @param gem the gemstone to remove
	 */
	
	public void removeGem(T gem){
		//Testing whether we can remove the gem
		//Is the safe opened?
		if(!opened)System.err.println("Impossible to remove gem; the safe is closed!");
		//Good to go!
		else{
			if(myContent.remove(gem)) {
				//gem.setMySafe(null);
				this.currGemNb--;
			}else System.err.println("Impossible to remove the specified gem; it is not in the safe!");
		}
	}

	/**
	 * Recherche une gemstone d'une valeur spécifique minimale
	 * @param value la valeur minimale de la gemstone à retourné
	 * @return Return the Gemstone
	 */
	public T getAGemstone(double value) throws NotExpertizeException{
		Iterator<T> iter =myContent.iterator();
		boolean stop=false;
		T gem=null;
		while (iter.hasNext()&& !stop){
			gem=iter.next();
			if (gem.getValue()>=value){
				stop=true;
			}
		}
		return gem;
	}

	public int compareTo(GenericSafe<T> s1, GenericSafe<T> s2){
		return s1.compteur - s2.compteur;
	}
}