package clients;
import safes;
import valuables;

public class Clients{
    private int budget = 1000;

    public Client(){

    }

    public Client(int bud){
        this.budget = bud;
    }

    public void acheter(Valuables v){
        if (this.budget >= v.getValue()){
            this.budget -=v.getValue();
        }
    }
}