package valuables;
import safes;

public abstract class Gemstone{
    public abstract void expertize();

    @Override
    public String toString(){
        return this.getClass() + "de volume" + this.getVolume;
    }
}