from setuptools import setup, find_packages

setup(name='pythonquickstart',
      version='0.0.0.0',
      author='',
      description='pythonquickstart description',
      long_description=open('README.rst').read(),
      license='LICENSE.txt',
      keywords="",

      # package source directory
      package_dir={'': 'src'},
      packages=find_packages('src', exclude='docs')


    # configure the default command line entry point.
    , entry_points={
          'console_scripts': [
              'pythonquickstart = bin.pythonquickstart:main',
          ]
      }


    # configure the default test suite
    , test_suite='tests.suite'

)