<?php      
echo '<?xml version="1.0" encoding="iso-8859-1" ?>';      
$D = filemtime('../data/data.csv');
$G = filemtime('./gp4/data/data.csv');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow,archive" /><meta name="revisit" content="1 days" />

<meta name="keywords" content="benchmarking fast programming language benchmark performance benchmarks shootout program" />
<meta name="description" content="Compare programming language performance on a few dozen flawed benchmarks and contribute faster more elegant programs." />

<title>The Computer Language Shootout Benchmarks</title>
<link rel="stylesheet" type="text/css" href="./benchmark.css" />
<link href="./feeds/rss.xml" rel="alternate" type="application/rss+xml" title="Computer Language Shootout" />
<link rel="shortcut icon" href="./favicon.ico" />
</head>

<body id="core">
<table class="banner"><tr>
<td><h1><a>The&nbsp;Computer&nbsp;Language&nbsp; <br/>Shootout&nbsp;Benchmarks</a></h1></td>
<td><a href="./feeds/rss.xml"><img src="./orangexml.gif" alt="Really Simple Syndication" title="Really Simple Syndication" /></a></td>
</tr></table>

<div id="home">
<h5>Benchmarking programming languages?</h5>
<p>How can we benchmark a programming language?<br/>
We can't - we benchmark programming language implementations.</p>
<p>How can we benchmark language implementations?<br/>
We can't - <strong>we measure particular programs</strong>.</p>

<h5>Contribute:</h5>
<p>these programming language comparisons are only as good as the programs contributed by the community</p>
<ul>
<li>you can <a href="http://shootout.alioth.debian.org/gp4/faq.php?&#35;contributeprogram" title="FAQ: How can I help?">contribute faster more-elegant programs</a>&nbsp;(FAQ)</li>
<li>you can <a href="http://shootout.alioth.debian.org/gp4/faq.php?&#35;contributebenchmark" title="FAQ: How can I contribute a new benchmark?">suggest new benchmark comparisons</a>&nbsp;(FAQ)</li>
</ul>

<h5>Use:</h5>
<p>these are particular truths, they are not general truths</p>
<ul>
<li>read <a href="http://shootout.alioth.debian.org/gp4/faq.php" title="Frequently Asked Questions"><strong>the FAQ</strong></a> and read about <a href="http://shootout.alioth.debian.org/gp4/miscfile.php?file=benchmarking&amp;title=Flawed Benchmarks" title="Flawed benchmarks - Are there any other kind?"><strong>flawed benchmarks</strong></a></li>
<li>learn about the languages - read the programs</li>
<li>understand that <em>the faster program</em> may become <em>the slower program</em> when the workload changes</li>
</ul>

<h5>Start:</h5>
<p>although both websites show the same benchmarks there are differences - 
on Gentoo : Intel some benchmarks have a higher workload, and most language implementations have been built from source.</p>

<p>choose an OS : architecture, and click the colourful link to browse our current benchmarks, programs, languages and measurements</p>
<table class="layout">
<tr>
<td>
<p class="timestamp"><? printf('%s', gmdate("d M Y", $D)) ?></p>
<h3><span class="debian">
<a title="Browse the Debian : AMD&#8482; Sempron&#8482; Computer Language Shootout"
href="./debian/">&nbsp;Debian&nbsp;:&nbsp;AMD&#8482;&nbsp;Sempron&#8482;&nbsp;</a></span></h3>
</td>
<td>
<p class="timestamp"><? printf('%s', gmdate("d M Y", $G)) ?></p>
<h3><span class="gp4">
<a title="Browse the Gentoo : Intel&#174; Pentium&#174; Computer Language Shootout"
href="./gp4/">&nbsp;Gentoo&nbsp;:&nbsp;Intel&#174;&nbsp;Pentium&#174;&nbsp;4&nbsp;</a></span></h3>
</td>
</tr>
</table>


<h5>Extra:</h5>
<p>more language implementations and alpha benchmarks</p>
<p>some language implementations are shown on one website but not the other, check both</p>
<table class="layout">
<tr>
<td>
<p class="timestamp"><? printf('%s', gmdate("d M Y", $D)) ?></p>
<h3><span class="sandbox">
<a title="Browse the Debian : AMD&#8482; Sempron&#8482; more language implementations and alpha benchmarks"
href="./sandbox/">&nbsp;Debian&nbsp;:&nbsp;AMD&#8482;&nbsp;Sempron&#8482;&nbsp;</a></span></h3>
</td>
<td>
<p class="timestamp"><? printf('%s', gmdate("d M Y", $G)) ?></p>
<h3><span class="sandbox">
<a title="Browse the Gentoo : Intel&#174; Pentium&#174; more language implementations and alpha benchmarks"
href="./gp4sandbox/">&nbsp;Gentoo&nbsp;:&nbsp;Intel&#174;&nbsp;Pentium&#174;&nbsp;4&nbsp;</a></span></h3>
</td>
</tr>
</table>


<h5>For auld lang syne:</h5>
<p>look back at the old 2001 Doug Bagley Benchmarks</p>
<table class="layout">
<tr>
<td>
<p class="timestamp"><? printf('%s', gmdate("d M Y", $D)) ?></p>
<h3><span class="old">
<a title="Look back at the Old 2001 Doug Bagley Benchmarks" href="./old/">&nbsp;Debian&nbsp;:&nbsp;AMD&#8482;&nbsp;Sempron&#8482;&nbsp;</a>
</span></h3>
</td>
</tr>
</table>


<p class="img">
<a href="http://shootout.alioth.debian.org/gp4/miscfile.php?file=license&amp;title=Revised BSD license" title="Software contributed to the Shootout is published under this revised BSD license" >
   <img src="./open_source_button.png" alt="Revised BSD license" height="31" width="88" />
</a>
</p>

</div>
</body>
</html>
