<p>Each program should be implemented the <a
  href="faq.php?sort=<?=$Sort;?>#sameway"><strong>same&nbsp;way</strong></a> - the same way as this <a href="benchmark.php?test=fannkuch&amp;lang=oberon2&amp;sort=<?=$Sort;?>">Oberon-2</a>. There are better algorithms; we're interested in this particular algorithm.</p>

<p>Each program should</p> 
<ul>
<li>"Take a permutation of {1,...,n}, for example: {4,2,1,5,3}.</li>
<li>Take the first element, here 4, and reverse the order of the first 4 elements: {5,1,2,4,3}.</li>
<li>Repeat this until the first element is a 1, so flipping won't change anything more: {3,4,2,1,5}, {2,4,3,1,5}, {4,2,3,1,5}, {1,3,2,4,5}.</li>
<li>Count the number of flips, here 5.</li>
<li>Do this for all n! permutations, and record the maximum number of flips needed for any permutation.</li>
</ul>
<p>The conjecture is that this maximum count is approximated by n*log(n) when n goes to infinity.</p><p><i>FANNKUCH</i> is an abbreviation for the German word <i>Pfannkuchen</i>, or pancakes, in analogy to flipping pancakes."</p>
<br />

<p>Correct output N = 7 is:</p>
<pre>Pfannkuchen(7) = 16
</pre><br />
<p>Correct output N = 8 is:</p>
<pre>Pfannkuchen(8) = 22
</pre><br />

<p>The fannkuch benchmark is defined in <a href="http://www.apl.jhu.edu/~hall/text/Papers/Lisp-Benchmarking-and-Fannkuch.ps">Performing Lisp Analysis of the FANNKUCH Benchmark</a>, Kenneth R. Anderson and Duane Rettig (26KB postscript)</p>