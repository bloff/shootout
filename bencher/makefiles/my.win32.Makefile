# The Computer Language Benchmarks Game
# $Id: my.win32.Makefile,v 1.4 2010-03-09 20:36:50 igouy-guest Exp $

# ASSUME each program will build in a clean empty tmpdir
# ASSUME there's a copy of the program source in tmpdir

# ASSUME there are copies to helper files in tmpdir
# ASSUME no responsibility for removing temporary files from tmpdir

# TYPICAL actions include an initial copy to give the expected extension

# ASSUME environment variables for compilers and interpreters are set in the header



COPTS := -O3 -fomit-frame-pointer



############################################################
# ACTIONS for specific language implementations
############################################################


########################################
# Python
########################################



%.compiledpython_run: %.compiledpython
	-copy $< $*.py
	-$(PYTHON) -OO -c "from py_compile import compile; compile('$*.py')"


# (For multiprocessing make sure the extension is .py)

#%.python_run: %.python
#	-copy $< $*.py



########################################
# java
########################################

%.java_run: %.java 
	-copy $< $(TEST).java
	-$(JDKC) $(TEST).java

%.javaxint_run: %.javaxint 
	-copy $< $(TEST).java
	-$(JDKC) $(TEST).java
