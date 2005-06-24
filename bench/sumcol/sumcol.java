// $Id: sumcol.java,v 1.4 2005-06-24 16:12:05 igouy-guest Exp $
// http://www.bagley.org/~doug/shootout/ 

import java.io.*;
import java.util.*;
import java.text.*;

public class sumcol {
   public static void main(String[] args) {
      int sum = 0;
      String line;
      try {
         BufferedReader in = new BufferedReader(new InputStreamReader(System.in));
         while ((line = in.readLine()) != null) {
            sum = sum + Integer.parseInt(line);
         }
      } catch (IOException e) {
         System.err.println(e);
         return;
      }
      System.out.println(Integer.toString(sum));
   }
}
