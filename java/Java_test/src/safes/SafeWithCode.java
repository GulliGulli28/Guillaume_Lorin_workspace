package safes;

public class SafeWithCode extends Safe{

    private static final int BRUTEFORCE =3;
    private int cmptAttempt=0;
    private int code =1234;
    public SafeWithCode(){
        super();
    }

    public SafeWithCode(int capac){
        super(capac);
    }

    public SafeWithCode(int capac, int code){
        super(capac);
        this.code = code;
    }

    public void setCode(int newCode, int currCode){
        if (this.cmptAttempt< SafeWithCode.BRUTEFORCE && currCode == this.code) this.code = newCode;
        else{
            cmptAttempt++;
        System.err.println("Wrong code");
        }
    }

    @Override
    public void open(){
        System.err.println("Wrong usage, pls enter a code");
    }

    public boolean checkCode(int code){
        boolean ok =false;
        if (code == this.code && this.cmptAttempt< SafeWithCode.BRUTEFORCE){ 
            ok =true;
            this.cmptAttempt =0;
        }
        else{
            System.err.println("Wrong code");
        }
        return ok;
    }

    public void open(int code){
        if (checkCode(code)) super.open();
    }
}