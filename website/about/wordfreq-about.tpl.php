<p>Each program should do the <a href="faq.php?sort=<?=$Sort;?>#samething"><b>same&nbsp;thing</b></a>.</p>

<p>The word-frequency benchmark measures a <i>real world</i> computing task.</p>

<p>Each program should:</p>
<ul>
<li>read a text file from stdin</li>
<li>extract all the words</li>
<li>convert the words to lowercase</li>
<li>calculate the frequency of each word in the text file</li>
<li>print each word and word frequency, in descending order by frequency and descending alphabetic order by word</li>
</ul>

<p>Correct output for this 170KB <a href="iofile.php?test=<?=$SelectedTest;?>&lang=<?=$SelectedLang;?>&sort=<?=$Sort;?>&file=input">input file</a> is in this 50KB 
<a href="iofile.php?test=<?=$SelectedTest;?>&lang=<?=$SelectedLang;?>&sort=<?=$Sort;?>&file=output">output file</a>.</p>
<br/>

<p>Programs should use constant space over a range of input sizes. Programs may read the input file line-by-line, or with 4096 byte (or smaller) block reads.</p>

<p>The input file to the tests is the text file <i>The Prince</i>, by
  Nicol� Machiavelli.</p>

<p>(The <b>bash</b> program is really a pipeline using <b>tr</b>,
  <b>grep</b>, <b>sort</b> and <b>uniq</b>.  This is the UNIX way of
  combining tools in the shell to get things done.)</p>