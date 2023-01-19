from unittest import TestCase
from arithmetics import lcm, lcm_better, lcm_faulty

class TestLcm(TestCase):
    def test_lcm(self):
        self.assertEqual(lcm(3,2),6)
        self.assertEqual(lcm(5,7),35)
        self.assertEqual(lcm(-3,2),6)
        self.assertEqual(lcm(0,5),0)
        self.assertEqual(lcm(5,0),0)
    def test_lcm_better(self):
        self.assertEqual(lcm_better(3,2),6)
        self.assertEqual(lcm_better(5,7),35)
        self.assertEqual(lcm_better(-3,2),6)
        self.assertEqual(lcm_better(0,5),0)
        self.assertEqual(lcm_better(5,0),0)
    def test_lcm_faulty(self):
        self.assertEqual(lcm_faulty(3,2),6)
        self.assertEqual(lcm_faulty(5,7),35)
        self.assertEqual(lcm_faulty(-3,2),6)
        self.assertEqual(lcm_faulty(0,5),0)
        self.assertEqual(lcm_faulty(5,0),0)
