<p>Each program should calculate this TAK function using the same na&#239ve floating-point recursive-algorithm</p>
<pre>
TAK(x,y,z)
  y < x   = TAK(TAK(x-1.0,y,z),TAK(y-1.0,z,x),TAK(z-1.0,x,y))
  y >= x  = z
</pre>
<br />
<p>Calculate TAK(N&#215;3.0, N&#215;2.0, N&#215;1.0). Correct output N = 7 is: </p>
<pre>14.0
</pre><br />
<p>Correct output N = 8 is:</p>
<pre>9.0
</pre><br />
<p>Correct output N = 9 is:</p>
<pre>18.0
</pre><br />
<p>Correct output N = 10 is:</p>
<pre>11.0
</pre><br />

<p>The tak benchmark is described in <a href="http://www.dreamsongs.com/NewFiles/Timrep.pdf">Performance and Evaluation of Lisp Systems</a>, Richard P. Gabriel, 1985, page 81. (1.1MB pdf)</p>


<p>For more information see Eric W. Weisstein, "TAK Function." From <a href="http://mathworld.wolfram.com"><em>MathWorld</em></a>--A Wolfram Web Resource.<br/><a href="http://mathworld.wolfram.com/TAKFunction.html">http://mathworld.wolfram.com/TAKFunction.html</a></p>

