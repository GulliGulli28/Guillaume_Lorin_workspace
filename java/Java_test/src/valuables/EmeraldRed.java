package valuables;

public class EmeraldRed extends Emerald{
    public EmeraldRed(){
        super(12);
    }

    public void expertize(){
        System.out.println("coucou");
    }

    public void method(){
        this.expertize();
    }
}