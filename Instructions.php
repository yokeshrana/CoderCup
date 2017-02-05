<?php

require_once('includes/bootstrap.php');

//if(!isLoggedin())
//    header('location:login.php');

include('header.php');

?>


<h2> Contest Instructions and Rules </h2>

<h3>Eligibility and Participation</h3>

<p>
  The Contest will be for First year students.They need to form a two memeber team for that and Provide their Team name to
  the technical team cordinators .After that their passwords will be providedd to them by the cordiantors of technical team.

 </p>


<h3>Contest Format</h3>

<p>Each contest has typically 3..4 problems to which you will submit solution
programs in C, C++, Java, or Python.  Problems are algorithmic
in nature, so clever algorithms and/or data structures might be
necessary to solve all test cases correctly and within the time
limits.  Your score for each problem depends on the number of input
cases your program can solve within the time limit (for most contests,
2 seconds per input case , although the each contest or problem
may use slightly different limits). All problem statements are intended
to be straightforward, with no intentional "hidden tricks" (however, note
that legal but complex datasets are fair game for testing).  Problems
are intended to be challenging; it is rarely the case that a large
number of competitors receive near-perfect scores! and then thereby judged later on . </p>

<p>The contest is typically 3..4 contiguous hours in length.  You can
take the contest during any block of time you want, as long as you
<i>start</i> during the larger contest window.  When you start the
contest, your personal timer starts counting down, and you will be
able to view the contest problems and submit solutions via the online codercup portal </p>

<p> When you submit a program, it will be run against a number of
juding test cases and for each one, you will receive feedback. If your program fails to compile, you will be shown the error
messages from the compiler.
 The judges
reserve the right to add or remove test cases after the end of the
contest, so it is still worthwhile to test your program even if it
passes all of the cases during the contest. </p>


<p>The official language of the contest is English</p>

<h3>Contest Conduct and Academic Integrity</h3>

<p>The COSSCO team believes strongly in academic integrity, and we have adopted
strict policies to ensure the integrity of our competitions:</p>

<ul>

<li>Work in teams and good luck!!!!! </li>

<li> Consultation about the contest problems with people other than
   the Team COSSCO is prohibited.</li>

<li> Do not submit programs until you are fully satisfied  </li>


<li> Do not use use two login IDs in order to participate in more than
   one division.  Do not use another login ID to read the problems,
   to circumvent the contest time limits.  </li>

<li> Do not submit any code that behaves in a malicious way towards
  the grading machine (i.e., do not try to open network
  connections, intentially slow down the grading machine,
  etc.). The judging environment monitors activities and system calls
  to prevent forbidden actions. </li>

<li> Do not distribute code you have written for a contest while the
   contest is still active. </li>

</ul>

<p> PARTICIPANTS WHO VIOLATE OF ANY OF THE POLICIES ABOVE WILL BE
BANNED.  DON'T CHEAT -- THERE ARE
NO SECOND CHANCES!

<h3>General Technical Details</h3>

<ul>

<li> Your program must be less than 200,000 bytes in size and must
compile in 30 seconds or less. Unless otherwise stated, your programs
will be limited to about 256MB of total memory use.
</li>

<li> Do not submit programs that open data files that aren't related
to the contest task at hand.  Read only the specified input files and
write only the specified output files. Do not use `temporary' data files.
</li>



<li> Although we  have typically designed problems so that numeric answers
will fit into a standard 32-bit integer, this is not guaranteed.  If
larger data types (e.g., 64-bit integers) are necessary, we often
make a note of this in the problem statement for your convenience,
but it is ultimately your responsibility to realize when these are
needed.  </li>


<li> For compiled languages, you do not need to remove all compiler
warnings.  Compiler errors, of course, will prevent your submission
from being judged.  </li>


<li> The judges reserve the right to increase time limits or
add/remove test cases during grading to produce final results. </li>

<li> Decision of the judges is final. </li>

</ul>

<h3>Language-Specific Technical Details</h3>

<ul>

<li>For <b>C/C++</b> programmers: Programs are compiled with gcc/g++
4.8.2 using the "-O2" optimization flag and "-lm" to access the math
library, and also "-std=c++0x" to enable support for C++11.  Ints are
32 bits in size; use a "long long" if you need a 64-bit integer.  To
read or write a long long variable with C-style I/O (e.g., scanf,
printf), use the "%lld" format string.
</li>


<li> For <b>Java</b> programmers: Programs are compiled with Java
version 1.8.0_121, and executed with the Oracle Java Runtime
Environment (note that this was recently upgraded; Java 7 was used for
all submissions up to and including the January 2017 contest).  You
must submit your entire program in one file, and this file must have
exactly one public class named the same as the file (for example, if
your file is called "MyFile.java", then it should contain "public
class MyFile").  This class needs to have your public static void main
function.  All other clases in the file should be defined without the
"public" tag (e.g., as "class MyOtherClass").  Do not include a
"package" line in your source code.
</li>

<li> For <b>Python</b> programmers: We offer both Python 2.7.6 and
Python 3.4.0; please be sure to select the correct version when you
submit, since it is often the case that programs developed for one
version will not work properly in the other (use "python --version" to
check the version of your local Python interpreter).  Note also that
due to the slower speed of a Python program, it may not be possible to
solve the largest test cases for some problems even with the inflated
time limit given to Python submissions -- consider using a faster
language for problems where execution time is critical.  Executions
are run with the "-O" flag to enable some optimization. </li>

</ul>

<h3>Clarifications, Contacting the Contest Organizers</h3>

<p>If you find a problem has poor wording or an ambiguity, you can
ask COSSCO team
to request clarification; you may receive nothing more than a "read
the problem more carefully" response, although important
clarifications that have merit will be published on the contest page.
</p>

</div>
</div>

<br style="clear:both" />

 </div>
</div>
</div>

<br style="clear:both" />
