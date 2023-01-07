package safes;

public interface Storable<T extends Containers>{
    public abstract Containers getMySafe();
    public abstract void setMySafe();  
    public abstract double getValue();  
}
