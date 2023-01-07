package valuables;

/**
 * Interface for valuable object 
 * @author ceichler
 *
 */
public interface Valuable {

	/**
	 * 
	 * @return the value of the object
	 */
	public abstract double getValue() throws NotExpertizeException;
	public abstract double expertize() throws NotExpertizeException;
}
