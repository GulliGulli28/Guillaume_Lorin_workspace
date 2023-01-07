import valuables.Valuable;
import valuables.Gemstone;
import safes.GenericSafe;
import safes.GenericSafeWithCode;

public class Main {
    public static void main(String[] args){
        GenericSafe<GenericSafe<Gemstone>> gsg = new GenericSafe<GenericSafe<Gemstone>>(5);
        GenericSafeWithCode<Gemstone> gswc = new GenericSafeWithCode<Gemstone>(5, 1234);
    }
    

}