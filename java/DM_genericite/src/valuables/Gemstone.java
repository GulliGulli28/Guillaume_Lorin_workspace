package valuables;
import java.util.Objects;

import safes.GenericSafe;

/**
 * A precious gemstone
 * @author ceichler
 * @version 1.0
 *
 */
public abstract class Gemstone<T extends Valuable> implements Valuable{
	
	/**
	 * Value of the gemstone
	 */
	protected double value = -1;

	/**
	 * Getter of the property <tt>value</tt>
	 * @return  Returns the value.
	 */
	public double getValue() throws NotExpertizeException {
		if (this.value<0){
            throw new NotExpertizeException(this);
        }
		return value;
	}
	
	/**
	 * Volume of the gemstone
	 */
	private final double volume;

	/**
	 * Getter of the property <tt>volume</tt>
	 * @return  Returns the volume.
	 */
	public double getVolume() {
		return volume;
	}
	

	/**
	 * Constructing a gemstone with some volume and weight
	 * @param myVolume volume of the gemstone
	 */		
	public Gemstone(double myVolume){
		volume=myVolume;	
	}

		
	/**
	* Assess the value of the gemstone 
	*/

	/**
	 * Safe containing the gem
	 */
		private GenericSafe<T> myGenericSafe = null;

	/**
	 * Getter of the property <tt>mySafe</tt>
	 * @return  Returns the mySafe.
	 * @uml.property  name="mySafe"
	 */
	public GenericSafe<T> getMySafe() {
		return myGenericSafe;
	}

	/**
	 * Setter of the property <tt>monSafe</tt>
	 * @param monSafe  The monSafe to set.
	 * @uml.property  name="monSafe"
	 */
	public void setMySafe(GenericSafe<T> myGenericSafe) {
		this.myGenericSafe = myGenericSafe;
	}

	@Override
	public String toString() {
		return this.getClass().getName() + " de volume " + this.getVolume();
	}


	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		long temp;
		temp = Double.doubleToLongBits(value);
		result = prime * result + (int) (temp ^ (temp >>> 32));
		return result;
	}


	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Gemstone other = (Gemstone) obj;
		if (Double.doubleToLongBits(value) != Double.doubleToLongBits(other.value))
			return false;
		return true;
	}

	public int compareTo(Gemstone<T> g1, Gemstone<T> g2){
		String string1= g1.toString();
		String string2 = g2.toString();
		return string1.compareTo(string2);
	}
	

}