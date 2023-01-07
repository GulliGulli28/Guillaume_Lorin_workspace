package fonctions;

public class TestException {
	
	private static int a = 2;
	private static int b = 0;
	

	public TestException() {
		System.out.println("Passe-t-on par le constructeur?");
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {

		System.out.println("Division par zéro");
		System.out.println(a + " " + b + " " + a/b);
		System.out.println("END DIV / 0");
		
		
		System.out.println("Whistle tab");
		Whistleblower whis = new Whistleblower();
		
		//whis.listInit(-1);
		//whis.readWrite("fichierTest");
	}

}
