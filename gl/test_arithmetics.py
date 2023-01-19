from arithmetics import *
import unittest


class Test(unittest.TestCase):
    def test_lcm(self):  # Failed
        assert (0 == lcm(0, 0))

    def test_lcm_better(self):  # Failed
        assert (0 == lcm_better(0, 0))

    def test_lcm_faulty(self):  # Passed
        assert (0 == lcm_faulty(0, 0))

    def test_lcm2(self):  # Passed

        assert (0 == lcm(0, X) for X in range(1, 50))

    def test_lcm_better2(self):  # Passed
        assert (0 == lcm_better(0, X) for X in range(1, 50))

    def test_lcm_faulty2(self):  # Passed
        assert (0 == lcm_faulty(0, X) for X in range(1, 50))

    def test_lcm3(self):  # Failed
        assert (0 == lcm(X, 0) for X in range(1, 50))

    def test_lcm_better3(self):  # Failed
        assert (0 == lcm_better(X, 0) for X in range(50))

    def test_lcm_faulty3(self):  # Passed
        assert (0 == lcm_faulty(X, 0) for X in range(50))

    def test_lcm4(self):  # Passed
        assert (X == lcm(X, X) for X in range(50))

    def test_lcm_better4(self):  # Passed
        assert (X == lcm_better(X, X) for X in range(50))

    def test_lcm_faulty4(self):  # Failed
        assert (X == lcm_faulty(X, X) for X in range(50))

    def test_lcm5(self):  # Failed
        assert (840 == lcm(60, 168))

    def test_lcm_better5(self):  # Failed
        assert (840 == lcm_better(60, 168))

    def test_lcm_faulty5(self):  # Failed
        assert (840 == lcm_faulty(60, 168))

    def test_coverage(self):
        assert (1== lcm(1,1))

if __name__=="__main__":
    unittest.main()
