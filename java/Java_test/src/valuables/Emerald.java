package valuables;

public abstract class Emerald extends Gemstone{

    public Emerald(double myVolume){
        super(myVolume);
    }

    public abstract void method();

    @Override
    public void expertize(){
        this.value=20 +10*this.getVolume();
        System.out.println("New value = ",this.value);
    }
}