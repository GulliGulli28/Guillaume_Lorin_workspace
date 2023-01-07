package geometrie;

public class Rectangle extends Quadrilateral;{

    public void Rectangle(){
        super();
        System.out.println("Rectangle Constructor");
    }

    public void draw(Point p){
        System.out.println("Drawing a rectangle");
    }

    @Override
    public double getPerimeter(){
        System.out.println("Computing the perimeter of a rectangle");
        return 2*(this.getTheSegments()[1] + this.getTheSegments()[2]);
    }
}