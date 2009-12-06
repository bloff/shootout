<?   // Copyright (c) Isaac Gouy 2004-2009 ?>

<? 
MkMenuForm($Tests,$SelectedTest,$Langs,$SelectedLang,"fullcpu"); 
$TestName = $Tests[$SelectedTest][TEST_NAME];
$LangName = $Langs[$SelectedLang][LANG_FULL];
$P = $SelectedLang.'-'.$Id;
?>

<h2><a href="#prog" name="prog">&nbsp;<?=$Title;?> measurements</a></h2>

<p>This table shows 5 <em>measurements</em> - <a href="help.php#measurecpu">CPU&nbsp;Time</a>, <a href="help.php#measurecpu">Elapsed&nbsp;Time</a>, <a href="help.php#memory">Memory</a>, <a href="help.php#gzbytes">Code</a> and <a href="help.php#loadstring">~&nbsp;CPU&nbsp;Load</a>.</p>

<p>Each table row shows, for this <?=$LangName;?> program, performance measurements made with a particular <a href="help.php#nmeans">command-line input value N</a>.</p>

<table>
<colgroup span="4" class="num"></colgroup>
<tr>
<th><a href="help.php#nmeans">&nbsp;N&nbsp;</a></th>
<th><a href="help.php#measurecpu">CPU&nbsp;secs</a></th>
<th><a href="help.php#measurecpu">Elapsed&nbsp;secs</a></th>
<th><a href="help.php#memory">Memory&nbsp;KB</a></th>
<th><a href="help.php#gzbytes">Code B</a></th>
<th><a href="help.php#loadstring">~&nbsp;CPU&nbsp;Load</a></th>
</tr>
<?
foreach($Data as $d){
      if ($Id==$d[DATA_ID]){
         if ($d[DATA_TESTVALUE]>0){ $n = number_format((double)$d[DATA_TESTVALUE]); } else { $n = '&nbsp;'; }
         if ($d[DATA_STATUS]<0){
            $kb = '&nbsp;'; $fullcpu = '&nbsp;';$elapsed = '&nbsp;'; $load = '&nbsp;';
            $fullcpu = StatusMessage($d[DATA_STATUS]);
         } else {
            if ($d[DATA_MEMORY]==0){
               $kb = '?';
            } else {
               if ($TestName=='startup'){ $kb = '&nbsp;'; }
               else { $kb = number_format((double)$d[DATA_MEMORY]); }
            }
            $fullcpu = number_format($d[DATA_FULLCPU],2);
            $elapsed = ElapsedTime($d);
            $load = CpuLoad($d);
         }

         printf('<tr class="a"><td class="r">%s</td><td class="r">%s</td><td class="r">%s</td><td class="r">%s</td><td class="r">%d</td><td class="r">&nbsp;&nbsp;%s</td></tr>',
            $n,$fullcpu,$elapsed,$kb,$d[DATA_GZ],$load); echo "\n";
            
         if ($d[DATA_STATUS]<0){ break; }
      }
}
?>
</table>

<p>Read the <a href="#log">&darr;&nbsp;make, command line, and program output logs</a> for more details.</p>


<h2><a href="#sourcecode" name="sourcecode">&nbsp;<?=$Title;?> source code</a></h2>

<pre><?=$Code;?></pre>

<h3><a href="#about" name="about">&nbsp;notes</a></h3>
<?=$About;?>

<h3><a href="#log" name="log">&nbsp;make, command-line, and program output logs</a></h3>
<pre><?=$Log;?></pre>


