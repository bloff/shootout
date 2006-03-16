<?   // Copyright (c) Isaac Gouy 2004-2006 ?>

<? 
$Row = $Langs[$SelectedLang];
$LangName = $Row[LANG_FULL];
$LangTag = $Row[LANG_TAG];
$LangName2 = $Langs[$SelectedLang2][LANG_FULL];
$Link = $Row[LANG_LINK];
$Family = $Row[LANG_FAMILY];
$ShortName = $Row[LANG_NAME];
$ShortName2 = $Langs[$SelectedLang2][LANG_NAME];
?>

<p>Compare the performance of <strong><?=$LangName;?></strong> programs against some other language implementation, or check the <?=$Family;?> <a href="benchmark.php?test=all&amp;lang=<?=$Link;?>&amp;lang2=<?=$Link;?>" title="Show <?=$LangName;?> measurements">CPU time and Memory use measurements</a>.</p>

<p>For more information about the <?=$Family;?> implementation we measured see
<a href="#about" title="Read about the <?=$LangName;?>language implementation">&darr;&nbsp;about <?=$LangName;?></a>.</p>

<? MkHeadToHeadMenuForm($Tests,$SelectedTest,$Langs,$SelectedLang,$SelectedLang2,"fullcpu"); ?>

<h2><a href="#title" name="title">&nbsp;Are the <?=$ShortName;?> programs better?</a></h2>
<p>For each of one our benchmarks, a white bar shows which language implementation had the faster program, and a black bar shows which used the least memory.</p>


<p class="img"><img src="chartvs.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;lang2=<?=$SelectedLang2;?>"
   alt="Are the <?=$LangName;?> programs better or are the the <?=$LangName2;?> programs better?"
   title="Are the <?=$LangName;?> programs better or are the the <?=$LangName2;?> programs better?"
   width="300" height="300"
 /></p>


<h3><a href="#ratio" name="ratio">&nbsp;How many times better?</a></h3>
<p>How many times <em>faster or smaller</em> are the <strong><?=$LangName;?></strong> programs than the corresponding <?=$LangName2;?> programs?</p>


<table>
<colgroup span="1" class="txt"></colgroup>
<colgroup span="4" class="num"></colgroup>
<tr>
<th>&nbsp;</th>
<th>&nbsp;Faster&nbsp;</th>
<th>Smaller: Memory Use</th>
<th>Smaller: Code Lines</th>
<th>&nbsp;</th>
</tr>

<tr>
<th>Program &amp; Logs</th>
<th colspan="3"><?=$ShortName;?> <em>x&nbsp;times</em>&nbsp;better <span class="num2"><br/>- <?=$ShortName2;?> <em>x&nbsp;times</em>&nbsp;better</span></th>
<th>&nbsp;N&nbsp;</th>
</tr>

<? 
foreach($Tests as $Row){
   printf('<tr>'); echo "\n";
   $Link = $Row[TEST_LINK];
   $Name = $Row[TEST_NAME];

   if (isset($Data[$Link])){
      $v = $Data[$Link];     

      printf('<td><a href="benchmark.php?test=%s&amp;lang=%s&amp;id=%d">%s</a></td>', 
         $Link, $SelectedLang, $v[N_ID], $Name);
                
      if ($v[N_LINES] >= 0){ 
      
         if ($v[N_N]==0){ $n = '<td>?</td>'; } 
         else { $n = '<td class="numN">&nbsp;'.number_format($v[N_N]).'</td>'; }                         
                  
         $cpuValue = $v[N_FULLCPU];
         if ($cpuValue<1 && $cpuValue!=0){ $cpuValue = -1/$cpuValue; }
         $memValue = $v[N_MEMORY];
         if ($memValue<1 && $memValue!=0){ $memValue = -1/$memValue; }
         $locValue = $v[N_LINES];
         if ($locValue<1 && $locValue!=0){ $locValue = -1/$locValue; }

         printf('%s%s%s%s', 
            PF($v[N_FULLCPU]), PF($v[N_MEMORY]), PF($v[N_LINES]), $n);                   

      } else {      
         $r = FALSE;
         if ($v[N_LINES] == PROGRAM_ERROR){ $message = 'Error'; } 
         elseif ($v[N_LINES] == PROGRAM_TIMEOUT){ $message = 'Timout'; } 
         elseif ($r = $v[N_LINES] == NO_COMPARISON){ $message = 'No '.$Langs[$v[N_LANG]][LANG_NAME]; } 
         else {$message = 'X'; } 
         
         if ($r) { printf('<td></td><td></td><td colspan="2">%s</td>', $message); }
         else { printf('<td>%s</td><td></td><td></td><td></td>', $message); }
      }

   } else {
      printf('<td><a href="benchmark.php?test=%s&amp;lang=%s">%s</a></td>', 
         $Link, $SelectedLang, $Name); echo "\n";
      $message = 'No&nbsp;program';
      printf('<td>%s</td><td></td><td></td><td></td>', $message); 
   }
   echo "</tr>\n";
}
?>   
</table>

<h3><a href="#about" name="about">&nbsp;about <?=$LangName;?></a></h3>
<?=$About;?>
