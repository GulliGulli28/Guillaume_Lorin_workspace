package valuables;
import safes.GenericSafe;
import java.io.IOException;

public class NotExpertizeException extends Exception {
    public Gemstone<?> g;
    public GenericSafe<?> s;

    public NotExpertizeException(Gemstone<?> g){
        System.out.println(g + "is not Expertize");
    }

    public NotExpertizeException(GenericSafe<?> s){

        System.out.println(s + "is not Expertize");
    }
}