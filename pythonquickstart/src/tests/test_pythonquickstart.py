#!/usr/bin/env python2
# -*- coding: utf-8 -*

import unittest


from pythonquickstart import *




class PythonquickstartTestCase(unittest.TestCase):

    def test_empty(self):
        raise Exception("Not implemented")


def suite():
    loader = unittest.TestLoader()
    suite = unittest.TestSuite()
    suite.addTest(loader.loadTestsFromTestCase(PythonquickstartTestCase))
    return suite


if __name__ == '__main__':
    unittest.TextTestRunner(verbosity=2).run(suite())