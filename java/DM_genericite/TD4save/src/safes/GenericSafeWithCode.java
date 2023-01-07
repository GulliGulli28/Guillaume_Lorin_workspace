package safes;

import valuables.Valuable;

/**
 * Coffre protégé par un code
 * @author ceichler
 *
 */
public class GenericSafeWithCode<T extends Valuable> extends GenericSafe<T> {

	/**
	 * Nombre maximal de tentative avant blocage
	 */
	private static final int BRUTEFORCE=3;
	/**
	 * Nombre courrant de tentatives infructueuses consécutives
	 */
	private int cmptAttempt = 0;
	/**
	 * Code secret
	 */
	private int code = 1234;
	
	/**
	 * Construit un coffre avec une valeur de code conventionnelle
	 */
	public GenericSafeWithCode() {
		super();
	}
	
	
	/**
	 * Constructeur de coffre à code
	 * @param capac capacité du coffre en nombre d'objets
	 */
	public GenericSafeWithCode(int capac) {
		super(capac);
	}

	/**
	 * Constructeur de coffre à code
	 * @param capac capacité du coffre en nombre d'objets
	 * @param code code secret permettant d'ouvrir le coffre
	 */
	public GenericSafeWithCode(int capac, int code) {
		super(capac);
		this.code=code;
	}
	
	/**
	 * Changement de code
	 * @param newCode nouveau code
	 * @param currCode code courrant pour des raisons de sécurité
	 */
	public void setCode(int newCode, int currCode) {
		if(this.cmptAttempt< GenericSafeWithCode.BRUTEFORCE && currCode==this.code) this.code = newCode;
		else {
			cmptAttempt++;
			System.err.println("Wrong code");
		}
	}
	
	/**
	 * Ouverture du coffre
	 * @param code code secret
	 */
	public void open(int code) {
		if(checkCode(code)) super.open();
	}
	
	/**
	 * Ouverture du coffre sans code...ne peut pas marcher
	 */
	@Override
	public void open() {
		System.err.println("Wrong usage please a code");
	}
	
	/**
	 * Vérification du coffre et gestion du système anti-bruteforce
	 * @param code le code secret
	 * @return vrai si le code est le bon
	 */
	public boolean checkCode(int code) {
		boolean ok = false;
		if(this.cmptAttempt< GenericSafeWithCode.BRUTEFORCE && code==this.code) {
			ok = true;
			cmptAttempt=0;
		}
		else {
			cmptAttempt++;
			System.err.println("Wrong code");
		}
		return ok;
	}

	/**
	 * Donne la valeur du coffre si le coffre est ouvert
	 * @return  value the safe's value
	 */
	public double getValue(){
		if (this.isOpened()){
			return super.getValue();
		}else {
			System.err.println("Can't get the value : the safe is close");
			return 0;
		}
	}
}
