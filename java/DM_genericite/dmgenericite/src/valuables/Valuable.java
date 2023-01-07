package valuables;
import safes.Storable;

/**
 * Interface for valuable object 
 * @author ceichler
 *
 */
public interface Valuable extends Storable{

	/**
	 * 
	 * @return the value of the object
	 */
	public abstract double getValue();
}
