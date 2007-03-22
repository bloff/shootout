/* The Computer Language Shootout
   http://shootout.alioth.debian.org/
   contributed by Isaac Gouy
*/

import java.io.BufferedReader
import java.io.InputStreamReader
import scala.collection.mutable.HashTable

object knucleotide { 

   var sequence: String = _

   def main(args: Array[String]) = {
      val r = new BufferedReader(new InputStreamReader(System.in))
      findSequence(">THREE", r)
      sequence = nextSequence(r)
      r.close

      writeFrequencies(1)
      writeFrequencies(2)

      writeCount("GGT")
      writeCount("GGTA")
      writeCount("GGTATT")
      writeCount("GGTATTTTAATT")
      writeCount("GGTATTTTAATTTATAGT")
   } 

   def findSequence(id: String, r: BufferedReader): Unit = {
      var line = r.readLine
      while (line != null) {
         val c = line.charAt(0)
         if (c == '>' && line.startsWith(id)) return
         line = r.readLine
      }
   } 

   def nextSequence(r: BufferedReader): String = {
      val b = new StringBuffer()

      var line = r.readLine
      while (line != null) {
         val c = line.charAt(0)
         if (c == '>') { 
            return b.toString
         } else { 
            if (c != ';') b.append(line.toUpperCase) 
         }
         line = r.readLine
      }
      b.toString
   }

   def generateFrequencies(length: int) = {
      val bag: HashBag[String] = new HashBag()
   
      def kFrequency(offset: int, j: int) = {
         val n = sequence.length - j + 1
         var i = offset
         while (i < n){ bag += sequence.substring(i,i+j); i = i+j }
      }

      for (val o <- Iterator.range(0,length)) kFrequency(o,length)
      bag
   } 

   def writeFrequencies(j: int) = {
      val bag = generateFrequencies(j)
      val n = sequence.length - j + 1.0
      val sortedValues = bag.elements.toList.sort(
         (a,b) => if (a.value == b.value) a.key > b.key
                  else a.value > b.value )

      for (val a <- sortedValues)
         Console.printf("{0} {1,number,0.000}\n", a.key, a.value / n * 100.0)

      Console.println
   }

   def writeCount(fragment: String) = {
      val bag = generateFrequencies(fragment.length)
      Console.println( bag.findOccurrences(fragment) + "\t" + fragment )
   }
}


class HashBag[A] extends HashTable[A] {
   protected type Entry = Counter[A]
   protected def entryKey(e: Entry) = e.key
   def elements = entries

   def +=(elem: A): Unit = {
      var bucket = table(index(elemHashCode(elem)))
      while (!bucket.isEmpty) {
         if (elemEquals(entryKey(bucket.head), elem)){
            bucket.head.inc
            return
         }
         bucket = bucket.tail
      }
      addEntry(new Entry(elem, 1))
   }

   def findOccurrences(elem: A): int = {
      var bucket = table(index(elemHashCode(elem)))
      while (!bucket.isEmpty) {
         if (elemEquals(entryKey(bucket.head), elem)){
            return bucket.head.value
         }
         bucket = bucket.tail
      }
      return 0
   }

/*
   def -=(elem: A): Unit = {
      var bucket = table(index(elemHashCode(elem)))
      while (!bucket.isEmpty) {
         if (elemEquals(entryKey(bucket.head), elem)){
            bucket.head.dec
            if (bucket.head.value == 0) removeEntry(elem)
            return
         }
         bucket = bucket.tail
      }
  }
*/
}

protected class Counter[A](k: A, v: int) extends AnyRef {
   def key = k
   var value = v
   def inc = { value = value + 1 }
   def dec = { value = value - 1 }
}
