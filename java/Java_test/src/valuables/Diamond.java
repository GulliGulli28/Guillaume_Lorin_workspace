package valuables;

public class Diamond extends Gemstone{
    public Diamond(myVolume){
        super(myVolume);
    }

    @Override
    public void expertize(){
        this.value = 1000*this.getVolume();
    }
}