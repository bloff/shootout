<p><strong>diff</strong> program output N = 10 with this <a href="iofile.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;file=output">output file</a> to check your program is correct before contributing.
</p>

<p>Each program should create, keep alive, and <em>send integer messages</em> between N explicitly-linked threads. Programs may use kernel threads, lightweight threads, cooperative threads&#8230;</p>

<p>Each program should</p>
<ul>
   <li>create 500 threads - each thread should
      <ul>
      <li>hold and use a reference to the next thread</li>      
      <li>take, and increment, an integer message</li>
      <li>put the incremented message on the next thread</li>
      </ul>
   </li>  
   <li>N times
      <ul>
      <li>put the integer message 0 on the first thread</li>     
      <li>add the message taken and incremented by the last thread to a sum</li>         
      </ul>
   </li>                     
   <li>print the sum of incremented integer messages - a count of takes</li>
</ul>

<p>Similar benchmarks are described in <a href="http://www.sics.se/~joe/ericsson/du98024.html">Performance Measurements of Threads in Java and Processes in Erlang, 1998;</a> and <a href="http://www.cl.cam.ac.uk/users/mr/Cobench.html">A Benchmark Test for BCPL Style Coroutines, 2004.</a> 
For some language implementations increasing the number of threads quickly results in <a href="http://www.mozart-oz.org/documentation/apptut/node9.html#chapter.concurrency.cheap">Death by Concurrency</a>.</p>
