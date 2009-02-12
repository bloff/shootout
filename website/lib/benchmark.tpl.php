<?   // Copyright (c) Isaac Gouy 2004-2009 ?>

<? 
MkMenuForm($Tests,$SelectedTest,$Langs,$SelectedLang,$Sort); 
$Row = $Tests[$SelectedTest];
$TestName = $Row[TEST_NAME];
$TestTag = $Row[TEST_TAG];

list($Accepted,$Rejected,$Special) = FilterAndSortData($Langs,$Data,$Sort,$Excl);

if (sizeof($Accepted)>0){ $P1 = $Accepted[0][DATA_LANG].'-'.$Accepted[0][DATA_ID]; }
else { $P1 = ''; }

if (sizeof($Accepted)>1){ $P2 = $Accepted[1][DATA_LANG].'-'.$Accepted[1][DATA_ID]; }
else { $P2 = ''; }

if (sizeof($Accepted)>2){ $P3 = $Accepted[2][DATA_LANG].'-'.$Accepted[2][DATA_ID]; }
else { $P3 = ''; }

if (sizeof($Accepted)>3){ $P4 = $Accepted[3][DATA_LANG].'-'.$Accepted[3][DATA_ID]; }
else { $P4 = ''; }

$NString = 'N=?';
$testValue = 1;
foreach($Accepted as $d){
   if ($d[DATA_TESTVALUE]>0){
      $testValue = (double)$d[DATA_TESTVALUE];
      $NString = 'N='.number_format($testValue);
      break; }
}

// BEWARE - Hard coded values - BEWARE

if ($TestName=='fasta'||$TestName=='k-nucleotide'||
      $TestName=='reverse-complement'||$TestName=='regex-dna'){
   if ($d[DATA_TESTVALUE] == 25000000) { $NString = '~240MB '.$NString; }
   elseif ($d[DATA_TESTVALUE] == 2500000) { $NString = '~24MB '.$NString; }
   elseif ($d[DATA_TESTVALUE] == 5000000) { $NString = '~50MB '.$NString; }
   elseif ($d[DATA_TESTVALUE] == 1000000) { $NString = '~10MB '.$NString; }
   elseif ($d[DATA_TESTVALUE] == 500000) { $NString = '~5MB '.$NString; }
   }

if ($TestName=='startup'){ $NString = ''; }
?>


<h2><a href="#bench" name="bench">&nbsp;<?=$TestName;?> <?=TESTS_PHRASE;?></a></h2>
<p>Read <a href="#about" title="Read about the <?=$TestName;?> benchmark">&darr;&nbsp;<strong>the benchmark rules</strong></a>.
<?=$TestTag;?> <?=$NString;?>&nbsp;(Check that Error or Timeout happened at other values of N with <a href="fulldata.php?test=<?=$SelectedTest;?>&amp;p1=<?=$P1;?>&amp;p2=<?=$P2;?>&amp;p3=<?=$P3;?>&amp;p4=<?=$P4;?>"
title="Check all the data for the <?=$TestName;?> <?=TESTS_PHRASE;?>"><?=$TestName;?> full data</a>).
</p>

<? list($dtime,$dmem) = TimeMemoryRatios(&$Accepted,$Sort); ?>

<p><img src="chart.php?<?='d='.HttpVarsEncodeArray($dtime);?>&amp;<?='m='.HttpVarsEncodeArray($dmem);?>"
   alt=""
   title="Program time and memory use chart for the <?=$TestName;?> performance benchmark"
   width="480" height="225"
 /></p>

<table>
<colgroup span="2" class="txt"></colgroup>
<colgroup span="3" class="num"></colgroup>
<tr>
<th class="c">&nbsp;</th>
<th class="c">&nbsp;</th>
<th>
   <a href="benchmark.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;sort=fullcpu" 
   title="Sort by CPU Time secs">sort</a>
</th>
<th>
   <a href="benchmark.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;sort=kb"
   title="Sort by Memory Use KB">sort</a>
</th>
<th>
   <a href="benchmark.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;sort=gz"
   title="Sort by Compressed Source Code size Bytes">sort</a>
</th>
<th>
   <a href="benchmark.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;sort=elapsed"
   title="Sort by Elapsed Time secs">sort</a>
</th>
</tr>

<tr>
<th>&nbsp;&nbsp;x&nbsp;&nbsp;</th>
<th>Program &amp; Logs</th>
<th>CPU&nbsp;secs</th>
<th>Memory&nbsp;KB</th>
<th>Size&nbsp;B</th>
<th>Elapsed&nbsp;secs</th>
<th>~&nbsp;CPU&nbsp;Load</th>
</tr>

<?
foreach($Langs as $k => $v){ $No_Program_Langs[$k] = TRUE; }

$better = array();
if (sizeof($Accepted) > 0){ $first = $Accepted[0]; }

foreach($Accepted as $d){
   $k = $d[DATA_LANG];

   $CPU = '';
   $MEM = '';
   $ELAPSED = '';
   $GZBYTES = '';
   if (!isset($better[$k])){
      $better[$k] = TRUE;
      // Sort according to current sort criteria, bold the sort-column
      if ($Sort=='fullcpu'){
         $CPU = ' class="sort"';
      } elseif ($Sort=='kb'){ 
         $MEM = ' class="sort"';
      } elseif ($Sort=='elapsed'){
         $ELAPSED = ' class="sort"';
      } elseif ($Sort=='gz'){ 
         $GZBYTES = ' class="sort"';
      }
   }

   if ($Sort=='fullcpu'){   
      if ($first[DATA_FULLCPU]==0){ $ratio = 0; }
      else { $ratio = $d[DATA_FULLCPU]/$first[DATA_FULLCPU]; }
   } elseif ($Sort=='kb'){ 
      if (($TestName=='startup')||($first[DATA_MEMORY]==0)){ $ratio = 0; }
      else { $ratio = $d[DATA_MEMORY]/$first[DATA_MEMORY]; }
   } elseif ($Sort=='elapsed'){
      if ($first[DATA_ELAPSED]==0){ $ratio = 0; }
      else { $ratio = $d[DATA_ELAPSED]/$first[DATA_ELAPSED]; }
   } elseif ($Sort=='gz'){
      if ($first[DATA_GZ]==0){ $ratio = 0; }
      else { $ratio = $d[DATA_GZ]/$first[DATA_GZ]; }
   }

   unset($No_Program_Langs[$k]);
   $Name = $Langs[$k][LANG_FULL];
   $HtmlName = $Langs[$k][LANG_HTML].IdName($d[DATA_ID]);

   $id = $d[DATA_ID];
   $fullcpu = $d[DATA_FULLCPU];
   if ($TestName=='startup'){
      $fc = number_format($fullcpu/$testValue,4);
      $kb = '&nbsp;';
      $e = '&nbsp;';
      $ld = '&nbsp;';
   } else { 
      $fc = PTime($fullcpu);
      if ($d[DATA_MEMORY]==0){ $kb = '?'; } else { $kb = number_format((double)$d[DATA_MEMORY]); }
      $e = PTime($d[DATA_ELAPSED]);
      $ld = CpuLoad($d);

   }
   $gz = $d[DATA_GZ];

   printf('<tr>'); echo "\n";
   printf('<td>%s</td><td><a href="benchmark.php?test=%s&amp;lang=%s&amp;id=%d">%s</a></td>',
      PFx($ratio),$SelectedTest,$k,$id,$HtmlName); echo "\n";

   printf('<td%s>%s</td><td%s>%s</td><td%s>%d</td><td%s>%s</td><td class="smaller">&nbsp;&nbsp;%s</td>',
         $CPU, $fc, $MEM, $kb, $GZBYTES, $gz, $ELAPSED, $e, $ld); echo "\n";

   echo "</tr>\n";
}
unset($better);
?>

<?
uasort($Langs,'CompareLangName');
foreach($Langs as $k => $v){
   foreach($Rejected as $d){
      if ($d[DATA_LANG]==$k){
         printf('<tr>'); echo "\n";             
         $Name = $v[LANG_FULL];
         $HtmlName = $Langs[$k][LANG_HTML].IdName($d[DATA_ID]);

         $id = $d[DATA_ID];
         $fullcpu = $d[DATA_FULLCPU];
         $gz = $d[DATA_GZ];

         if ($d[DATA_STATUS]==PROGRAM_TIMEOUT){
            $ratio = ''; $e = PTime($d[DATA_ELAPSED]);
         } else { $ratio = ''; $e = ''; }


         printf('<td>%s</td><td><a href="benchmark.php?test=%s&amp;lang=%s&amp;id=%d">%s</a></td>',
            $ratio,$SelectedTest,$k,$id,$HtmlName); echo "\n";

         $message = StatusMessage($d[DATA_STATUS]);
         printf('<td>%s</td><td></td><td>%d</td><td>%s</td><td></td>', $message, $gz, $e);

         echo "</tr>\n";
         unset($No_Program_Langs[$k]);
      }
   }
}
?>

<?
if (sizeof($Special)>0){
   echo '<tr><th colspan="7"><a href="#alt" name="alt">interesting alternative programs</a></th></tr>', "\n";

   foreach($Special as $d){
      $k = $d[DATA_LANG];
      $Name = $Langs[$k][LANG_FULL];
      $HtmlName = $Langs[$k][LANG_HTML].IdName($d[DATA_ID]);

      if ($Sort=='fullcpu'){   
         if ($first[DATA_FULLCPU]==0){ $ratio = 0; }
         else { $ratio = $d[DATA_FULLCPU]/$first[DATA_FULLCPU]; }
      } elseif ($Sort=='elapsed'){
         if ($first[DATA_ELAPSED]==0){ $ratio = 0; }
         else { $ratio = $d[DATA_ELAPSED]/$first[DATA_ELAPSED]; }
      } elseif ($Sort=='kb'){
         if (($TestName=='startup')||($first[DATA_MEMORY]==0)){ $ratio = 0; }
         else { $ratio = $d[DATA_MEMORY]/$first[DATA_MEMORY]; }
      }


      $id = $d[DATA_ID];
      $gz = $d[DATA_GZ];
      $fullcpu = $d[DATA_FULLCPU];
      $status = $d[DATA_STATUS];
      $e = ElapsedTime($d);
      if ($d[DATA_MEMORY]==0){ $kb = '?'; } else { $kb = number_format((double)$d[DATA_MEMORY]); }

      printf('<tr>'); echo "\n";

      if ($status < 0){
         printf('<td>&nbsp;</td><td><a href="benchmark.php?test=%s&amp;lang=%s&amp;id=%d">%s</a></td>',
            $SelectedTest,$k,$id,$HtmlName); echo "\n";

         printf('<td>%s</td><td>&nbsp;</td><td>%d</td>', StatusMessage($status), $gz);
      }
      else {
         printf('<td>%s</td><td><a href="benchmark.php?test=%s&amp;lang=%s&amp;id=%d">%s</a></td>',
            PFx($ratio),$SelectedTest,$k,$id,$HtmlName); echo "\n";
         printf('<td>%0.2f</td><td>%s</td><td>%d</td><td>%0.2f</td><td></td>', $fullcpu, $kb, $gz, $e ); echo "\n";
      }
      echo "</tr>\n";
   }
}
?>


<? // MISSING PROGRAMS TABLE //////////////////////////

if (sizeof($No_Program_Langs)>0){
   echo '<tr><th colspan="7"><a href="#missing" name="missing">missing programs</a></th></tr>', "\n";
      
   foreach($Langs as $k => $v){
      $no_program = isset($No_Program_Langs[$k]);        
      if ($no_program){  
         printf('<tr>'); echo "\n";             
         $Name = $v[LANG_FULL];
         $HtmlName = $v[LANG_HTML];            

         printf('<td></td><td><a href="benchmark.php?test=%s&amp;lang=%s">%s</a></td>', 
            $SelectedTest,$k,$HtmlName); echo "\n";

         echo '<td>No&nbsp;program</td><td></td><td></td><td></td><td></td>';
         echo "</tr>\n";     
      }
   }
}
?>
</table>

<h3><a href="#about" name="about">&nbsp;the <?=$TestName;?> <?=TESTS_PHRASE;?> rules</a></h3>
<?=$About;?>
