package fonctions;

/**
 * Une classe pas très utile servant à ajouter un niveau de profondeur à la call stack
 * @author ceichler
 *
 */
public class UselessInterm {
	
	private Whistleblower whis = new Whistleblower();

	/**
	 * Ecrit bonjour dans un fichier dont le nom est passé en paramètre
	 */
	public void readWrite(String fileName){
		whis.readWrite(fileName);
		
	}
	
	/**
	 * Initialise un tableau
	 * tab[i] = i pour firstIndex -1 < i < size
	 * @param firstIndex
	 */
	public void listInit(int firstIndex){
		whis.listInit(firstIndex);
	}
	
	/**
	 * Initialise un tableau et écrit bonjour dans un fichier passé en paramètre
	 * @param i index à partir duquel initialiser
	 * @param fileName
	 */
	public void initAndWrite(int i, String fileName) {
		this.listInit(i);
		this.readWrite(fileName);
	}

}
